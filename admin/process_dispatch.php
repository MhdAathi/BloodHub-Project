<?php
session_start();
include('config/dbcon.php'); // Ensure your DB connection file is included
require '../vendor/autoload.php'; // Ensure PHPMailer is loaded

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['dispatch_blood_btn'])) {
    // Retrieve and sanitize form data
    $request_id = intval($_POST['request_id']);
    $hospital_name = htmlspecialchars($_POST['hospital_name']);
    $blood_group = htmlspecialchars($_POST['blood_group']);
    $quantity = intval($_POST['quantity']);
    $dispatch_date = $_POST['dispatch_date'];
    $driver_id = intval($_POST['driver']);

    // Fetch hospital email
    $hospital_query = "SELECT email FROM blood_requests WHERE hospital_name = ?";
    $hospital_stmt = $con->prepare($hospital_query);
    $hospital_stmt->bind_param("s", $hospital_name);
    $hospital_stmt->execute();
    $hospital_result = $hospital_stmt->get_result();

    if ($hospital_result->num_rows > 0) {
        $hospital = $hospital_result->fetch_assoc();
        $hospital_email = $hospital['email'];
    } else {
        $_SESSION['message'] = "Hospital information could not be retrieved for email.";
        header('Location: dispatch_blood.php');
        exit();
    }

    // Fetch blood inventory sorted by collection date (FIFO)
    $inventory_query = "SELECT id, blood_quantity, collection_date FROM blood_inventory WHERE blood_type = ? ORDER BY collection_date ASC";
    $inventory_stmt = $con->prepare($inventory_query);
    $inventory_stmt->bind_param("s", $blood_group);
    $inventory_stmt->execute();
    $inventory_result = $inventory_stmt->get_result();

    $total_quantity_dispatched = 0;
    $blood_units_to_dispatch = [];

    // Gather blood units for dispatch
    while ($row = $inventory_result->fetch_assoc()) {
        $available_quantity = $row['blood_quantity'];
        $blood_id = $row['id'];

        // Check if we can fulfill the dispatch with this unit
        if ($total_quantity_dispatched + $available_quantity <= $quantity) {
            $blood_units_to_dispatch[] = ['id' => $blood_id, 'quantity' => $available_quantity];
            $total_quantity_dispatched += $available_quantity;
        } else {
            // Only take the required amount from this unit
            $needed_quantity = $quantity - $total_quantity_dispatched;
            $blood_units_to_dispatch[] = ['id' => $blood_id, 'quantity' => $needed_quantity];
            $total_quantity_dispatched += $needed_quantity;
            break; // We have dispatched enough
        }

        if ($total_quantity_dispatched >= $quantity) {
            break; // No need to check further
        }
    }

    // Check if we have enough blood to dispatch
    if ($total_quantity_dispatched < $quantity) {
        $_SESSION['message'] = "Insufficient blood quantity available for dispatch.";
        header('Location: dispatch_blood.php');
        exit();
    }

    // Insert the dispatch details into the database
    $query = "INSERT INTO blood_dispatches (request_id, driver_id, dispatch_date) VALUES (?, ?, ?)";
    $stmt = $con->prepare($query);
    $stmt->bind_param("iss", $request_id, $driver_id, $dispatch_date);

    if ($stmt->execute()) {
        // Update blood request status to dispatched
        $update_query = "UPDATE blood_requests SET status = 'dispatched' WHERE id = ?";
        $update_stmt = $con->prepare($update_query);
        $update_stmt->bind_param("i", $request_id);

        if ($update_stmt->execute()) {
            // Update the blood quantities in the inventory
            foreach ($blood_units_to_dispatch as $unit) {
                $blood_id = $unit['id'];
                $dispatched_amount = $unit['quantity'];

                // Fetch the current blood quantity from the inventory
                $current_quantity_query = "SELECT blood_quantity FROM blood_inventory WHERE id = ?";
                $current_quantity_stmt = $con->prepare($current_quantity_query);
                $current_quantity_stmt->bind_param("i", $blood_id);
                $current_quantity_stmt->execute();
                $current_quantity_result = $current_quantity_stmt->get_result();
                $current_quantity = $current_quantity_result->fetch_assoc()['blood_quantity'];

                // Calculate the new quantity
                $new_quantity = $current_quantity - $dispatched_amount;

                // Update the inventory
                $update_inventory_query = "UPDATE blood_inventory SET blood_quantity = ? WHERE id = ?";
                $update_inventory_stmt = $con->prepare($update_inventory_query);
                $update_inventory_stmt->bind_param("ii", $new_quantity, $blood_id);
                $update_inventory_stmt->execute();
            }

            // Send email to the hospital
            $mail = new PHPMailer(true);

            try {
                // Server settings
                $mail->isSMTP();                                            // Send using SMTP
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server
                $mail->Username   = 'aathief01@gmail.com';                  // SMTP username
                $mail->Password   = 'fhkbwdzlzqipbhea';                     // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable encryption
                $mail->Port       = 587;                                    // TCP port to connect to

                // Recipients
                $mail->setFrom('aathief01@gmail.com', 'BloodHub Dispatch Center');
                $mail->addAddress($email, $hospital_name);         // Send to hospital email

                // Content
                $mail->isHTML(true);                                        // Set email format to HTML
                $mail->Subject = 'Blood Dispatch Confirmation';
                $mail->Body    = "
                    <h3>Dear $hospital_name,</h3>
                    <p>Your requested blood group <strong>$blood_group</strong> (Quantity: <strong>$quantity units</strong>) has been dispatched on <strong>$dispatch_date</strong>.</p>
                    <p>Driver Details:<br>
                    Driver ID: $driver_id</p>
                    <p>Thank you for trusting BloodHub for your blood supply needs.</p>
                    <p>Best regards,<br>BloodHub Dispatch Center</p>
                ";

                // Send the email
                $mail->send();
                $_SESSION['message'] = "Blood dispatched, and email sent to hospital.";
            } catch (Exception $e) {
                $_SESSION['message'] = "Blood dispatched, but email failed to send: {$mail->ErrorInfo}";
            }

            header('Location: blood_requests.php');
            exit();
        } else {
            // Error updating blood request status
            $_SESSION['message'] = "Failed to update blood request status: " . $update_stmt->error;
            header('Location: dispatch_blood.php');
            exit();
        }
    } else {
        // Error inserting dispatch details
        $_SESSION['message'] = "Failed to dispatch blood: " . $stmt->error;
        header('Location: dispatch_blood.php');
        exit();
    }
} else {
    // Invalid access handling
    $_SESSION['message'] = "Invalid access.";
    header('Location: dispatch_blood.php');
    exit();
}

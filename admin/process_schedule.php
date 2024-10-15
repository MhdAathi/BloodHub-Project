<?php
session_start();
include('config/dbcon.php'); // Ensure your DB connection file is included
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['schedule_btn'])) {
    // Retrieve and sanitize form data
    $donor_id = intval($_POST['donor_id']);
    $scheduled_date = $_POST['scheduled_date'];
    $time_slot = $_POST['time_slot'];
    $location = htmlspecialchars($_POST['location']);

    // Insert schedule details into donation_schedule table
    $query = "INSERT INTO donation_schedule (donor_id, scheduled_date, time_slot, location) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($query);
    $stmt->bind_param("isss", $donor_id, $scheduled_date, $time_slot, $location);

    if ($stmt->execute()) {
        // Update donation status in donor_history table
        $update_query = "UPDATE donor_history SET donation_status = 1 WHERE id = ?";
        $update_stmt = $con->prepare($update_query);
        $update_stmt->bind_param("i", $donor_id);

        if ($update_stmt->execute()) {
            // Fetch the donor's email and name
            $donor_query = "SELECT donor_name, email FROM donor_history WHERE id = ?";
            $donor_stmt = $con->prepare($donor_query);
            $donor_stmt->bind_param("i", $donor_id);
            $donor_stmt->execute();
            $donor_result = $donor_stmt->get_result();

            if ($donor_result->num_rows > 0) {
                $donor = $donor_result->fetch_assoc();
                $donor_name = $donor['donor_name'];
                $donor_email = $donor['email'];

                // Send confirmation email
                $mail = new PHPMailer(true);

                try {
                    // Server settings
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->SMTPAuth   = true;
                                                       // Enable SMTP authentication
                    $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server
                    $mail->Username   = 'aathief01@gmail.com';               // SMTP username
                    $mail->Password   = 'fhkbwdzlzqipbhea';  
                                          // SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            // Enable SSL encryption
                    $mail->Port       = 587;                                    // TCP port to connect to

                    // Recipients
                    $mail->setFrom('aathief01@gmail.com', 'Blood Donation Center');
                    $mail->addAddress($donor_email, $donor_name);               // Add the donor's email

                    // Content
                    $mail->isHTML(true);                                        // Set email format to HTML
                    $mail->Subject = 'Donation Schedule Confirmation';
                    $mail->Body    = "
                        <h3>Dear $donor_name,</h3>
                        <p>Thank you for your willingness to donate blood.</p>
                        <p>Your donation has been scheduled on <strong>$scheduled_date</strong> at <strong>$time_slot</strong> at <strong>$location</strong>.</p>
                        <p>We look forward to your donation and greatly appreciate your contribution!</p>
                        <p>Best regards,<br>Blood Donation Center</p>
                    ";

                    // Send the email
                    $mail->send();
                    $_SESSION['message'] = "Donation scheduled, status updated, and email sent to donor.";
                } catch (Exception $e) {
                    // Handle email sending failure
                    $_SESSION['message'] = "Donation scheduled, status updated, but email failed to send: {$mail->ErrorInfo}";
                }
            } else {
                $_SESSION['message'] = "Donation scheduled and status updated, but donor information could not be retrieved for email.";
            }

            header('Location: donor_history.php');
            exit;
        } else {
            // Error handling for updating donation status
            $_SESSION['message'] = "Failed to update donation status: " . $update_stmt->error;
            header('Location: schedule.php?id=' . $donor_id);
            exit;
        }
    } else {
        // Error handling for scheduling donation
        $_SESSION['message'] = "Failed to schedule donation: " . $stmt->error;
        header('Location: schedule.php?id=' . $donor_id);
        exit;
    }
} else {
    // Invalid access handling
    $_SESSION['message'] = "Invalid access.";
    header('Location: donor_history.php');
    exit;
}

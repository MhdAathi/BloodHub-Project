<?php
session_start();
include('config/dbcon.php'); // Include your DB connection file

if (isset($_POST['schedule_btn'])) {
    // Retrieve and sanitize form data
    $donor_id = intval($_POST['donor_id']); // Ensure donor_id is an integer
    $scheduled_date = $_POST['scheduled_date'];
    $time_slot = $_POST['time_slot'];
    $location = htmlspecialchars($_POST['location']); // Sanitize location input
    
    // Prepare and execute query to insert schedule details
    $query = "INSERT INTO donation_schedule (donor_id, scheduled_date, time_slot, location) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($query);
    $stmt->bind_param("isss", $donor_id, $scheduled_date, $time_slot, $location);

    if ($stmt->execute()) {
        // Retrieve donor details for email notification
        $donor_query = "SELECT email, donor_name FROM donor_history WHERE id = ?";
        $donor_stmt = $con->prepare($donor_query);
        $donor_stmt->bind_param("i", $donor_id);
        $donor_stmt->execute();
        $donor_result = $donor_stmt->get_result();
        $donor = $donor_result->fetch_assoc();

        if ($donor) {
            $donor_email = $donor['email'];
            $donor_name = $donor['donor_name'];

            // Prepare email content
            $subject = "Donation Scheduled Successfully";
            $message = "Dear $donor_name,\n\nYour donation has been scheduled successfully.\n\nDate: $scheduled_date\nTime: $time_slot\nLocation: $location\n\nThank you for your contribution to our blood bank.\n\nBest regards,\nBloodHub Team";
            $headers = "From: no-reply@bloodhub.com\r\n";
            
            // Send the email
            if (mail($donor_email, $subject, $message, $headers)) {
                $_SESSION['message'] = "Donation scheduled and email sent successfully.";
            } else {
                $_SESSION['message'] = "Donation scheduled but failed to send email.";
            }
        } else {
            $_SESSION['message'] = "Failed to retrieve donor information.";
        }

        // Redirect to the donor history page
        header('Location: donor_history.php');
        exit;
    } else {
        // Handle query execution failure
        $_SESSION['message'] = "Failed to schedule donation: " . $stmt->error;
        header('Location: schedule.php?id=' . $donor_id);
        exit;
    }
} else {
    // Redirect if the form was not submitted properly
    $_SESSION['message'] = "Invalid access.";
    header('Location: donor_history.php');
    exit;
}
?>

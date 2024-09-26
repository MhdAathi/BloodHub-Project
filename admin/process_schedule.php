<?php
session_start();
include('config/dbcon.php'); // Ensure your DB connection file is included

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
            // Success handling
            $_SESSION['message'] = "Donation scheduled and status updated.";
            header('Location: donor_history.php');
            exit;
        } else {
            // Error handling
            $_SESSION['message'] = "Failed to update donation status: " . $update_stmt->error;
            header('Location: schedule.php?id=' . $donor_id);
            exit;
        }
    } else {
        // Error handling
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
?>

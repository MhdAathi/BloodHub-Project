<?php
session_start();
include('admin/config/dbcon.php'); // Ensure the database connection is correctly included

if (isset($_POST['submit_feedback_btn'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $query = mysqli_real_escape_string($con, $_POST['query']);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message'] = "Invalid Email Address";
        header("Location: index.php");
        exit(0);
    }

    // Insert feedback into the database
    $feedback_query = "INSERT INTO feedback (name, email, query) VALUES ('$name', '$email', '$query')";
    $feedback_query_run = mysqli_query($con, $feedback_query);

    if ($feedback_query_run) {
        $_SESSION['message'] = "Feedback Submitted Successfully";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something Went Wrong. Please Try Again.";
        header("Location: index.php");
        exit(0);
    }
} else {
    header("Location: index.php");
    exit(0);
}
?>

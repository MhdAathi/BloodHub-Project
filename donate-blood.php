<?php
session_start();
include('admin/authentication.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<style>
    /* Form Section Styles */
    .form-section {
        padding: 40px 0;
        /* Padding for top and bottom */
        background-color: #ecebf3;
        /* Light background color for the section */
    }

    .form-wrapper {
        max-width: 600px;
        /* Maximum width of the form */
        margin: 0 auto;
        /* Centering the form wrapper horizontally */
        background-color: #fff;
        /* Background color of the form wrapper */
        padding: 20px;
        /* Padding inside the form wrapper */
        border-radius: 8px;
        /* Rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Soft shadow for depth */
    }

    .form-wrapper h2 {
        text-transform: uppercase;
        text-align: center;
        /* Center align the heading */
        margin-bottom: 20px;
        /* Spacing below the heading */
        color: #333;
        /* Dark color for the heading */
    }

    .form-wrapper label {
        display: block;
        /* Block display for labels */
        margin-bottom: 5px;
        /* Space between label and input */
        color: #555;
        /* Slightly lighter color for labels */
    }

    .form-wrapper input,
    .form-wrapper select,
    .form-wrapper textarea {
        width: 100%;
        /* Full width inputs and textarea */
        padding: 10px;
        /* Padding inside the inputs and textarea */
        margin-bottom: 15px;
        /* Space below inputs and textarea */
        border: 1px solid #ddd;
        /* Light border color */
        border-radius: 4px;
        /* Rounded corners for inputs and textarea */
        font-size: 16px;
        /* Font size for readability */
    }

    .form-wrapper textarea {
        height: 100px;
        /* Set a fixed height for the textarea */
        resize: vertical;
        /* Allow vertical resizing only */
    }

    .form-wrapper button {
        display: block;
        /* Block display for the button */
        width: 100%;
        /* Full width button */
        padding: 12px;
        /* Padding inside the button */
        font-size: 16px;
        /* Font size for the button text */
        border: none;
        /* Remove default border */
        border-radius: 5px;
        /* Rounded corners */
        color: #fff;
        /* White text color */
        background-color: #dc3545;
        /* Red background color */
        cursor: pointer;
        /* Pointer cursor on hover */
        transition: background-color 0.3s ease;
        /* Smooth transition for background color */
    }

    .form-wrapper button:hover {
        background-color: #c82333;
        /* Darker red on hover */
    }
</style>

<!-- Donate Blood Content -->
<section class="form-section">
    <div class="container mt-5">
        <?php include('message.php') ?>
        <div class="form-wrapper">
            <h2>Donate Blood</h2>
            <form action="submit_donation.php" method="POST">

                <!-- Name -->
                <label for="donor-name">Full Name</label>
                <input type="text" id="donor-name" name="donor-name" required>

                <!-- Date of Birth -->
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" required>

                <!-- Gender -->
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>

                <!-- Blood Type -->
                <label for="blood-type">Blood Type</label>
                <select id="blood-type" name="blood-type" required>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>

                <!-- Contact Information -->
                <label for="contact-number">Contact Information</label>
                <input type="tel" id="contact-number" name="contact-number" placeholder="Phone Number" required>
                <input type="email" id="email" name="email" placeholder="Email Address" required>

                <!-- Health History -->
                <label for="health-history">Health History</label>
                <textarea id="health-history" name="health-history" placeholder="Provide any relevant health history (e.g., previous illnesses, medications)" required></textarea>

                <!-- Last Donation Date -->
                <label for="last-donation">Last Donation Date</label>
                <input type="date" id="last-donation" name="last-donation">

                <!-- Submit Button -->
                <button type="submit" name="submit_detail" class="btn btn-danger">Submit Donation</button>
            </form>
        </div>
    </div>
</section>


<?php
include('includes/footer.php');
?>
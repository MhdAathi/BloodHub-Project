<?php
session_start();
// include('admin/authentication.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<style>
    /* Form Section Styles */
    .form-section {
        padding: 40px 0;
        /* Padding for top and bottom */
        background-color: #f9f9f9;
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
        background-color: #28a745;
        /* Green background color */
        cursor: pointer;
        /* Pointer cursor on hover */
        transition: background-color 0.3s ease;
        /* Smooth transition for background color */
    }

    .form-wrapper button:hover {
        background-color: #218838;
        /* Darker green on hover */
    }
</style>

<!-- Request Blood Content -->
<section class="form-section">
    <div class="container mt-5">
        <?php include('message.php') ?>
        <div class="form-wrapper">
            <h2>Request Blood</h2>
            <form action="submit_request.php" method="POST">

                <!-- Hospital Name -->
                <label">Hospital Name</label>
                    <input type="text" id="hospital-name" name="hospital_name" required>

                    <!-- Blood Group -->
                    <label>Blood Group</label>
                    <select id="blood-type" name="blood_type" required>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>

                    <!-- Quantity -->
                    <label>Quantity (units)</label>
                    <input type="number" id="quantity" name="quantity" min="1" required>

                    <!-- Urgency Level -->
                    <label>Urgency Level</label>
                    <select id="urgency-level" name="urgency_level" required>
                        <option value="routine">Routine</option>
                        <option value="urgent">Urgent</option>
                        <option value="emergency">Emergency</option>
                    </select>

                    <!-- Date Needed -->
                    <label>Date Needed</label>
                    <input type="date" id="date-needed" name="date_needed" required>

                    <!-- Additional Information -->
                    <label>Additional Information</label>
                    <textarea id="additional-info" name="additional_info"></textarea>

                    <!-- Submit Button -->
                    <button type="submit" name="submit_btn" class="btn btn-success">Submit Request</button>
            </form>
        </div>
    </div>
</section>

<?php
include('includes/footer.php');
?>
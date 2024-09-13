<?php
include('includes/header.php');
include('includes/navbar.php');
include('config/dbcon.php'); // Make sure to include your DB connection file

// Check if 'id' is present in the query string
if (isset($_GET['id'])) {
    $donor_id = $_GET['id'];

    // Retrieve donor details from the database
    $query = "SELECT * FROM donor_history WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $donor_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $donor = $result->fetch_assoc();
    } else {
        // Handle case where no donor is found
        die("Donor not found.");
    }
} else {
    // Handle case where 'id' is not present
    die("No donor ID provided.");
}
?>

<div class="container-fluid px-4">
    <h3 class="mt-4">Schedule Donation</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item active">Schedule Donation</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <!-- Show session messages -->
            <?php include('C:\xampp\htdocs\bb\message.php'); ?>

            <div class="card">
                <div class="card-header">
                    <h4>Schedule Donation for <?= htmlspecialchars($donor['donor_name']); ?></h4>
                </div>
                <div class="card-body">
                    <form action="process_schedule.php" method="POST">
                        <input type="hidden" name="donor_id" value="<?= htmlspecialchars($donor['id']); ?>">

                        <div class="form-group mb-3">
                            <label for="scheduled_date">Scheduled Date:</label>
                            <input type="date" id="scheduled_date" name="scheduled_date" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="time_slot">Time Slot:</label>
                            <input type="time" id="time_slot" name="time_slot" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="location">Location:</label>
                            <input type="text" id="location" name="location" class="form-control" required>
                        </div>

                        <button type="submit" name="schedule_btn" class="btn btn-primary mt-2">Schedule Donation</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
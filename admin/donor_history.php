<?php
session_start();
include('authentication.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid px-4">
    <h3 class="mt-4">Donor History</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item active">Donor History</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <!-- Show session messages -->
            <?php include('../message.php'); ?>

            <div class="card">
                <div class="card-header">
                    <h4>All Donor Details</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Donor Name</th>
                                <th>Date of Birth</th>
                                <th>Gender</th>
                                <th>Blood Group</th>
                                <th>Contact Information</th>
                                <th>Health History</th>
                                <th>Last Donation Date</th>
                                <th>Donation Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Fetch donor history from the database
                            $query = "SELECT * FROM donor_history";
                            $query_run = mysqli_query($con, $query);

                            if ($query_run) {
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $row) {
                                        ?>
                                        <tr>
                                            <td><?= htmlspecialchars($row['id']); ?></td>
                                            <td><?= htmlspecialchars($row['donor_name']); ?></td>
                                            <td><?= htmlspecialchars($row['dob']); ?></td>
                                            <td><?= ucfirst(htmlspecialchars($row['gender'])); ?></td>
                                            <td><?= htmlspecialchars($row['blood_group']); ?></td>
                                            <td><?= htmlspecialchars($row['contact_number']); ?><br><?= htmlspecialchars($row['email']); ?>
                                            </td>
                                            <td><?= htmlspecialchars($row['health_history']); ?></td>
                                            <td><?= htmlspecialchars($row['last_donation_date']); ?></td>

                                            <!-- Show human-readable donation status -->
                                            <td>
                                                <?php
                                                if ($row['donation_status'] == 0) {
                                                    echo "Pending";
                                                } elseif ($row['donation_status'] == 1) {
                                                    echo "Scheduled";
                                                } elseif ($row['donation_status'] == 2) {
                                                    echo "Donated";
                                                } elseif ($row['donation_status'] == 3) {
                                                    echo "Canceled";
                                                }
                                                ?>
                                            </td>

                                            <td>
                                                <!-- Check donation status and display appropriate action buttons -->
                                                <?php if ($row['donation_status'] == 0): ?>
                                                    <!-- Show the "Schedule" button for pending donations -->
                                                    <a href="schedule.php?id=<?= htmlspecialchars($row['id']); ?>"
                                                        class="btn btn-primary btn-sm">Schedule</a>
                                                <?php elseif ($row['donation_status'] == 1): ?>
                                                    <!-- Show "Add Blood" button if the donation is scheduled -->
                                                    <a href="add_blood.php?id=<?= htmlspecialchars($row['id']); ?>"
                                                        class="btn btn-success btn-sm">Add Blood</a>
                                                <?php elseif ($row['donation_status'] == 2): ?>
                                                    <!-- Show "Donated" status -->
                                                    <a href="schedule.php?id=<?= htmlspecialchars($row['id']); ?>"
                                                        class="btn btn-primary btn-sm">Schedule</a>
                                                <?php elseif ($row['donation_status'] == 3): ?>
                                                    <!-- Show "Canceled" status -->
                                                    <a href="schedule.php?id=<?= htmlspecialchars($row['id']); ?>"
                                                        class="btn btn-primary btn-sm">Schedule</a>
                                                <?php endif; ?>
                                            </td>

                                        </tr>
                                        <?php
                                    }
                                } else {
                                    // If no records found
                                    echo '<tr><td colspan="10">No Record Found!</td></tr>';
                                }
                            } else {
                                // Handle query execution failure
                                echo '<tr><td colspan="10">Error fetching records: ' . htmlspecialchars(mysqli_error($con)) . '</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>
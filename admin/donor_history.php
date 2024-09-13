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
            <?php include('C:\xampp\htdocs\bb\message.php'); ?>

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
                                <th>Last Donation Date</th>
                                <th>Donation Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM donor_history";  // Modify the query to match your table
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) {
                            ?>
                                    <tr>
                                        <td><?= $row['id']; ?></td>
                                        <td><?= $row['donor_name']; ?></td>
                                        <td><?= $row['dob']; ?></td>
                                        <td><?= ucfirst($row['gender']); ?></td>
                                        <td><?= $row['blood_group']; ?></td>
                                        <td><?= $row['contact_number']; ?><br><?= $row['email']; ?></td>
                                        <td><?= $row['donation_date']; ?></td>
                                        <td><?= ucfirst($row['donation_status']); ?></td>
                                        <td>
                                            <?php if ($row['donation_status'] == 'pending') : ?>
                                                <a href="schedule.php?id=<?= htmlspecialchars($row['id']); ?>" class="btn btn-primary btn-sm">Schedule</a>
                                            <?php elseif ($row['donation_status'] == 'donated') : ?>
                                                <span class="badge bg-success">Donated</span>
                                            <?php elseif ($row['donation_status'] == 'canceled') : ?>
                                                <span class="badge bg-danger">Canceled</span>
                                            <?php endif; ?>
                                        </td>

                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="9">No Record Found!</td>
                                </tr>
                            <?php
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
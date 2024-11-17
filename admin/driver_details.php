<?php
include('authentication.php');
include ('middleware/admin_auth.php');
include('includes/header.php');
?>

<div class="container-fluid px-4">
    <h3 class="mt-4">Drivers</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item active">Drivers</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <!-- <?php include('../message.php'); ?>  -->
            <div class="card">
                <div class="card-header">
                    <h4>Registered Drivers
                        <a href="../driver_register.php" class="btn btn-primary float-end">Add Driver</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Driver Name</th>
                                <th>Contact Number</th>
                                <th>Email</th>
                                <th>License Number</th>
                                <th>Emergency Contact Number</th>
                                <th>Work Days</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM driver_details";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) {
                            ?>
                                    <tr>
                                        <td><?= $row['driver_id']; ?></td>
                                        <td><?= $row['driver_name']; ?></td>
                                        <td><?= $row['contact_number']; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td><?= $row['license_number']; ?></td>
                                        <td><?= $row['emergency_contact_number']; ?></td>
                                        <td style="word-wrap: break-word; white-space: normal; max-width: 200px;">
                                            <?= $row['work_days']; ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($row['status'] == 1) {
                                                echo "Active";
                                            } else {
                                                echo "Inactive";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <!-- Provide action buttons for managing blood inventory -->
                                            <a href="edit_driver.php=<?= htmlspecialchars($row['driver_id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="delete_driver.php=<?= htmlspecialchars($row['driver_id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="9"> No Record Found!</td>
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
include('includes/scripts.php');
?>
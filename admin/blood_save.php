<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('config/dbcon.php'); // Ensure your DB connection file is included
?>

<div class="container-fluid px-4">
    <h3 class="mt-4">Blood Inventory</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item active">Blood Inventory</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <!-- Show session messages -->
            <?php include('C:/xampp/htdocs/bb/message.php'); ?>

            <div class="card">
                <div class="card-header">
                    <h4>All Blood Inventory Details</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Donor Name</th>
                                <th>Blood Type</th>
                                <th>Quantity</th>
                                <th>Collection Date</th>
                                <th>Expiry Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Fetch blood inventory records from the database
                            $query = "SELECT * FROM blood_inventory";
                            $query_run = mysqli_query($con, $query);

                            if ($query_run) {
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $row) {
                            ?>
                                        <tr>
                                            <td><?= htmlspecialchars($row['id']); ?></td>
                                            <td><?= htmlspecialchars($row['donor_name']); ?></td>
                                            <td><?= htmlspecialchars($row['blood_type']); ?></td>
                                            <td><?= htmlspecialchars($row['blood_quantity']); ?></td>
                                            <td><?= htmlspecialchars($row['collection_date']); ?></td>
                                            <td><?= htmlspecialchars($row['expiry_date']); ?></td>

                                            <!-- Calculate and show blood status based on expiry date -->
                                            <td>
                                                <?php
                                                $expiry_date = new DateTime($row['expiry_date']);
                                                $current_date = new DateTime();

                                                if ($expiry_date < $current_date) {
                                                    echo "Expired";
                                                } else {
                                                    echo "Valid";
                                                }
                                                ?>
                                            </td>

                                            <td>
                                                <!-- Provide action buttons for managing blood inventory -->
                                                <a href="edit_blood.php?id=<?= htmlspecialchars($row['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="delete_blood.php?id=<?= htmlspecialchars($row['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                            <?php
                                    }
                                } else {
                                    // If no records found
                                    echo '<tr><td colspan="8">No Record Found!</td></tr>';
                                }
                            } else {
                                // Handle query execution failure
                                echo '<tr><td colspan="8">Error fetching records: ' . htmlspecialchars(mysqli_error($con)) . '</td></tr>';
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

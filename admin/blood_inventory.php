<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('config/dbcon.php'); // Ensure your DB connection file is included

// Check if blood_type is set in the GET parameters
if (isset($_GET['blood_type']) && !empty($_GET['blood_type'])) {
    $blood_type = $_GET['blood_type'];
} else {
    // Set a default value or handle the error
    $blood_type = 'default_type'; // Replace with an appropriate default type or handle as needed
    // Alternatively, you could redirect to another page or show an error message
    // header("Location: some_error_page.php");
    // exit;
}
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
            <?php include('../message.php'); ?>

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>All Blood Inventory Details (<?= $blood_type ?>)</h4>
                    <a href="add_blood.php" class="btn btn-primary btn-sm">Add Blood</a> <!-- Button to add new blood -->
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Donor ID</th>
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
                            $query = "SELECT * FROM blood_inventory WHERE blood_type = '$blood_type'";
                            $query_run = mysqli_query($con, $query);

                            if ($query_run) {
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $row) {
                            ?>
                                        <tr>
                                            <td><?= htmlspecialchars($row['id']); ?></td>
                                            <td><?= htmlspecialchars($row['donor_id']); ?></td>
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
                                                    echo '<span class="badge bg-danger">Expired</span>';
                                                } else {
                                                    echo '<span class="badge bg-success">Valid</span>';
                                                }
                                                ?>
                                            </td>

                                            <td>
                                                <!-- Provide action buttons for managing blood inventory -->
                                                <a href="edit_blood.php?id=<?= htmlspecialchars($row['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="delete_blood.php?id=<?= htmlspecialchars($row['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                                            </td>
                                        </tr>
                            <?php
                                    }
                                } else {
                                    // If no records found
                                    echo '<tr><td colspan="8">No Record Found for ' . $blood_type . ' blood type!</td></tr>';
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
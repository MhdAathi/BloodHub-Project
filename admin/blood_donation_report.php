<?php
include('authentication.php');
include('includes/header.php');
?>

<div class="container-fluid px-4">
    <h3 class="mt-4">Received Blood</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item active">Blood Received from Donors</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <?php include('../message.php'); ?>

                <div class="card-header">
                    <h4>Blood Received from Donors
                        <a href="../driver_register.php" class="btn btn-primary float-end">Generate Report</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Donor ID</th>
                                <th>Donor Name</th>
                                <th>Blood Type</th>
                                <th>Quantity (Units)</th>
                                <th>Date of Collection</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM blood_inventory";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) {
                            ?>
                                    <tr>
                                        <td><?= $row['id']; ?></td>
                                        <td><?= $row['donor_name']; ?></td>
                                        <td><?= $row['blood_type']; ?></td>
                                        <td><?= $row['blood_quantity']; ?></td>
                                        <td><?= $row['collection_date']; ?></td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="4">No Record Found!</td>
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
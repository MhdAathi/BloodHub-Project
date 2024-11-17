<?php
include('authentication.php');
include('includes/header.php');
?>

<div class="container-fluid px-4">
    <h3 class="mt-4">Dispatched Blood</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item active">Blood Sent to Hospitals</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <?php include('../message.php'); ?>

                <div class="card-header">
                    <h4>Blood Units Sent to Hospitals
                        <a href="../driver_register.php" class="btn btn-primary float-end">Generate Report</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Hospital ID</th>
                                <th>Hospital Name</th>
                                <th>Blood Type</th>
                                <th>Dispatch (Units)</th>
                                <th>Date of Dispatch</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT id, hospital_name, blood_group, dispatch_units, DATE_FORMAT(dispatch_date, '%Y-%m-%d') as dispatch_date FROM blood_dispatches";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) {
                            ?>
                                    <tr>
                                        <td><?= $row['id']; ?></td>
                                        <td><?= $row['hospital_name']; ?></td>
                                        <td><?= $row['blood_group']; ?></td>
                                        <td><?= $row['dispatch_units']; ?></td>
                                        <td><?= $row['dispatch_date']; ?></td>
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
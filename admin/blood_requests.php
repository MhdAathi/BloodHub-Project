<?php
session_start();
include('authentication.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid px-4">
    <h3 class="mt-4">Blood Requests</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item active">Blood Requests</li>
    </ol>

    <div class="row">
        <div class="col-md-12">


            <div class="card">
            <div class="card-header">
                    <h4>All Blood Requests
                        <a href="../request-blood.php" class="btn btn-primary float-end">Request</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Hospital Name</th>
                                <th>Email</th>
                                <th>Blood Group</th>
                                <th>Quantity</th>
                                <th>Urgency Level</th>
                                <th>Date Needed</th>
                                <th>Additional Information</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM blood_requests";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) {
                            ?>
                                    <tr>
                                        <td><?= $row['id']; ?></td>
                                        <td><?= $row['hospital_name']; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td><?= $row['blood_group']; ?></td>
                                        <td><?= $row['quantity']; ?></td>
                                        <td><?= $row['urgency_level']; ?></td>
                                        <td><?= $row['date_needed']; ?></td>
                                        <td><?= $row['additional_info']; ?></td>
                                        <td>
                                            <span class="badge 
    <?= $row['status'] == 'pending' ? 'bg-warning text-dark' : ($row['status'] == 'accepted' ? 'bg-success text-white' : ($row['status'] == 'dispatched' ? 'bg-info text-white' : 'bg-danger text-white')) ?>">
                                                <?= ucfirst($row['status']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <?php if ($row['status'] == 'pending'): ?>
                                                <form action="process_request.php" method="POST" style="display:inline;">
                                                    <input type="hidden" name="request_id" value="<?= $row['id']; ?>">
                                                    <button type="submit" name="accept_btn" class="btn btn-success btn-sm">Accept</button>
                                                </form>
                                                <form action="process_request.php" method="POST" style="display:inline;">
                                                    <input type="hidden" name="request_id" value="<?= $row['id']; ?>">
                                                    <button type="submit" name="reject_btn" class="btn btn-danger btn-sm">Reject</button>
                                                </form>
                                            <?php elseif ($row['status'] == 'accepted'): ?>
                                                <form action="dispatch_blood.php" method="POST" style="display:inline;">
                                                    <input type="hidden" name="request_id" value="<?= $row['id']; ?>">
                                                    <button type="submit" name="dispatch_btn" class="btn btn-primary btn-sm">Dispatch</button>
                                                </form>
                                            <?php elseif ($row['status'] == 'dispatched'): ?>
                                                <form action="dispatch_report.php" method="POST" style="display:inline;">
                                                    <input type="hidden" name="request_id" value="<?= $row['id']; ?>">
                                                    <button type="submit" name="dispatch_report_btn" class="btn btn-primary btn-sm">View Report</button>
                                                </form>
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
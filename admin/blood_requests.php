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
                    <h4>All Blood Requests</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Hospital Name</th>
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
                                        <td><?= $row['blood_group']; ?></td>
                                        <td><?= $row['quantity']; ?></td>
                                        <td><?= $row['urgency_level']; ?></td>
                                        <td><?= $row['date_needed']; ?></td>
                                        <td><?= $row['additional_info']; ?></td>
                                        <td><?= ucfirst($row['status']); ?></td>
                                        <td>
                                            <?php if ($row['status'] == 'pending'): ?>
                                                <form action="process_request.php" method="POST" style="display:inline;">
                                                    <input type="hidden" name="request_id" value="<?= $row['id']; ?>">
                                                    <button type="submit" name="accept_btn"
                                                        class="btn btn-success btn-sm">Accept</button>
                                                </form>
                                                <form action="process_request.php" method="POST" style="display:inline;">
                                                    <input type="hidden" name="request_id" value="<?= $row['id']; ?>">
                                                    <button type="submit" name="reject_btn"
                                                        class="btn btn-danger btn-sm">Reject</button>
                                                </form>
                                            <?php else: ?>
                                                <!-- If already accepted or rejected, no action buttons -->
                                                <span
                                                    class="badge <?= $row['status'] == 'accepted' ? 'bg-success' : 'bg-danger'; ?>">
                                                    <?= ucfirst($row['status']); ?>
                                                </span>
                                            <?php endif; ?>
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
?>
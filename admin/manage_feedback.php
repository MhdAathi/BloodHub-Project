<?php
include('authentication.php');
include('middleware/admin_auth.php');
include('includes/header.php');
?>

<style>
    .form-container {
        display: flex;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .form-container input {
        border: 1px solid #ced4da;
        border-radius: 5px;
        padding: 8px;
        font-size: 14px;
        width: 200px;
    }

    .form-container input:focus {
        border-color: #007bff;
        outline: none;
    }

    .query-column {
        width: 40%; /* Adjust the width as needed */
        word-wrap: break-word; /* Ensure long queries wrap to the next line */
    }
</style>

<div class="container-fluid px-4">
    <h3 class="mt-4">Feedback</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item active">User Feedback</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <?php include('../message.php'); ?>

            <div class="card">
                <div class="card-header">
                    <h4>User Feedback</h4>
                </div>
                <div class="card-body">
                    <!-- Search Filter -->
                    <div class="form-container">
                        <input type="text" id="nameFilter" placeholder="Search by Name">
                    </div>

                    <table class="table table-bordered" id="feedbackTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th class="query-column">Query</th>
                                <th>Submitted At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM feedback";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) {
                            ?>
                                    <tr>
                                        <td><?= $row['id']; ?></td>
                                        <td><?= $row['name']; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td><?= $row['query']; ?></td>
                                        <td><?= $row['submitted_at']; ?></td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6" class="text-center">No Feedback Found!</td>
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

<script>
    // JavaScript for Filtering the Feedback Table
    document.addEventListener('input', function() {
        const nameFilter = document.getElementById('nameFilter').value.toLowerCase();

        const rows = document.querySelectorAll('#feedbackTable tbody tr');

        rows.forEach(row => {
            const name = row.children[1].textContent.toLowerCase(); // Name column

            row.style.display =
                (name.includes(nameFilter) || !nameFilter) ? '' : 'none';
        });
    });
</script>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>
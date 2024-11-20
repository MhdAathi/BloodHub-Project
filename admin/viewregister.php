<?php
include('authentication.php');
include('middleware/admin_auth.php');
include('includes/header.php');
?>

<style>
    /* Container for the form */
    .form-container {
        background-color: #f8f9fa;
        /* Light gray background */
        border-radius: 8px;
        /* Rounded corners */
        padding: 20px;
        /* Padding around the form */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        /* Subtle shadow */
        margin-bottom: 20px;
        /* Space below the form */
    }

    /* Form header */
    .form-header {
        margin-bottom: 20px;
        /* Space below the header */
    }

    /* Styling for input fields and select elements */
    .form-control {
        border: 1px solid #ced4da;
        /* Light border */
        border-radius: 5px;
        /* Rounded corners */
        padding: 8px;
        /* Reduced padding for smaller size */
        font-size: 14px;
        /* Reduced font size */
        transition: border-color 0.3s;
        /* Smooth transition for border color */
    }

    /* Focus state for input fields */
    .form-control:focus {
        border-color: #007bff;
        /* Change border color on focus */
        outline: none;
        /* Remove default outline */
    }

    /* Styling for labels */
    label {
        font-size: 14px;
        /* Reduced font size for labels */
        margin-right: 10px;
        /* Space between label and input */
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .form-control {
            font-size: 12px;
            /* Further reduce font size on smaller screens */
        }
    }
</style>

<div class="container-fluid px-4">
    <h3 class="mt-4">Users</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item active">Users</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <?php include('../message.php'); ?>

            <!-- Search Filters -->
            <form method="POST" class="mb-4 d-flex align-items-center">
                <!-- Name Filter -->
                <input type="text" name="name" class="form-control me-2" style="max-width: 200px;" placeholder="Search by Name"
                    value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">

                <!-- Role Filter -->
                <select name="role" class="form-control me-2 " style="max-width: 200px;">
                    <option value="">Select Role</option>
                    <option value="Admin" <?= (isset($_POST['role']) && $_POST['role'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                    <option value="Staff" <?= (isset($_POST['role']) && $_POST['role'] == 'Staff') ? 'selected' : ''; ?>>Staff</option>
                    <option value="Hospital" <?= (isset($_POST['role']) && $_POST['role'] == 'Hospital') ? 'selected' : ''; ?>>Hospital</option>
                    <option value="Driver" <?= (isset($_POST['role']) && $_POST['role'] == 'Driver') ? 'selected' : ''; ?>>Driver</option>
                    <option value="Donor" <?= (isset($_POST['role']) && $_POST['role'] == 'Donor') ? 'selected' : ''; ?>>Donor</option>
                </select>

                <!-- Search Button -->
                <button type="submit" class="btn btn-primary">Search</button>
            </form>

            <div class="card">
                <div class="card-header">
                    <h4>Registered Users</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Get filter values
                            $name = isset($_POST['name']) ? $_POST['name'] : '';
                            $role = isset($_POST['role']) ? $_POST['role'] : '';

                            // Build query with filters
                            $query = "SELECT * FROM user WHERE 1=1";
                            if (!empty($name)) {
                                $query .= " AND name LIKE '%$name%'";
                            }
                            if (!empty($role)) {
                                $query .= " AND role = '$role'";
                            }

                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) {
                            ?>
                                    <tr>
                                        <td><?= $row['id']; ?></td>
                                        <td><?= $row['name']; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td><?= $row['role']; ?></td>
                                        <td><a href="register-edit.php?id=<?= $row['id']; ?>" class="btn btn-success">Edit</a></td>
                                        <td>
                                            <form action="code.php" method="POST">
                                                <button type="submit" name="user_delete" value="<?= $row['id']; ?>" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6" class="text-center">No Record Found!</td>
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
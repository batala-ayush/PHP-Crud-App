<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
  header("Location: index.php"); // Redirect to login page if not logged in
  exit;
}
?>

<?php include('company/header.php'); ?>

<div class="container mt-6">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="content-container p-4 rounded border shadow">
                <h2 class="mb-4">CRUD Operations</h2>
                <div class="d-grid gap-3">
                    <!-- Company Button -->
                    <a href="company/company.php" class="btn btn-primary btn-lg">CRUD Operation for Company</a>

                    <!-- Employee Button -->
                    <a href="employee/employee.php" class="btn btn-primary btn-lg">CRUD Operation for Employee</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('company/footer.php'); ?>

<?php include('header.php'); ?>
<?php include('../dbconnection.php') ?>

<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
  header("Location: ../index.php"); // Redirect to login page if not logged in
  exit;
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-auto">
            <a href="insert_data.php" class="btn btn-primary">ADD COMPANY</a>
        </div>
    </div>
</div>

<div class="container mt-5">
    <?php if(isset($_GET['insert_msg'])): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($_GET['insert_msg']); ?></div>
    <?php endif; ?>



    <?php if(isset($_GET['update_msg'])): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($_GET['update_msg']); ?></div>
    <?php endif; ?>

    <?php if(isset($_GET['delete_msg'])): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($_GET['delete_msg']); ?></div>
    <?php endif; ?>

	<div class="box1">
        <h2>Company Detail</h2>
    </div>

    <div class="box2 p-4 rounded border shadow">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Company</th>
                    <th>Address</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM company";
                $result = mysqli_query($conn, $query);

                if(!$result) {
                    die("Query Failed: " . mysqli_error());
                } else {
                    while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['companyName']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><a href="c_update_page.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Update</a></td>
                            <td><a href="c_delete_page.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('footer.php'); ?>

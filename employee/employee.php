<?php include('../company/header.php'); ?>
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
            <a href="e_insert_data.php" class="btn btn-primary">ADD EMPLOYEE</a>
        </div>
    </div>
</div>
<div class="container mt-5">
	<?php if(isset($_GET['e_insert_msg'])): ?>
		<div class="alert alert-success"><?php echo htmlspecialchars($_GET['e_insert_msg']); ?></div>
	<?php endif; ?>



	<?php if(isset($_GET['e_update_msg'])): ?>
		<div class="alert alert-success"><?php echo htmlspecialchars($_GET['e_update_msg']); ?></div>
	<?php endif; ?>

	<?php if(isset($_GET['e_delete_msg'])): ?>
		<div class="alert alert-danger"><?php echo htmlspecialchars($_GET['e_delete_msg']); ?></div>
	<?php endif; ?>
	
	<div class="box1">
		<h2>Employee Detail</h2>
	</div>



	<div class="box2 p-4 rounded border shadow">
		<table class="table table-hover " >
			<thead>
				<tr>
					<th>Name</th>
					<th>Salary</th>
					<th>Date Of Birth</th>
					<th>Company</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$query = "SELECT * FROM `Employee`";

					$result = mysqli_query($conn, $query);

					if(!$result){
						die("Query Failed: " . mysqli_error($conn));
					}
					else{
						while($row = mysqli_fetch_assoc($result)){
							?>
								<tr>
									<td> <?php echo $row['name']; ?> </td>
									<td> <?php echo $row['salary']; ?> </td>
									<td> <?php echo $row['dateOfBirth']; ?> </td>
									<td> <?php echo $row['company']; ?> </td>
									<td><a href="e_update_page.php?id=<?php echo $row['id']; ?> " class="btn btn-primary">Update</a></td>
									<td><a href="e_delete_page.php?id=<?php echo $row['id']; ?> " class="btn btn-danger">Delete</a></td>
								</tr>
							<?php
						}
					}
				?>
			</tbody>
		</table>
	</div>
</div>

<?php include('../company/footer.php'); ?>

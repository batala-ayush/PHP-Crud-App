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

	<?php 
		if(isset($_GET['id'])){
			$id = $_GET['id'];

			$query = "select * from Employee where `id` = '$id' ";

			$result = mysqli_query($conn, $query);

			if(!$result){
				die("query Failed".mysqli_error());
			}
			else{
				$row = mysqli_fetch_assoc($result);
			}	
		}
	?>


	<?php


		if(isset($_POST['update_employee']))
		{
			if(isset($_GET['id_new']))
			{
				$id_new = $_GET['id_new'];
			}

			$e_name = $_POST['e_name'];
			$e_salary = $_POST['e_salary'];
			$e_dob = $_POST['e_dob'];
			$e_company = $_POST['e_company'];



			$query = "update Employee set `name`='$e_name', `salary` ='$e_salary', `dateOfBirth`= '$e_dob', `company`= '$e_company' where `id`= '$id_new'";

			$result = mysqli_query($conn, $query);

			if(!$result)
			{
				die("query Failed".mysqli_error());
			}
			else
			{
				header('location:employee.php?e_update_msg=UPDATED SUCCESSFULLY!');;
				exit();
			}
		}


	?>

	<div class="container">
	<form action="e_update_page.php?id_new=<?php echo $id; ?>" method="post" class="col-lg-4 col-md-6 col-sm-8 mx-auto">
		<h1>Update Details</h1>
		<div class="mb-3">
			<label for="e_name" class="form-label">Employee Name</label>
			<input type="text" class="form-control" id="e_name" name="e_name" value="<?php echo $row['name'] ?>">
		</div>
		<div class="mb-3">
			<label for="e_salary" class="form-label">Salary</label>
			<input type="number" class="form-control" id="e_salary" name="e_salary" value="<?php echo $row['salary'] ?>">
		</div>
					<div class="mb-3">
			<label for="e_dob" class="form-label">Date of Birth</label>
			<input type="Date" class="form-control" id="e_dob" name="e_dob" value="<?php echo $row['dateOfBirth'] ?>">
		</div>
					<div class="mb-3">
			<label for="e_company" class="form-label">Company</label>
			<input type="text" class="form-control" id="e_company" name="e_company" value="<?php echo $row['company'] ?>">
		</div>
		<button type="submit" class="btn btn-primary" name="update_employee">UPDATE</button>
	</form>
	</div>



	<?php include('../company/footer.php'); ?>
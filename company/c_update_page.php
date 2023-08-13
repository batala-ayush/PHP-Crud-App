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

<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "SELECT * FROM company WHERE `id` = '$id' ";

    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query Failed: " . mysqli_error());
    }
    else{
        $row = mysqli_fetch_assoc($result);
    }	
}
?>


<?php
if(isset($_POST['update_company']))
{
    if(isset($_GET['id_new']))
    {
        $id_new = $_GET['id_new'];
    }

    $c_name = $_POST['c_name'];
    $c_address = $_POST['c_address'];

    $query = "UPDATE company SET `companyName`='$c_name', `address`='$c_address' WHERE `id`='$id_new'";

    $result = mysqli_query($conn, $query);

    if(!$result)
    {
        die("Query Failed: " . mysqli_error());
    }
    else
    {
        header('location:company.php?update_msg=UPDATED SUCCESSFULLY!');
        exit();
    }
}
?>

<div class="container">
    <form action="c_update_page.php?id_new=<?php echo $id; ?>" method="post" class="col-lg-4 col-md-6 col-sm-8 mx-auto">
        <h1>Update Details</h1>
        <div class="mb-3">
            <label for="c_name" class="form-label">Company Name</label>
            <input type="text" class="form-control" name="c_name" value="<?php echo $row['companyName'] ?>">
        </div>
        <div class="mb-3">
            <label for="c_address" class="form-label">Address</label>
            <input type="text" class="form-control" name="c_address" value="<?php echo $row['address'] ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="update_company">UPDATE</button>
    </form>
</div>

<?php include('footer.php'); ?>

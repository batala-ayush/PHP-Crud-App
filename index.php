<?php include('company/header.php'); ?>

<div class="container">
  <div class="container">
    
    <div class="row justify-content-center"> <!-- This class will center its children horizontally -->
      
      <form id="login_form" action="login.php" method="post" class="col-lg-4 col-md-6 col-sm-8">
        <h1 id="login_form_title">Log In</h1>
        <!-- 
          The classes 'col-lg-4 col-md-6 col-sm-8' will set the form width to a reasonable size
          on different screen sizes (large, medium, and small).
        -->
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary" name="login">Log In</button>
      </form>
    </div>
    <div class="d-flex justify-content-center mt-3">
        <small class="text-muted" style="font-size: 16px;">
            Need an Account? <a href="signup.php">Register</a>
        </small>
    </div>
    <div id="login_error" style="color: red;"></div>
  </div>


  <?php

    if(isset($_GET['invalid_password_msg'])){
      echo "<h6>".htmlspecialchars($_GET['invalid_password_msg'])."</h6>";
    }

    if(isset($_GET['no_user_msg'])){
      echo "<h6>".htmlspecialchars($_GET['no_user_msg'])."</h6>";
    }

  ?>

</div>




<?php include('company/footer.php'); ?>
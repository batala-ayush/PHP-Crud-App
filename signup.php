<?php include('company/header.php'); ?>

<!-- below is form-->

<div class="container">
  <div class="container">
    <div class="row justify-content-center"> <!-- This class will center its children horizontally -->
      <form id="signup_form" action="signup_push.php" method="post" class="col-lg-4 col-md-6 col-sm-8">
        <h1 id="login_form_title">Register</h1>
        <!-- 
          The classes 'col-lg-4 col-md-6 col-sm-8' will set the form width to a reasonable size
          on different screen sizes (large, medium, and small).
        -->
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="s_username" name="s_username">
          <div id="u_signup_error" style="color: red;"></div>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="s_password" name="s_password">
          <div id="p_signup_error" style="color: red;"></div>
        </div>
        <button type="submit" class="btn btn-primary" name="signup">Sign Up</button>
      </form>

    </div>
    <div class="d-flex justify-content-center mt-3">
        <small class="text-muted" style="font-size: 16px;">
            Already Have An Account? <a href="index.php">Log In</a>
        </small>
    </div>
    
  </div>
</div>



<?php include('company/footer.php'); ?>

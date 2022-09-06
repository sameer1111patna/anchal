<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "inc/link.php"; ?>
</head>
<body class="hold-transition login-page">
<div class="login-box">

<?php

if($_POST){
if(isset($_POST['log_btn'])){





	
	
	
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);
	
	$tablename='admin_tb';
	
	
	$cookie_field_names=array("username","password");
	
	
		$validLogin = $classhelper->login($username, $password,$tablename,$cookieadminname1,$cookieadminname2,$cookie_field_names);
	 
	
	
	
	if($validLogin)
	{
	
	
	?>
<div class="alert alert-success">
  <strong>Congratulations Login Success!</strong> Please Wait Redirecting....
</div>
<meta http-equiv="refresh" content="2;URL=<?php echo $admin_base_url; ?>">

	<?php
	
	}
	else {
	
	
	?>

<div class="alert alert-danger">
  <strong>Failed!</strong> Please Enter Valid UserName/Password.
</div>

	<?php
	
	
	
	}
	
	}

}

if(@$_SESSION['logout']=='1'){
?>

<div class="alert alert-success">
  <strong>Congratulations Logout Success!</strong> Please Login To Continue
</div>

<?php

}

  ?>
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index/" class="h1"><b>Anchal </b>Admin</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control"  name="username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="log_btn" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!--<div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      social-auth-links -->

      <!--<p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>-->
    
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="plugins/toastr/toastr.min.js"></script>
<?php 
    
    
    @$status=$_GET['status'];
    
    if($status=='loginsuccess'){
        
        ?>
        
       <script> toastr.success('Congratulations.', 'Successfully Logged in As Admin', {timeOut: 5000})</script>
        <?php
        
        
    }
    elseif($status=='logoutsuccess'){
        
        ?>
        
       <script> toastr.success('Congratulations.', 'Successfully Logged Out', {timeOut: 5000})</script>
        <?php
        
        
    }
    elseif($status=='failedtologout'){
        
        ?>
        
       <script> toastr.error('!!Opps.', ' Logged Out Failed', {timeOut: 5000})</script>
        <?php
        
        
    }
    elseif($status=='pleaselogin'){
        
        ?>
        
       <script> toastr.warning('Login To Continue', 'Login To Access Admin', {timeOut: 5000})</script>
        <?php
        
        
    }
        elseif($status=='wrongcredentials'){
        
        ?>
        
       <script> toastr.warning('!!Opps.', 'Wrong Password Please Try Again', {timeOut: 5000})</script>
        <?php
        
        
    }else if($status=='successfullyadded'){
        
        ?>
        
       <script> toastr.success('Congratulations', 'Your Data added Successfully', {timeOut: 5000})</script>
        <?php
        
        
    }else if($status=='failedtoadd'){
        
        ?>
        
       <script> toastr.error('!!Opps', 'Your Data Not Added please Try Again ', {timeOut: 5000})</script>
        <?php
        
        
    }elseif($status=='successfullydeleted'){
        
        ?>
        
       <script> toastr.success('Congratulations', 'Your Data Successfully Deleted', {timeOut: 5000})</script>
        <?php
        
        
    }elseif($status=='failedtodelete'){
        
        ?>
        
       <script> toastr.error('!!Opps', 'Your Data Not Deleted Please Try Again', {timeOut: 5000})</script>
        <?php
        
        
    }elseif($status=='successfullyedited'){
        
        ?>
        
       <script> toastr.success('Congratulations', 'Your Data Successfully Edited', {timeOut: 5000})</script>
        <?php
        
        
    }elseif($status=='failedtoedit'){
        
        ?>
        
       <script> toastr.error('!!Opps', 'Your Data Not Edited Please Try Again', {timeOut: 5000})</script>
        <?php
        
        
    }

    session_destroy();
    
    ?>
</body>
</html>

<!-- /*
Lead Developers: Albert Warner &  Olufemi Olusina
Description: This page is Diplays the login page , Using bootstrap
*/ -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

  <!--========================CSS styling for the login page========================-->
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="css/style.css?<?php echo time();?>"> <!-- Refresh the css at all times, makes it look like a new page has been loaded not old css -->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

  <!--========================JS styling for the login page========================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>


</head>
<body>

  <div class="limiter">

      <div class="container-login100">

        <!--WRAPPER-->
        <div class="wrap-login100">

          <!--HEAD-->
          <div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
            <span class="login100-form-title-1">
              Sign In
            </span>
          </div>

          <!--FORM-->
          <?php $self= htmlentities($_SERVER['PHP_SELF']);
          echo("<form action='index.php' method='POST' data-toggle='validator' class='login100-form validate-form'>")
          ?>
            <!--USERNAME-->
            <div class="wrap-input100 form-group validate-input m-b-26 <?php if(($validateUsername == true) || ($validateEmpty == true)) { echo 'alert-validate'; } ?>" 
                 data-validate="Username is invalid.">
              <span class="label-input100">Username</span>
              <input class="input100" type="text" name="username" placeholder="Enter username" value="<?= isset($_POST['username']) ? $_POST['username'] : ''; ?>" >
              <span class="focus-input100"></span>
            </div>

            <!--PASSWORD-->
            <div class="wrap-input100 form-group log-status validate-input m-b-18 <?php if(($validatePass == true) || ($validateEmpty == true)) { echo 'alert-validate'; } ?>" 
                 data-validate = "Password is invalid.">
              <span class="label-input100">Password</span>
              <input class="input100" type="password" name="password" placeholder="Enter password" value="<?= isset($_POST['password']) ? $_POST['password'] : ''; ?>" id="passInput">
              <span class="focus-input100"></span>
            </div>

            <!-- An element to toggle between password visibility -->
            <div class="form-group input100">
              <input id="showPass" type="checkbox" onclick="myFunction()"/> Show Password
            </div>

            <br><br>

            <div class="container-login100-form-btn">
              <!--<input type='submit' class="login100-form-btn" name='login' value='Login' >-->
              <button type='submit' class="login100-form-btn" name='login' value='Login'>
                Login
              </button>
            </div>

          </form>

        </div>

      </div>

  </div>
          
<script>
  function myFunction() {
    var x = document.getElementById("passInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>

</body>
</html>



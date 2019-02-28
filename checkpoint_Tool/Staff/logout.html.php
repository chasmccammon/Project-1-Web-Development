<?php 
session_start(); //refreshes session since a valid SID exit (type in by the user)
include 'accessControl.php';
$_SESSION =array();
session_destroy();
?>
<!-- /*
Albert Warner &  Olufemi Olusina
Web 2 programming
Web 2 project
This page is Diplays the log out page , ends session
*/ -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

   <!-- Bootstrap CSS CDN -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="css/style4.css?<?php echo time();?>">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <title>Login out page</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
</head>
<body>
<div class="container3">
    <!--<h1 class="title">You have been logged out</h1>-->
    <script type="text/javascript">
            alert("You have been logged out, Thank you");
            window.location.href = "login.php";
    </script>
    <p> <a  class="button" href='login.php' id="home">Login Page</a></p>
    
</div>




</body>
</html>
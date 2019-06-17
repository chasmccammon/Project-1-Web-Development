<!-- /*
Lead Developers: Albert Warner &  Olufemi Olusina
Description: This page is the welcome page for a new setup.
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
    <link rel="stylesheet" href="../Staff/css/style4.css?<?php echo time();?>">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <title>Kia Ora!</title>
</head>
<body>
    <form class="login.php" action = '../Staff/login.php' method = 'POST'>

        <div class="container3">
            <h1 class="title">Kia Ora!</h1>

            <br><br>
            <p><h4>User: <?= $adminName[0];?> has been setup for <?=$course?>!</h4> </p>
            <br>
            <p class= "alert alert-info text-center"> Tip: Click on "Login" Button. Navigate to the Database tab on the Menu, and upload Students CSV File. </p>
            <br>
                
            <div class="form-group  col-sm-12">
                <input class="button btn btn-info btn-lg" type='submit' name='submit' value='Login' />
            </div>   
        </div>
    </form>    
    
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

    <!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script> 

</body>
</html>
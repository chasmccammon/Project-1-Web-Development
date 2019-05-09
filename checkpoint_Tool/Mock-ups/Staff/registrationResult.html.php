<!-- /*
Lead Developers: Albert Warner &  Olufemi Olusina
Description: This page ask for user input to add admin , if admin added this page is displayed
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

    <title>Add Administrator</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
</head>
<body>
    <form class="registration" action = 'addadmincontroller.php' method = 'POST'>
        
    <?php include 'navigation.php' ?>

        <div class="container3">
            <h3 class="resultheading">New administrator, <?= $name ?> has been added successfully to row <?=$lastOne?>!.</h3> 

            <input class="button btn btn-info btn-lg" type='submit' name='return' value='Return' />
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
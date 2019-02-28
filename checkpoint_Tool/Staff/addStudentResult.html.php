<!-- /* 
Lead Developers: Albert Warner &  Olufemi Olusina
Description: The Page is add student result , if student added correct this the result page

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
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <title>Add Student</title>
</head>
<body>
    <form class="addStudentController.php" action = 'addStudentController.php' method = 'POST'>
    <?php include 'navigation.php' ?>

        <div class="container3">
            <h3 class="resultheading">New student, <?= $name ?> has been added successfully to row <?=$lastOne?>!.</h3> 

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
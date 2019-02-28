<?PHP
if(!isset($_SESSION)) { session_start(); } //refreshes session since a valid SID exit (type in by the user)
include 'accessControl.php';
?>
<!-- /* 
Lead Developers: Albert Warner &  Olufemi Olusina
Description: The Page is allows the admin to add a user

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
                <h1 class="title">Add Student</h1>
                <br>
                <br>
                    <div class="form-group">
                    <label id="labels"  class="control-label  col-sm-4" >Student ID:</label>
                    <div class="col-sm-4">
                            <input id="regularExpression2" class="form-control" type="text" name="studentNumber" placeholder="Student Number" pattern="(^[0-9]+$)" title="Enter 0-9 Characters" required> 
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label id="labels"  class="control-label  col-sm-4" >First Name:</label>
                        <div class="col-sm-4">
                            <input id="regularExpression1" class="form-control" type="text" name="firstname" placeholder="First Name" pattern="(^[-a-z-A-Z,.'\s]+$)" title="Enter A-Z Characters" required> 
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">    
                        <label id="labels"  class="control-label  col-sm-4" >Last Name:</label>
                        <div class="col-sm-4">
                            <input id="regularExpression" class="form-control" pattern="(^[-a-z-A-Z,.'\s]+$)" title="Enter A-Z Characters" type="text" name="lastname" placeholder="Last Name" required> 
                        </div>
                    </div>
                    <br>
                    <br>                  
                        <input class="button btn btn-info btn-lg" type='submit' name='submit' value='Submit' />
                    
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
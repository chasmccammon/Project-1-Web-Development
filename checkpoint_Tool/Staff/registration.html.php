<!-- /*
Lead Developers: Albert Warner &  Olufemi Olusina
Description: This page ask for user input to add admin 

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
    <form class="addadmincontroller.php" action = 'addadmincontroller.php' method = 'POST'>

    <?php include 'navigation.php' ?>

            <div class="container3">
                <h1 class="title"> Add Admin</h1>
                    <br>
                    <br>

                    <div class="form-group">
                        <label id="labels"  class="control-label  col-sm-4" >First Name:</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter A-Z Characters" name="firstname" placeholder="First Name" Required> 
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">    
                        <label id="labels"  class="control-label  col-sm-4" >Last Name:</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter A-Z Characters" name="lastname" placeholder="Last Name" Required> 
                        </div>
                    </div>    
                    <br>
                    <br>
                    <div class="form-group">    
                        <label id="labels"  class="control-label  col-sm-4" >User Name:</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" name="newUser" placeholder="Username" Required> 
                        </div>
                    </div>    
                    <br>
                    <br>
                    <div class="form-group">    
                        <label id="labels"  class="control-label  col-sm-4" >Password:</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="password" name="userpassword" placeholder="Password" Required> 
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">    
                        <label id="labels"  class="control-label  col-sm-4" >AD Password:</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="password" pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter the correct password" name="adminPassword" placeholder="Admin Password" Required> 
                        </div>
                    </div>
                    
                        <br>
                        <br>
                        <div class="searchbutton">
                        <input class="button btn btn-info btn-lg" type='submit' name='submit' value='Submit' />
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
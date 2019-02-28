<?PHP
if(!isset($_SESSION)) { session_start(); } //refreshes session since a valid SID exit (type in by the user)
include 'accessControl.php';
?>

<!-- /* 
Lead Developers: Albert Warner &  Olufemi Olusina
Description: The Page is the add labs page - Allows the user to add labs

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

    <title>Add Labs</title>
</head>
<body>
    <form class="addlabs.php" action = 'addlabs.php' method = 'POST'>
        <?php include 'navigation.php' ?>

        <div class="container3">
                <h1 class="title"> Add Semester Labs</h1>
                <p class= "alert alert-info text-center"> Tip: You can manually enter the lab in the "Extra Lab" 
                                        field or add additional lab through out the semester </p>
                
                    <br>
                    <br>

                    <div class="form-group">
                    <label id="labels"  class="control-label  col-sm-4" >Amount of Labs:</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" name="addlab" placeholder="Enter number of Labs"> 
                        </div>
                    </div>

                    <br>
                    <br>

                    <input class="button btn btn-info btn-lg" type='submit' name='submit' value='Submit' />

                    <br>
                    <br>
                    <br><br>

                    <div class="form-group">  
                        <label id="labels"  class="control-label  col-sm-4" >Extra Labs:</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" name="extra" placeholder="Enter extra lab name or number" > 
                        </div>
                    </div>

                    <br>
                    <br>

                    <input class="button btn btn-info btn-lg" type='submit' name='add' value='Add' />
                                
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
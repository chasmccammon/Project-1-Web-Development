<!-- /*
Lead Developers: Albert Warner &  Olufemi Olusina
Description: First Time Setup File, if selected again, check and request admin username and password to proceed
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

    <title>Database Reset</title>
</head>
<body>
    <form class="dataFound.php" action = 'dataFound.php' method = 'POST'>

        <div class="container3">
            <h1 class="title">Database Reset</h1>

            <p class= "alert alert-warning text-center"><strong>Warning!:</strong> Data was found in the database. If you proceed, this will do a full reset and clear all data, including Admin details.  </p>
            <br>
            <h3 class="title">Enter Username and AD Password</h3>
            <br>

            <div class="form-group">  
                    <label id="labels"  class="control-label  col-sm-3" ></label>   
                    <label id="labels"  class="control-label  col-sm-2" >User Name:</label>
                    <div class="col-sm-3">
                        <input class="form-control" type="text" name="userName" pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter A-Z Characters" placeholder="Username" Required> 
                    </div>
            </div>   

            <br>
            <br>

            <div class="form-group">  
                <label id="labels"  class="control-label  col-sm-3" ></label>   
                <label id="labels"  class="control-label  col-sm-2" >AD Password:</label>
                <div class="col-sm-3">
                    <input class="form-control" type="password" pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter A-Z Characters" name="adminPassword" placeholder="Admin Password" Required> 
                </div>
            </div>

            <br>
            <br>

            <p class= "alert alert-danger text-center"> Are you sure you want to proceed ?</p>
            <br>

            <div class="form-group  col-sm-12">
                <input class="button btn btn-info btn-lg" type='submit' name='yes' value='Yes' />
            </div>
    </form>
            <br>
            <br>
                    
     <form class="login.php" action = '../Staff/login.php' method = 'POST'>
                <br><br><br>
                <div class="form-group  col-sm-12">
                    <div><u><strong>OR Go Back Home ?</strong> </u>  </div>
                    <input class="button btn btn-info btn-lg" type='submit' name='Home' value='Home' />
                </div>
    </form>  

        </div>

   
    
       
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
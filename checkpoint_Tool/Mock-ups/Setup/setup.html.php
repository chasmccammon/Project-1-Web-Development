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
    <link rel="stylesheet" href="../Staff/css/style4.css?<?php echo time();?>">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <title>Welcome</title>
</head>
<body>
    <form class="setup.php" action = 'index.php' method = 'POST'>

        <div class="container3">
            <h1 class="title">Admin Tool Initial Setup</h1>

            <p class= "alert alert-info text-center"> Tip: Use the inputs provided to setup the tool. </p>
            <br><br>

            <div class="form-group">    
                <label id="labels"  class="control-label  col-sm-4" ></label>
                <label id="labels"  class="control-label  col-sm-2" >Course Name:</label>
                <div class="col-sm-3">
                    <input class="form-control" type="text" name="courseName" pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter A-Z Characters" placeholder="Name of course" Required> 
                </div>
            </div> 

            <br><br><br><br>

            <div class="form-group">
                <label id="labels"  class="control-label  col-sm-4" ></label>
                <label id="labels" class="control-label  col-sm-2">Would you like <u> Attendance Tab</u> for students?</label>
                <div class="col-sm-3">
                    <label style="margin-right: 30px;" class="radio-inline">
                    <input class= "radio" type="radio" name="marked[]" value="yes" Required>Yes</label>

                    <label class="radio-inline">
                    <input class= "radio" type="radio" name="marked[]" value="no" Required>No </label>
                </div>
            </div>

            <br><br><br><br><br>

            <h3 class="title">Admin Details:</h3>
            <br>

            <div class="form-group">
                <label id="labels"  class="control-label  col-sm-4" ></label>
                <label id="labels"  class="control-label  col-sm-2" >First Name:</label>
                <div class="col-sm-3">
                    <input class="form-control" type="text" pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter A-Z Characters" name="firstname" placeholder="First Name" Required> 
                </div>
            </div>

            <br><br>

            <div class="form-group">
            <label id="labels"  class="control-label  col-sm-4" ></label>    
                <label id="labels"  class="control-label  col-sm-2" >Last Name:</label>
                <div class="col-sm-3">
                    <input class="form-control" type="text" pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter A-Z Characters" name="lastname" placeholder="Last Name" Required> 
                </div>
            </div>  
                
            <br>
            <br>

            <div class="form-group">
                    <label id="labels"  class="control-label  col-sm-4" ></label>     
                <label id="labels"  class="control-label  col-sm-2" >User Name:</label>
                <div class="col-sm-3">
                    <input class="form-control" type="text" name="userName" pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter A-Z Characters" placeholder="Username" Required> 
                </div>
            </div> 

            <br>
            <br>

            <div class="form-group">   
                <label id="labels"  class="control-label  col-sm-4" ></label>  
                <label id="labels"  class="control-label  col-sm-2" >Password:</label>
                <div class="col-sm-3">
                    <input class="form-control" type="password" name="password" placeholder="Password" Required> 
                </div>
            </div>

            <br>
            <br>

            <div class="form-group">  
                <label id="labels"  class="control-label  col-sm-4" ></label>   
                <label id="labels"  class="control-label  col-sm-2" >AD Password:</label>
                <div class="col-sm-3">
                    <input class="form-control" type="password" pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter A-Z Characters" name="adminPassword" placeholder="Admin Password" Required> 
                </div>
            </div>
            
                <br>
                <br>
                <br>

            <div class="form-group  col-sm-12">
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
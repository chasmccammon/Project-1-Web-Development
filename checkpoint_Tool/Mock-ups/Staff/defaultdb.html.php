<!-- /* 
Lead Developers: Albert Warner &  Olufemi Olusina
Description: DB reset to add new student infromation

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
    
    <title>Reset Database</title>
</head>
<body>
    <form class="defaultdb.php" action = 'defaultdb.php' method = 'POST' enctype="multipart/form-data">

        <?php include 'navigation.php' ?>

        <div class="container3">

            <h1 class="title"> Database Reset</h1>

            <br>
            <p class= "alert alert-info text-left"> 
            <strong>Tip:</strong> <br> 
            * Upload the CSV file containing the student ID, name and surname.<br>
            *  Example: "10000001, Albert, Olusina".<br>
            * Click the "Upload" Button. <br>
            * After a CSV file has been uploaded, click the "Reset" button. <br>
            <br>
            <strong>NB:</strong> <br> 
            * The database will be Reset back to default and new students will be uploaded. <br>
            * The Admin data and the graphs' questions/labels will not be affected by this "Reset", only student data.
            </p>

            <br><br> 

                <div class="form-group">
                    <label id="labels" class="control-label  col-sm-3 ">CSV File upload:</label>
                    <div class="col-sm-7">
                        <input type="file" name="file_upload" class="form-control">
                    </div>
                    <div class="col-sm-1">
                        <input type="submit"  name='upload' class="btn btn-info" value= "Upload" /> 
                    </div>
                </div>

            <br><br><br><br>
                
            <p class= "alert alert-warning text-center"> Before you press the "Reset" button, have you uploaded the students CSV file yet? <br>
                If not, the file in the uploads directory is used.
            </p>
            <br>

            <input id="letMePass" class="button btn btn-info btn-lg"  type='submit' name='reset' value='Reset' />
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

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $("input#letMePass").click(function (e) {
                var answer = confirm('Are you sure that you want to do this?');
                if (!answer) {
                    e.preventDefault();
                }
            });
        });
    </script> 

</body>
</html>
<!-- /* 
Lead Developers: Albert Warner &  Olufemi Olusina
Description: This page will display which student is removed

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

    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <title>Delete Labs</title>
</head>
<body>
    <form class="deletelabcontroller.php" action = 'deletelabcontroller.php' method = 'POST'>
        <?php include 'navigation.php' ?>

        <div class="container3">
            <h3 class="resultheading"><?=$labsToDelete["labname"]?> has been deleted successfully!</h3> 
            <br>
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
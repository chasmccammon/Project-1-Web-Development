<!--     
Lead Developers: Albert Warner &  Olufemi Olusina
Description: The Page displays the results to prove that the database with data is created in a Table.
 
 -->
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

    <title>Database Setup</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
</head>
<body>
    <?php include 'navigation.php' ?>

        <div class="container3">
        <h1 class="resultheading">Database Reset </h1> 
            <table>
                <tr>
                    <th> Student Number</th> <th> First Name</th> <th> Last Name</th>  <th> User Name</th> 
                </tr>
                <?php
                foreach($result as $row)
                {?>

                    <tr>
                    <td>
                    <?=("$row[studentNumber]");?>
                    </td>
                    <td>
                    <?=("$row[firstname]");?>
                    </td>
                    <td>
                    <?=("$row[lastname]");?>
                    </td>
                    <td>
                    <?=("$row[userName]");}?>
                    </td>
                    </tr>
        
            </table>
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

<!-- /* 
Lead Developers: Albert Warner &  Olufemi Olusina
Description: The Page is allows the admin to update the label / questions of student tool 
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

    <title>Add Student</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
</head>
<body>
    <form class="updatecontroller.php" action =  'updatecontroller.php' method = 'POST'>
    <?php include 'navigation.php' ?>

        <div class="container3">
            
            <h1 class="title"> Checkpoint Lab's Added to Database </h1>

            <br>

            <table >
            <tr>
                <th class= "text-center">Tool ID</th>
                <th class= "text-center">Table Name X</th> 
                <th class= "text-center">Table Name Y</th> 
                <th class= "text-center">North Label</th> 
                <th class= "text-center">South Label</th>
                <th class= "text-center">East Label</th>
                <th class= "text-center">West Label</th>                              
            </tr>

            <?php foreach ($tool as $row) { ?>
                    <tr>
                        <td><?= $row['toolID'] ?></td>
                        <td><?= $row['tableNamex'] ?></td>
                        <td><?= $row['tableNamey'] ?></td>
                        <td><?= $row['northLabel'] ?></td>
                        <td><?= $row['southLabel'] ?></td>
                        <td><?= $row['eastLabel'] ?></td>
                        <td><?= $row['westLabel'] ?></td>
                    </tr>
                <?php } ?>

            </table>

            </table>
            <br>
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
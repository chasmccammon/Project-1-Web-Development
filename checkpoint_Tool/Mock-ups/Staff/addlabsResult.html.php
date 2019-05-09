<!--     
/* 
Lead Developers: Albert Warner &  Olufemi Olusina
Description: The Page Displays the results of labs added , prints all the labs on the database to screen
*/
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
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <script src="js/top.js"></script>
    <title>Add Labs</title>
</head>
<body>
    <form class="addlabs.php" action = 'addlabs.php' method = 'POST'>

        <?php include 'navigation.php' ?>

        <div class="container3">
            <h3 class="title"> Lab inserted into database successfully!</h3>
            <br>
                <table class="scrolltable">
                        <tr>
                        <th> Lab ID</th><th> Lab Name</th> 
                        </tr>
                        <?php
                        foreach($result as $row)
                        {?>
                            <!--    /* print_r($row);*/ // print out the information to be displayed into the table  -->
                            
                            <tr>
                            <td>
                            <?=("$row[labID]");?>
                            </td>
                            <td>
                            <?=("$row[labname]");}?>
                            </td>
                            </tr>
                    </table>

            <br>

            <input class="button btn btn-info btn-lg" type='submit' name='Return' value='Return' />

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

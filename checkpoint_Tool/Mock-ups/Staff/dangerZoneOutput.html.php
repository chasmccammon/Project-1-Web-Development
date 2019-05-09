<?PHP
if(!isset($_SESSION)) { session_start(); } //refreshes session since a valid SID exit (type in by the user)
include 'accessControl.php';
?>
<!-- /* 
Lead Developers: Albert Warner &  Olufemi Olusina
Description: The Page is allows displays students not happy

*/ -->
    <!DOCTYPE html>
<html lang="en">
<head>
    <!--<meta charset="UTF-8">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Danger Zone</title>

    <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cambay:400,400i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Our Custom CSS -->
         <link rel="stylesheet" href="css/style4.css?<?php echo time();?>">
         <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
         
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="js/top.js"></script>
</head>
<body>
    <?php include 'navigation.php' ?>

    <div class="container3">

    <!--************************HEADER****************************-->
    
        <h3 class= "text-center">Report on Students that are Struggling</h3>
        <br>
    <!--************************CONTENT****************************-->
        <div class="content">

        <!--################## DATA  ###############-->
            <table>  
            <caption class="text-center"><strong><?= $tool1East ?>  VS  <?= $tool1South ?></strong></caption>
            <tr>
                <th class= "text-center">Lab ID</th> 
                <th class= "text-center">Student Username</th>
                <th class= "text-center">X Value</th> 
                <th class= "text-center">Y Value</th>                       
            </tr>
            
            <!--Check if no lab to show-->
            <?php if ($dangerZone1Count == 0 ) {?>
                <tr>
                <td colspan="4">No Lab Entry yet!</td>
                </tr>
            <?php } ?>

            <?php foreach ($dangerZone1 as $row) { ?>
                
                    <tr>
                        <td><?= $row['labid'] ?></td>
                        <td><?= $row['userName'] ?></td>
                        <td><?= $row['xvalue'] ?></td>
                        <td><?= $row['yvalue'] ?></td>
                                                
                    </tr>
                <?php } ?>

            </table>

             <br><br>
            <table>  
            <caption class="text-center"><strong> <?= $tool2South ?>  VS  <?= $tool2West ?></strong></caption>
            <tr>
                <th class= "text-center">Lab ID</th> 
                <th class= "text-center">Student Username</th>
                <th class= "text-center">X Value</th> 
                <th class= "text-center">Y Value</th>                       
            </tr>

            <!--Check if no lab to show-->
            <?php if ($dangerZone2Count == 0 ) {?>
                <tr>
                <td colspan="4">No Lab Entry yet!</td>
                </tr>
            <?php } ?>

            <?php foreach ($dangerZone2 as $row) { ?>
                
                    <tr>
                        <td><?= $row['labid'] ?></td>
                        <td><?= $row['userName'] ?></td>
                        <td><?= $row['xvalue'] ?></td>
                        <td><?= $row['yvalue'] ?></td>
                                                
                    </tr>
                <?php } ?>

            </table>

              <br><br>
            <table>  
            <caption class="text-center"><strong> <?= $tool3South ?>  VS  <?= $tool3East ?></strong></caption>
            
            <tr>
                <th class= "text-center">Lab ID</th> 
                <th class= "text-center">Student Username</th>
                <th class= "text-center">X Value</th> 
                <th class= "text-center">Y Value</th>                       
            </tr>
            
            <!--Check if no lab to show-->
            <?php if ($dangerZone3Count == 0 ) {?>
                <tr>
                <td colspan="4">No Lab Entry yet!</td>
                </tr>
            <?php } ?>

            <?php foreach ($dangerZone3 as $row) { ?>
                
                    <tr>
                        <td><?= $row['labid'] ?></td>
                        <td><?= $row['userName'] ?></td>
                        <td><?= $row['xvalue'] ?></td>
                        <td><?= $row['yvalue'] ?></td>
                                                
                    </tr>
                <?php } ?>

            </table>

            <!--Function to help user navigate the page easily-->
        <button onclick="topFunction()" id="myBtn" title="Go to top">Go To Top</button>       
        </div>
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
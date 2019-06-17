<?PHP
if(!isset($_SESSION)) { session_start(); } //refreshes session since a valid SID exit (type in by the user)
include 'accessControl.php';
?>

<!--
    Lead Developers: Albert Warner &  Olufemi Olusina
    Description: Show the data in the tables of the DB
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <!--<meta charset="UTF-8">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Database Content</title>

    <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cambay:400,400i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style4.css?<?php echo time();?>">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="js/top.js"></script>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
</head>
<body>

    <?php include 'navigation.php' ?>
    <div class="container3">
    <!--************************HEADER****************************-->
    <h3 class= "text-center">Database Contents</h3>
    <br>
    <!--************************CONTENT****************************-->
    <div class="content">
        
         <!--################## SHOW  ###############-->
        <table>  
            <caption class= "text-center"><strong>DATABASE TABLES</strong></caption>
            <tr>
                <th class= "text-center">Table Name</th>                         
            </tr>

            <!--Check if nothing to show-->
            <?php if ($tablesCount == 0 ) {?>
                <tr>
                <td colspan="1">No Entry yet!</td>
                </tr>
            <?php } ?>

            <?php foreach ($tables as $row) { ?>
                    <tr>
                        <td><?= $row[0] ?></td>
                    </tr>
                <?php } ?>

            </table>

        <br><br>
       <!--################## ADMIN  ###############-->
        <table>
            <caption class= "text-center"><strong>ADMIN TABLE</strong></caption>
            <tr>
                <th class= "text-center">Admin ID</th>
                <th class= "text-center">First Name</th>
                <th class= "text-center">Last Name</th>
                <th class= "text-center">Username</th>       
            </tr>

            <!--Check if nothing to show-->
            <?php if ($adminCount == 0 ) {?>
                <tr>
                <td colspan="4">No Entry yet!</td>
                </tr>
            <?php } ?>

            <?php foreach ($admin as $row) { ?>
                    <tr>
                        <td><?= $row['adminID'] ?></td>
                        <td><?= $row['firstName'] ?></td>
                        <td><?= $row['lastName'] ?></td>
                        <td><?= $row['userName'] ?></td>
                    </tr>
                <?php } ?>

            </table>
      
           <br><br>

        <!--################## STUDENTS  ###############-->
        <table>   
            <caption class= "text-center"><strong>STUDENTS TABLE</strong></caption>
            <tr>
                <th class= "text-center">Student ID</th>
                <th class= "text-center">Student Number</th> 
                <th class= "text-center">First Name</th>
                <th class= "text-center">Last Name</th>
                <th class= "text-center">Username</th>                              
            </tr>

            <!--Check if nothing to show-->
            <?php if ($studentsCount == 0 ) {?>
                <tr>
                <td colspan="5">No Entry yet!</td>
                </tr>
            <?php } ?>

            <?php foreach ($students as $row) { ?>
                    <tr>
                        <td><?= $row['studentID'] ?></td>
                        <td><?= $row['studentNumber'] ?></td>
                        <td><?= $row['firstName'] ?></td>
                        <td><?= $row['lastName'] ?></td>
                        <td><?= $row['userName'] ?></td>
                    </tr>
                <?php } ?>

            </table>
  

            <br><br>

        <!--################## TOOL  ###############-->
        <table>    
            <caption class= "text-center"><strong>TOOL TABLE</strong></caption>
            <tr>
                <th class= "text-center">Tool ID</th>
                <th class= "text-center">Table Name X</th> 
                <th class= "text-center">Table Name Y</th> 
                <th class= "text-center">North Label</th> 
                <th class= "text-center">South Label</th>
                <th class= "text-center">East Label</th>
                <th class= "text-center">West Label</th>                              
            </tr>

            <!--Check if nothing to show-->
            <?php if ($toolCount == 0 ) {?>
                <tr>
                <td colspan="7">No Entry yet!</td>
                </tr>
            <?php } ?>

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

            <br><br>

        <!--################## LAB  ###############-->
        <table>  
            <caption class= "text-center"><strong>LAB TABLE</strong></caption>
            <tr>
                <th class= "text-center">Lab ID</th>
                <th class= "text-center">Lab Name</th>  
                <th class= "text-center">Checkpoint Labs <br> (0 = No, 1 = Yes)</th>                            
            </tr>

            <!--Check if nothing to show-->
            <?php if ($labsCount == 0 ) {?>
                <tr>
                <td colspan="3">No Entry yet!</td>
                </tr>
            <?php } ?>

            <?php foreach ($labs as $row) { ?>
                    <tr>
                        <td><?= $row['labID'] ?></td>
                        <td><?= $row['labname'] ?></td>
                        <td><?= $row['isCheckpoint'] ?></td>
                    </tr>
                <?php } ?>

            </table>

            <br><br>

        <!--################## COMPLETION  ###############-->
        <table>  
            <caption class= "text-center"><strong>COMPLETION TABLE</strong></caption>
            <tr>
                <th class= "text-center">Completion ID</th>
                <th class= "text-center">Student ID</th> 
                <th class= "text-center">Lab ID</th> 
                <th class= "text-center">Response Time</th>                           
            </tr>

            <!--Check if nothing to show-->
            <?php if ($completionCount == 0 ) {?>
                <tr>
                <td colspan="4">No Entry yet!</td>
                </tr>
            <?php } ?>

            <?php foreach ($completion as $row) { ?>
                    <tr>
                        <td><?= $row['completionID'] ?></td>
                        <td><?= $row['studentID'] ?></td>
                        <td><?= $row['labID'] ?></td>
                        <td><?= $row['responseTime'] ?></td>
                    </tr>
                <?php } ?>

            </table>
         
            <br><br>
        
        <!--################## ATTENDANCE  ###############-->
        <table>  
            <caption class= "text-center"> <strong>ATTENDANCE TABLE</strong></caption>
            <tr>
                <th class= "text-center">Attendance ID</th>
                <th class= "text-center">Student ID</th> 
                <th class= "text-center">Lab ID</th> 
                <th class= "text-center">Response Time</th>                           
            </tr>

            <!--Check if nothing to show-->
            <?php if ($attendanceCount == 0 ) {?>
                <tr>
                <td colspan="4">No Entry yet!</td>
                </tr>
            <?php } ?>

            <?php foreach ($attendance as $row) { ?>
                    <tr>
                        <td><?= $row['attendanceID'] ?></td>
                        <td><?= $row['studentID'] ?></td>
                        <td><?= $row['labID'] ?></td>
                        <td><?= $row['responseTime'] ?></td>
                    </tr>
                <?php } ?>

            </table>

            <br><br>

        <!--################## DATA  ###############-->
        <table>  
            <caption class= "text-center"> <strong> DATA TABLE </strong></caption>
            <tr>
                <th class= "text-center">Data ID</th>
                <th class= "text-center">Tool ID</th>
                <th class= "text-center">Student ID</th> 
                <th class= "text-center">Lab ID</th> 
                <th class= "text-center">X - Value</th>
                <th class= "text-center">Y - Value</th>                        
            </tr>

            <!--Check if nothing to show-->
            <?php if ($dataCount == 0 ) {?>
                <tr>
                <td colspan="6">No Entry yet!</td>
                </tr>
            <?php } ?>

            <?php foreach ($data as $row) { ?>
                    <tr>
                        <td><?= $row['dataID'] ?></td>
                        <td><?= $row['toolID'] ?></td>
                        <td><?= $row['studentID'] ?></td>
                        <td><?= $row['labID'] ?></td>
                        <td><?= $row['xValue'] ?></td>
                        <td><?= $row['yValue'] ?></td>
                    </tr>
                <?php } ?>

            </table>

            <br><br>

            <!--Function to help user navigate the page easily-->
        <button onclick="topFunction()" id="myBtn" title="Go to top">Go To Top</button>       
        </div>
    </div>

  <!--Script to check if user wants to reset the database-->
  <script type="text/javascript">
            function resetDatabase() {
                // check if user really wants to reset database
                if (confirm("Are you sure you want to reset the database? \n\n Please note that this will undo all changes made to the database!")) {
                    // call reset page
                    var url = 'http://kate.ict.op.ac.nz/~warnaa1/Web-2-Project/Web-2-Project/dbsetup.php';
                    var req = new XMLHttpRequest();
                    req.open("GET", url, true);
                    req.send();
                    location.href='dbsetup.php'
                    }
            }
        </script>

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
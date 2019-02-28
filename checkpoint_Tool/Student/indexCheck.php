<!--Designed By: Olufemi Olusina & Albert Warner

    Purpose: A student lab chekpoint tool for Otago polytechnic students

    Description:
    This is the hompage for the web app. On load, the user is directed here first.
    -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--INCLUDE HEADER DEFINITION FILE-->
    <?php include 'header.inc.php'; ?>
    <title><?= $header[0];?> Checkpoint Tool</title>
    
    <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cambay:400,400i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>"> 
</head>
<body>

        <!--************************HEADER****************************-->
        <div class="header">
            <!--Lab Checkpoint Tool-->
             <?= $header[0];?> Checkpoint Tool
        </div>

        <div class="body">
            <!--************************CONTENT****************************-->
            <div class="homeNavs">

                    <br>
                        <a href="checkpointController.php">
                                <div class="homeNav" id="check"> 
                                    <div class="backgroundContainer">
                                        <div class="background">
                                            </div>
                                        <div class="linkTitle"> 
                                            <h3>MARK <br> CHECKPOINT COMPLETE </h3> 
                                            </div>
                                        </div>
                                    </div>
                            </a>

                    <br>
                        <a href="completedLabsForm.html.php">
                            <div class="homeNav" id="complete">
                                <div class="backgroundContainer">
                                    <div class="background">
                                        </div>
                                    <div class="linkTitle"> 
                                        <h3>SEE <br> COMPLETED LABS </h3> 
                                        </div>
                                    </div>
                                </div>
                            </a>

                </div>
                
                
            <!--Function to help user navigate the page easily-->
            <button onclick="topFunction()" id="myBtn" title="Go to top">Go To Top</button> 
        </div>
</body>
</html>
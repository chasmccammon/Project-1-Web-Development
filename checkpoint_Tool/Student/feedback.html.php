<!--Designed By: Olufemi Olusina & Albert Warner

    Purpose: A student lab chekpoint tool for Otago polytechnic students

    Description:
    This page is used to display messages to user
    -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!--<meta charset="UTF-8">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--INCLUDE HEADER DEFINITION FILE-->
    <?php include 'header.inc.php'; ?>
    <title><?= $header[0];?> Checkpoint Tool</title>

    <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cambay:400,400i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>">
    <script src="top.js"></script>
</head>
<body>

        <!--************************HEADER****************************-->
        <div class="header">
            <!--Lab Checkpoint Tool-->
             <?= $header[0];?> Checkpoint Tool
        </div>

        <div class="body">
        <!--************************CONTENT****************************-->
            <a href='index.php'>
                        <div class='go_back'>
                            &lt; Go Back
                        </div>
                    </a>

            <div class="content">
                
                <div class="error">
                    <h1>Thanks!</h1>
                    <p>
                        <!--Get message from processing php files and display to user-->
                        <?php echo $message ?>
                    </p>
                    </div>
                    <!--Function to help user navigate the page easily-->
                    <button onclick="topFunction()" id="myBtn" title="Go to top">Go To Top</button>       
                </div>
            </div>
</body>
</html>
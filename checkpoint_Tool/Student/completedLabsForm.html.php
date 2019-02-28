<!--Designed By: Olufemi Olusina & Albert Warner

    Purpose: A student lab chekpoint tool for Otago polytechnic students

    Description:
    This page is used to display the form that the user can use to search the database.
    It accepts typed inputs and selections from options.
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

            <form action="completedLabsController.php" method="post" class="form">

                <label>Enter your Student ID Number: </label>
                <br>
                <input  type="text" 
                        pattern="[0-9]{1,15}"  
                        placeholder="Enter number" 
                        name="studentIDNum"
                        id="studentIDNum"
                        class="entry" 
                        required/>
                
                <script>
                    var input = document.getElementById('studentIDNum');
                    input.oninvalid = function(event) {
                        event.target.setCustomValidity('Student ID Number should only be numbers and not more than 15');
                    }
                </script>

                <p><input type="submit" class="button" name="completedLabs" value="See Completed Labs" /></p>
                </form>

            </div>

        <!--Function to help user navigate the page easily-->
        <button onclick="topFunction()" id="myBtn" title="Go to top">Go To Top</button>
        
    </div>
</body>
</html>
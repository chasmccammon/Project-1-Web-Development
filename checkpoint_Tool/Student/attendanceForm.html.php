<!--Designed By: Olufemi Olusina & Albert Warner

    Purpose: A student lab chekpoint tool for Otago polytechnic students

    Description:
    This page is used to display the form that the user can mark attendance.
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

    <!--Link required -->
    <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/noppa/text-security/master/dist/text-security.css">
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
            <h2>ATTENDANCE:</h2>
            <form action="attendanceController.php" method="post" class="input">

            <!-- Hidden inputs to use values in session on this page -->
            <input type="hidden" name="studentID" value="<?=  $studentID ?>"/>
            <input type="hidden" name="labID" value="<?=  $labNumber ?>"/>


            <label>Student Name: </label>
            <select name="studentName" required> 
                <option value="">Please select student name</option>

                <!--Foreach through the selected distinct students and display in the options -->
                <?php foreach ($students as $key) {?>
                    <option value="<?= $key['studentID']; ?>"> <?= $key['userName']; ?></option>
                    <?php  }?>  
                </select>

                <br>

                <label>Lab Number: </label>
                
                <select name="labs" required> 
                    <option value="">Please select a lab</option>

                    <!--Foreach through the selected distinct students and display in the options -->
                    <?php foreach ($labs as $key) {?>
                        <option value="<?= $key['labID']; ?>"> <?= $key['labname']; ?></option>
                        <?php  }?> 
                        
                    </select>

                <br>

                <label>Tutor Password: </label><input type="text" pattern="[0-9]{1,}" autocomplete="off" name="tutorPassword" class="entry password"  required/>

                
                <p><input type="submit" class="button" id="attendance" name="attendanceOnly" value="Mark Attendance Only" /></p>
                
            </form>

            </div>

            <!--Function to help user navigate the page easily-->
            <button onclick="topFunction()" id="myBtn" title="Go to top">Go To Top</button>
        </div>
</body>
</html>
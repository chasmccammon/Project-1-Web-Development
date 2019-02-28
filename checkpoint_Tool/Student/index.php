<?php
    //Connect to database with login details in connect file
    include '../Config/connect.inc.php';
    
    //Establish connection to the selected database
    try{
        $pdo = new PDO("mysql:host=$host;dbname=$database", $userMS,$passwordMS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $pdo->exec('SET NAMES "utf8"');

    }
    catch(PDOException $e)
    {
        $message = 'Connection to database failed!';
        include 'error.html.php';
        exit();
    }
    
    /**************SELECT STATEMENTS FOR INDEX PAGE ATTENDANCE TAB****************/
    try{    
        $selectString = "SELECT DISTINCT tab from admin";
        $tabCheck = $pdo->query($selectString);
        $attendanceTab =  $tabCheck->fetch();

        if ($attendanceTab[0] == "yes") {
            include 'indexAttend.php';
        }
        else {
            include 'indexCheck.php';
        }
    }
    catch(PDOException $e)
    {
        $message = 'Select statement error';
        include 'error.html.php';
        exit();
    }
?>
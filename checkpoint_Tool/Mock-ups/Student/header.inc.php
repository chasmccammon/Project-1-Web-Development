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
    
    /**************SELECT STATEMENTS FOR INDEX PAGE HEADER****************/
    try{    
        $selectString = "SELECT DISTINCT adminID from Admin";
        $head = $pdo->query($selectString);
        $header =  $head->fetch();
    }
    catch(PDOException $e)
    {
        $message = "$e";
        include 'error.html.php';
        exit();
    }
?>
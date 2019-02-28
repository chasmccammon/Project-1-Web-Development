<?php
/*
Lead Developers: Albert Warner &  Olufemi Olusina
Description: First Time Setup File, if selected again, check and request admin username and password to proceed
*/

     // create log on page 
     include '../Config/connect.inc.php';
     include_once '../Config/cleandata.php';

    //connect to the mysql server
    try
    {
        $pdo = new PDO("mysql:host=$host; dbname=$database; charset = UTF-8",$userMS,$passwordMS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$pdo->exec('SET NAMES "UTF8"');
    }
    catch (PDOEXCEPTION $e) //output if connecting to the database is incorrect
    {
        $message = 'Connection to database server failed';
        include 'error.html.php';
        exit();
    }

    if(isset($_POST['yes']))
    {
        $userName = clean_input($_POST['userName']);
        $adminpass = clean_input($_POST['adminPassword']);

        $selectQuery = "SELECT userName,adminPassword FROM admin WHERE userName =  :first";
        $result = $pdo->prepare($selectQuery);
        $result->bindParam(':first',$userName);
        $result->execute();
        $rowCount = $result->rowCount();
        $row = $result->fetch();
        if($rowCount>0)
        {
            //check the database to see if the password is same
            //crypt takes the inserted password and hashes it and compares to the database
            if(crypt($adminpass,$row['adminPassword']) === $row['adminPassword'])
            {

                try
                {
                    $dropQuery7 = "DROP TABLE IF EXISTS admin";
                    $pdo->exec($dropQuery7);
                }
                catch(PDOException $e)
                {
                    $message = 'Dropping tables failed';
                    include 'error.html.php';
                    exit();
                }
            
                include 'index.php';
            }

            else
            {
                $message = "Sorry, incorrect Admin password!";
                include 'error.html.php';
                exit();
            }

        }
        else
        {
            $message = "Sorry, incorrect Admin username!";
            include 'error.html.php';
            exit();
        }

    }
    else
    {
        include 'dataFound.html.php';
    }
?>
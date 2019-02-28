<?php
/* 
Lead Developers: Albert Warner &  Olufemi Olusina
Description: The Page is access controller , access controller isused for security for login page
Allows or stops the user entering into the actuall website
*/
// create log on page
include '../Config/connect.inc.php'; 
require_once '../Config/cleandata.php'; //file won't run if file not found, if the file is duplicated in any other controller calling this function it will only run once, alternative is include_once 
//connect to the mysql server
try
{
    $pdo = new PDO("mysql:host=$host; dbname=$database",$userMS,$passwordMS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$pdo->exec('SET NAMES "utf-8"');
}
catch (PDOEXCEPTION $e) //output if connecting to the database is incorrect
{
    $message = 'Connection to database server connection failed';
    include 'error.html.php';
    exit();
}
try
{
    //if the user filled completed the form
    if(isset($_POST['username']))
     {
          $username = clean_input($_POST['username']); //store the user clean tags into username
     }
     else if(isset($_SESSION['username'])) //checks if the user already logged in
     {
         $username = $_SESSION['username']; //store the user username
     }

     if(isset($_POST['password']))
     {
        $userpassword = clean_input($_POST['password']);
     }
     else if(isset($_SESSION['password']))
     {
          $userpassword = $_SESSION['password'];
     }
     
     if(!isset($username)) //if no information completed 
     {
         $validateEmpty = true;
         $message1 = "required";
        include 'login.php';
        //exit so that you dont go to the page of secret information
        exit;
     }
     else
     {
        $selectQuery = "SELECT userName,password FROM admin WHERE userName =  :first";
        $result = $pdo->prepare($selectQuery);
        $result->bindParam(':first',$username);
        $result->execute();
        $rowCount = $result->rowCount();
        $row = $result->fetch();

        if($rowCount>0)
        {
        //check the database to see if the password is same
        //crypt takes the inserted password and hashes it and compares to the database
            if(crypt($userpassword,$row['password']) === $row['password'])
            {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $userpassword; //this bad , maybe use a boolean make the boolean true and in logout make the boolean false
            }
            else
            {
                $validatePass = true;
                $message = "invalid.";
                include 'login.php';
                exit;
            }
        }
        else
        {
            $validateUsername = true;
             $message = "invalid.";
            include 'login.php';
            exit;
        }
     }
 } 

catch (PDOEXCEPTION $e) //output if connecting to the database is incorrect
{
    $message = 'Connection to database server connection failed';
    include 'error.html.php';
    exit();
}

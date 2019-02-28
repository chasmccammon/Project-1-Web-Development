<?php 
if(!isset($_SESSION)) { session_start(); } //refreshes session since a valid SID exit (type in by the user)
include 'accessControl.php';

/*
Lead Developers: Albert Warner &  Olufemi Olusina
Description: Show Data in the Database
*/

   //Connect to database with login details in connect file
   include '../Config/connect.inc.php';
   include_once '../Config/cleandata.php';
   
   
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


    /**************SELECT STATEMENTS FOR OPTIONS IN THE FORM****************/
    try{
        
    /*****************************************
    *  Select statement for admin table
    *****************************************/
        $selectString = "SELECT *
        from admin
        ORDER BY adminID";

       $admin = $pdo->query($selectString);
       $adminCount =  $admin->rowCount();


   /*****************************************
    *  Select statement for students table
    *****************************************/
        $selectString = "SELECT *
        from students
        ORDER BY studentID";

       $students = $pdo->query($selectString);
       $studentsCount =  $students->rowCount();


    /*****************************************
    *  Select statement for tool table
    *****************************************/
        $selectString = "SELECT *
        from tool
        ORDER BY toolID";

       $tool = $pdo->query($selectString);
       $toolCount =  $tool->rowCount();



    /*****************************************
    *  Select statement for lab table
    *****************************************/ 
        $selectString = "SELECT *
        from lab
        ORDER BY labID";

       $labs = $pdo->query($selectString);
       $labsCount =  $labs->rowCount();


    /*****************************************
    *  Select statement for completion table
    *****************************************/
        $selectString = "SELECT *
        from completion
        ORDER BY completionID";

       $completion = $pdo->query($selectString);
       $completionCount =  $completion->rowCount();



    /*****************************************
    *  Select statement for attendance table
    *****************************************/
        $selectString = "SELECT *
        from attendance
        ORDER BY attendanceID";

        $attendance = $pdo->query($selectString);
        $attendanceCount =  $attendance->rowCount();


    /*****************************************
    *  Select statement for data table
    *****************************************/
        $selectString = "SELECT *
        from data
        ORDER BY dataID";

        $data = $pdo->query($selectString);
        $dataCount =  $data->rowCount();

     /*****************************************
    *  Statement for showing all tables
    *****************************************/
        $selectString = "show TABLES";
        $tables = $pdo->query($selectString);
        $tablesCount =  $tables->rowCount();

       include 'showTablesOutput.html.php';

    }
    catch(PDOException $e)
    {
        $message = 'Select statement error';
        include 'error.html.php';
        exit();
    }

?>
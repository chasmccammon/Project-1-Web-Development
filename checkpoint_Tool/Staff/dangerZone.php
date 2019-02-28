<?php 
if(!isset($_SESSION)) { session_start(); } //refreshes session since a valid SID exit (type in by the user)
include 'accessControl.php';
/*
Lead Developers: Albert Warner &  Olufemi Olusina
Description: Get the information of the students not happy
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

        // Select statements for Tools' labels for form titles
        $selectString = "SELECT * FROM tool where toolID = 1";
        $stmt = $pdo->query($selectString);
        $tool1 = $stmt->fetch();
        $tool1South = $tool1["southLabel"];
        $tool1East = $tool1["eastLabel"];

        $selectString = "SELECT * FROM tool where toolID = 2";
        $stmt = $pdo->query($selectString);
        $tool2 = $stmt->fetch();
        $tool2South = $tool2["southLabel"];
        $tool2West = $tool2["westLabel"];

        $selectString = "SELECT * FROM tool where toolID = 3";
        $stmt = $pdo->query($selectString);
        $tool3 = $stmt->fetch();
        $tool3South = $tool3["southLabel"];
        $tool3East = $tool3["eastLabel"];
        
    /*****************************************
    *  Select statement for Students who's y value is in the data table which is less than 0. The y axis is all the negative responses
    *****************************************/
      /* $selectString = "SELECT distinct labid , students.userName as \"userName\" FROM data JOIN students ON data.studentID = students.studentID WHERE yvalue < 0 ORDER BY students.lastName,data.labID;";
        $dangerZone = $pdo->query($selectString);*/

        $selectString = "SELECT distinct labid , students.userName as \"userName\", data.xvalue,data.yvalue FROM data JOIN students ON data.studentID = students.studentID join tool on tool.toolID = data.toolID  WHERE data.toolID = 1 and yvalue < 0  and xvalue >0 ORDER BY students.lastName,data.labID";
        $dangerZone1 = $pdo->query($selectString);
        $dangerZone1Count =  $dangerZone1->rowCount();

        $selectString = "SELECT distinct labid , students.userName as \"userName\", data.xvalue,data.yvalue FROM data JOIN students ON data.studentID = students.studentID join tool on tool.toolID = data.toolID  WHERE data.toolID = 2 and yvalue < 0  and xvalue < 0 ORDER BY students.lastName,data.labID";
        $dangerZone2 = $pdo->query($selectString);
        $dangerZone2Count =  $dangerZone2->rowCount();

        $selectString = "SELECT distinct labid , students.userName as \"userName\", data.xvalue,data.yvalue FROM data JOIN students ON data.studentID = students.studentID join tool on tool.toolID = data.toolID  WHERE data.toolID = 3 and yvalue < 0  and xvalue < 0 ORDER BY students.lastName,data.labID";
        $dangerZone3 = $pdo->query($selectString);
        $dangerZone3Count =  $dangerZone3->rowCount();

       include 'dangerZoneOutput.html.php';

    //   SELECT distinct labid , students.userName as \"userName\", data.xvalue,data.yvalue FROM data JOIN students ON data.studentID = students.studentID join tool on tool.toolID = data.toolID  WHERE data.toolID = 1 and yvalue < 0  and xvalue >0 ORDER BY students.lastName,data.labID;

    }
    catch(PDOException $e)
    {
        $message = 'Select statement error';
        include 'error.html.php';
        exit();
    }

?>
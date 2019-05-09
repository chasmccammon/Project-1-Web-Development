<?php
if(!isset($_SESSION)) { session_start(); } //refreshes session since a valid SID exit (type in by the user)
include 'accessControl.php';
 /* 
Lead Developers: Albert Warner &  Olufemi Olusina
Description: Lab scatter graph selection

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
          $message = $e;
          include 'error.html.php';
          exit();
      }
      
      try{
        $selectString = "SELECT labID,labname FROM Lab";
        //Prepare the select statement.
        $stmt = $pdo->prepare($selectString);
        //Execute the statement
        $stmt->execute();
        //Retrieve the rows using fetchAll.
        $result1 = $stmt->fetchAll();


        $selectString2 = "SELECT toolID,tableNamex,tableNamey FROM Tool ORDER BY toolID";
        //Prepare the select statement.
        $stmt = $pdo->prepare($selectString2);
        //Execute the statement
        $stmt->execute();
        //Retrieve the rows using fetchAll.
        $result2 = $stmt->fetchAll();
      }
      catch(PDOException $e){
              $message = 'Select statement error';
              include 'error.html.php';
              exit(); 
      }
    



        if (isset($_POST['submit']))
        {
            
            try
            {
                $labNumber = $_POST['labID'];
                

                
                /*****************************************
                // STUDENT 
                *****************************************/
                $Students = "SELECT Data.studentID,Data.xValue, Data.yValue, Students.userName
                FROM Data
                join Tool on Tool.toolID = Data.toolID 
                join Students on Students.studentID = Data.studentID 
                where Data.labID = '$labNumber'
                AND Data.toolID = '1'
                GROUP BY Data.studentID";

                $stmt = $pdo->query($Students);
                $Students = $stmt->fetchAll();

                /*****************************************
                // TOOL1 
                *****************************************/
                $tool = "SELECT DISTINCT * 
                FROM Data
                join Tool on Tool.toolID = Data.toolID
                join Students on Students.studentID = Data.studentID 
                where Data.labID = '$labNumber'
                AND Data.toolID = '1'";

                $stmt = $pdo->query($tool);
                $toolOptions = $stmt->fetchAll();

                /*****************************************
                // STUDENT 
                *****************************************/
                $Students2 = "SELECT Data.studentID,Data.xValue, Data.yValue, Students.userName
                FROM Data
                join Tool on Tool.toolID = Data.toolID 
                join Students on Students.studentID = Data.studentID 
                where Data.labID = '$labNumber'
                AND Data.toolID = '2'
                GROUP BY Data.studentID";

                $stmt = $pdo->query($Students2);
                $Students2 = $stmt->fetchAll();

                /*****************************************
                // TOOL2 
                *****************************************/
                $tool2 = "SELECT DISTINCT * 
                FROM Data
                join Tool on Tool.toolID = Data.toolID
                join Students on Students.studentID = Data.studentID 
                where Data.labID = '$labNumber'
                AND Data.toolID = '2'";

                $stmt = $pdo->query($tool2);
                $toolOptions2 = $stmt->fetchAll();


                /*****************************************
                // STUDENT 
                *****************************************/
                $Students3 = "SELECT Data.studentID,Data.xValue, Data.yValue, Students.userName
                FROM Data
                join Tool on Tool.toolID = Data.toolID 
                join Students on Students.studentID = Data.studentID 
                where Data.labID = '$labNumber'
                AND Data.toolID = '3'
                GROUP BY Data.studentID";

                $stmt = $pdo->query($Students3);
                $Students3 = $stmt->fetchAll();

                 /*****************************************
                // TOOL3 
                *****************************************/
                $tool3 = "SELECT DISTINCT * 
                FROM Data
                join Tool on Tool.toolID = Data.toolID
                join Students on Students.studentID = Data.studentID 
                where Data.labID = '$labNumber'
                AND Data.toolID = '3'";

                $stmt = $pdo->query($tool3);
                $toolOptions3 = $stmt->fetchAll();


                $checking = "SELECT Data.studentID,Data.xValue, Data.yValue
                FROM Data
                join Tool on Tool.toolID = Data.toolID
                where Data.labID = '$labNumber'
                AND Data.toolID = '1'
                GROUP BY Data.studentID";

                $stmt = $pdo->query($checking);
                $countRows =  $stmt->rowCount();
                if($countRows>0)
                {
                    include 'graphResultsAll.html.php';
                }
                else
                {
                    $message = "There is no Dataavailable for this Tool or Lab yet.";
                    include 'noResultLine.html.php';
                }

                

                }
            catch (PDOEXCEPTION $e) //output if connecting to the database is incorrect
            {
                $message = 'Connection to database server connection failed';
                include 'error.html.php';
                exit();
            } 
    }
    else{
        include 'graphSelectionAll.html.php';
    }
    
      
     
?>
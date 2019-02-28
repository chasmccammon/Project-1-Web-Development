<?php
if(!isset($_SESSION)) { session_start(); } //refreshes session since a valid SID exit (type in by the user)
include 'accessControl.php';
/*
Lead Developers: Albert Warner &  Olufemi Olusina
Description: This page display all the completed labs by students

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
          $message = 'Connection to database server connection failed';
          include 'error.html.php';
          exit();
      }
      //Checks if there is labs on the database if non shows the empty result page
      //Meaning the user would need to add labs first before coming to this page 
      try
      {
        $checkDatabase = "SELECT * FROM lab";
        $numbers = $pdo->query($checkDatabase);
        $RowCount = $numbers->rowCount();

        if($RowCount>0)
          {
            try
            {
                //create the Headers of the table
                $labnames = "SELECT labname FROM lab";
                $result = $pdo->query($labnames);
                $headerCount = $result->rowCount();

                //calculate the amount of labs required in the for loop
                $amountOflabs = "SELECT * FROM lab";
                $number = $pdo->query($amountOflabs);
                $numrows = $number->rowCount();
                $correction = $numrows - 1; //correction is for the last number - if the last number is reached then a comma won't be placed
        
                $tick = "<h3 style=\"color:red\">&#10004;</h3>";
                $cross = "<h3 style=\"color:red\">&#10006;</h3>";
        
                $table = "SELECT students.userName,COUNT(completion.labID) as 'labcount', ";
                for ($i=1; $i <=  $numrows; $i++) { 
                    $table.= "MAX(IF(labid = $i,' $tick ', ' - ')) AS Lab$i";  //php pivot - if student has a lab it puts 1 in the table else blank space for no labs
                    if($i <= $correction)
                        $table.=", ";     
                }

             $table.= " FROM completion INNER JOIN students on students.studentid = completion.studentid GROUP BY completion.studentid ORDER BY students.lastName";
             $stmt = $pdo->query($table);
             $stmtCount = $stmt->rowCount();
      
            }
            catch (PDOEXCEPTION $e) //output if connecting to the database is incorrect
            {
                $message = 'Connection to database server connection failed';
                include 'error.html.php';
                exit();
            }

            include 'labscompletedResult.php';
        }
        else
        {
        $message = "Sorry, there is no lab information found in database.";
        $hint = "Hint: Start by adding the amount of labs required";
        include 'labscompletednoResult.html.php';
        }
      }
      catch (PDOEXCEPTION $e) //output if connecting to the database is incorrect
      {
          $message = 'Connection to database server connection failed';
          include 'error.html.php';
          exit();
      }
     
?>
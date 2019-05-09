<?php
if(!isset($_SESSION)) { session_start(); } //refreshes session since a valid SID exit (type in by the user)
include 'accessControl.php';
/*
Lead Developers: Albert Warner &  Olufemi Olusina
Description: This page display all the Studentslabs on a line graph

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
      catch (PDOEXCEPTION $e) //output if connecting to the Database is incorrect
      {
          $message = 'Connection to Database server connection failed';
          include 'error.html.php';
          exit();
      }
      
       try
      {
        if (isset($_POST['submit']))
        {

           
            //Tool Table has X Field and Y Field - 2 seperate queries to check the different Data
            $studentnum = $_POST['studentID'];
          
            //Check if Data is in the Database for X Field
            $check = "SELECT Tool.tableNamex FROM Data join Toolon Tool.toolID = Data.toolID join Students on Students.studentID = Data.studentID where Data.studentID = '$studentnum' AND Tool.tableNamex = 'Difficulty' GROUP BY Data.studentID";
            $ck = $pdo->query($check);
            $countRows =  $ck->rowCount(); 

            
            //second check to see if there is Data in the Y field
            $check2 = "SELECT Tool.tableNamey FROM Data join Toolon Tool.toolID = Data.toolID join Students on Students.studentID = Data.studentID where Data.studentID = '$studentnum' AND Tool.tableNamey = 'Interest' GROUP BY Data.studentID";
            $ck2 = $pdo->query($check2);
            $countRows2 =  $ck2->rowCount();


            $labelNames = "SELECT tableNamex,tableNamey FROM ToolWHERE toolID = 1 ";
            $stmt = $pdo->query($labelNames);
            $lnames = $stmt->fetchAll();
            
          
                //if x field has Data do the following queries
                if($countRows>0 || $countRows2>0)
                {
                    try
                    {
                        //First querie get the name of the X Field and Student name
                        $name = "SELECT Students.userName , Tool.tableNamex,Tool.tableNamey FROM Data join Toolon Tool.toolID = Data.toolID join Students on Students.studentID = Data.studentID where Data.studentID = '$studentnum' AND Tool.toolID = 1 GROUP BY Data.studentID";
                        $stmt = $pdo->query($name);
                        $tool1 = $stmt->fetchAll();

                        $name2 = "SELECT Students.userName , Tool.tableNamex,Tool.tableNamey FROM Data join Toolon Tool.toolID = Data.toolID join Students on Students.studentID = Data.studentID where Data.studentID = '$studentnum' AND Tool.toolID = 2 GROUP BY Data.studentID";
                        $stmt = $pdo->query($name2);
                        $tool2 = $stmt->fetchAll();

                        $name3 = "SELECT Students.userName , Tool.tableNamex,Tool.tableNamey FROM Data join Toolon Tool.toolID = Data.toolID join Students on Students.studentID = Data.studentID where Data.studentID = '$studentnum' AND Tool.toolID = 3 GROUP BY Data.studentID";
                        $stmt = $pdo->query($name3);
                        $tool3 = $stmt->fetchAll();

                        $name4 = "SELECT Students.userName , Tool.tableNamex, Tool.tableNamey FROM Data join Toolon Tool.toolID = Data.toolID join Students on Students.studentID = Data.studentID where Data.studentID = '$studentnum' AND Tool.toolID = 1 GROUP BY Data.studentID";
                        $stmt = $pdo->query($name4);
                        $tool4 = $stmt->fetchAll();


                        $name5 = "SELECT Students.userName , Tool.tableNamex, Tool.tableNamey FROM Data join Toolon Tool.toolID = Data.toolID join Students on Students.studentID = Data.studentID where Data.studentID = '$studentnum' AND Tool.toolID = 2 GROUP BY Data.studentID";
                        $stmt = $pdo->query($name5);
                        $tool5 = $stmt->fetchAll();

                        $name6 = "SELECT Students.userName , Tool.tableNamex, Tool.tableNamey FROM Data join Toolon Tool.toolID = Data.toolID join Students on Students.studentID = Data.studentID where Data.studentID = '$studentnum' AND Tool.toolID = 3 GROUP BY Data.studentID";
                        $stmt = $pdo->query($name6);
                        $tool6 = $stmt->fetchAll();

                    }
                    catch(PDOException $e)
                    {
                        
                        $message = 'Select statement error';
                        include 'error.html.php';
                        exit();
                        
                    }
                    try
                    {  
                        //Second querie get the user Data to plot on the graph
                        $values = "SELECT Students.userName,Data.labID, Tool.tableNamex,Tool.tableNamey , Data.xValue,Data.yValue FROM Data join Toolon Tool.toolID = Data.toolID join Student son Students.studentID = Data.studentID where Data.studentID = '$studentnum' AND Tool.toolID = 1 ORDER BY Data.labID";
                        $stmt = $pdo->query($values); 
                        $result = $stmt->fetchAll();

                        $values2 = "SELECT Students.userName,Data.labID, Tool.tableNamex,Tool.tableNamey , Data.xValue,Data.yValue FROM Data join Toolon Tool.toolID = Data.toolID join Students on Students.studentID = Data.studentID where Data.studentID = '$studentnum' AND Tool.toolID = 2 ORDER BY Data.labID";
                        $stmt = $pdo->query($values2); 
                        $result2 = $stmt->fetchAll();

                        $values3 = "SELECT Students.userName,Data.labID, Tool.tableNamex,Tool.tableNamey , Data.xValue,Data.yValue FROM Data join Toolon Tool.toolID = Data.toolID join Students on Students.studentID = Data.studentID where Data.studentID = '$studentnum' AND Tool.toolID = 3 ORDER BY Data.labID";
                        $stmt = $pdo->query($values3); 
                        $result3 = $stmt->fetchAll();
                        
                        $values4 = "SELECT Students.userName,Data.labID, Tool.tableNamey,Tool.tableNamex , Data.xValue,Data.yValue FROM Data join Toolon Tool.toolID = Data.toolID join Students on Students.studentID = Data.studentID where Data.studentID = '$studentnum' AND Tool.toolID = 1 ORDER BY Data.labID";
                        $stmt = $pdo->query($values4); 
                        $result4 = $stmt->fetchAll();
                        //print_r($result);

                        $values5 = "SELECT Students.userName,Data.labID, Tool.tableNamey,Tool.tableNamex , Data.xValue,Data.yValue FROM Data join Toolon Tool.toolID = Data.toolID join Students on Students.studentID = Data.studentID where Data.studentID = '$studentnum' AND Tool.toolID = 2 ORDER BY Data.labID";
                        $stmt = $pdo->query($values5); 
                        $result5 = $stmt->fetchAll();

                        $values6 = "SELECT Students.userName,Data.labID, Tool.tableNamey,Tool.tableNamex , Data.xValue,Data.yValue FROM Data join Toolon Tool.toolID = Data.toolID join Students on Students.studentID = Data.studentID where Data.studentID = '$studentnum' AND Tool.toolID = 3 ORDER BY Data.labID";
                        $stmt = $pdo->query($values6); 
                        $result6 = $stmt->fetchAll();

                    }
                    catch(PDOException $e)
                    {
                        
                            $message = 'Select statement error';
                            include 'error.html.php';
                            exit();
                        
                    }

                    include 'linegraphResult.html.php';
                    
                }  
                else
                {
                    $message = "There is no Data available for this student yet." ;
                    include 'noResult.html.php';
                }
        }
        else
        {
          try
          {
           $selectString = "SELECT studentID,userName FROM Students ORDER BY lastName";
           //Prepare the select statement.
           $stmt = $pdo->prepare($selectString);
           //Execute the statement
           $stmt->execute();
           //Retrieve the rows using fetchAll.
           $result1 = $stmt->fetchAll();
          }
          catch(PDOException $e)
          {
              
                  $message = 'Select statement error';
                  include 'error.html.php';
                  exit();
              
          }
          include 'linegraphSelection.html.php';
    
        }
        
      }
      catch (PDOException $e) //output if connecting to the Database is incorrect
      {
          $message = 'Connection to Database server connection failed';
          include 'error.html.php';
          exit();
      } 
     
?>
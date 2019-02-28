<?php
if(!isset($_SESSION)) { session_start(); } //refreshes session since a valid SID exit (type in by the user)
include 'accessControl.php';
/*
Lead Developers: Albert Warner &  Olufemi Olusina
Description: This page display all the students labs on a line graph

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
      
       try
      {
        if (isset($_POST['submit']))
        {

           
            //Tool Table has X Field and Y Field - 2 seperate queries to check the different data
            $studentnum = $_POST['studentID'];
          
            //Check if data is in the database for X Field
            $check = "SELECT tool.tableNamex FROM data join tool on tool.toolID = data.toolID join students on students.studentID = data.studentID where data.studentID = '$studentnum' AND tool.tableNamex = 'Interest' GROUP BY data.studentID";
            $ck = $pdo->query($check);
            $countRows =  $ck->rowCount(); 

            
            //second check to see if there is data in the Y field
            $check2 = "SELECT tool.tableNamey FROM data join tool on tool.toolID = data.toolID join students on students.studentID = data.studentID where data.studentID = '$studentnum' AND tool.tableNamey = 'Difficulty' GROUP BY data.studentID";
            $ck2 = $pdo->query($check2);
            $countRows2 =  $ck2->rowCount();


            $labelNames = "SELECT tableNamex,tableNamey FROM tool WHERE toolID = 1 ";
            $stmt = $pdo->query($labelNames);
            $lnames = $stmt->fetchAll();
            
          
                //if x field has data do the following queries
                if($countRows>0 || $countRows2>0)
                {
                    try
                    {
                        //First querie get the name of the X Field and Student name
                        $name = "SELECT students.userName , tool.tableNamex,tool.tableNamey FROM data join tool on tool.toolID = data.toolID join students on students.studentID = data.studentID where data.studentID = '$studentnum' AND tool.toolID = 1 GROUP BY data.studentID";
                        $stmt = $pdo->query($name);
                        $tool1 = $stmt->fetchAll();

                        $name2 = "SELECT students.userName , tool.tableNamex,tool.tableNamey FROM data join tool on tool.toolID = data.toolID join students on students.studentID = data.studentID where data.studentID = '$studentnum' AND tool.toolID = 2 GROUP BY data.studentID";
                        $stmt = $pdo->query($name2);
                        $tool2 = $stmt->fetchAll();

                        $name3 = "SELECT students.userName , tool.tableNamex,tool.tableNamey FROM data join tool on tool.toolID = data.toolID join students on students.studentID = data.studentID where data.studentID = '$studentnum' AND tool.toolID = 3 GROUP BY data.studentID";
                        $stmt = $pdo->query($name3);
                        $tool3 = $stmt->fetchAll();

                        $name4 = "SELECT students.userName , tool.tableNamex, tool.tableNamey FROM data join tool on tool.toolID = data.toolID join students on students.studentID = data.studentID where data.studentID = '$studentnum' AND tool.toolID = 1 GROUP BY data.studentID";
                        $stmt = $pdo->query($name4);
                        $tool4 = $stmt->fetchAll();


                        $name5 = "SELECT students.userName , tool.tableNamex, tool.tableNamey FROM data join tool on tool.toolID = data.toolID join students on students.studentID = data.studentID where data.studentID = '$studentnum' AND tool.toolID = 2 GROUP BY data.studentID";
                        $stmt = $pdo->query($name5);
                        $tool5 = $stmt->fetchAll();

                        $name6 = "SELECT students.userName , tool.tableNamex, tool.tableNamey FROM data join tool on tool.toolID = data.toolID join students on students.studentID = data.studentID where data.studentID = '$studentnum' AND tool.toolID = 3 GROUP BY data.studentID";
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
                        //Second querie get the user data to plot on the graph
                        $values = "SELECT students.userName,data.labID, tool.tableNamex,tool.tableNamey , data.xValue,data.yValue FROM data join tool on tool.toolID = data.toolID join students on students.studentID = data.studentID where data.studentID = '$studentnum' AND tool.toolID = 1 ORDER BY data.labID";
                        $stmt = $pdo->query($values); 
                        $result = $stmt->fetchAll();

                        $values2 = "SELECT students.userName,data.labID, tool.tableNamex,tool.tableNamey , data.xValue,data.yValue FROM data join tool on tool.toolID = data.toolID join students on students.studentID = data.studentID where data.studentID = '$studentnum' AND tool.toolID = 2 ORDER BY data.labID";
                        $stmt = $pdo->query($values2); 
                        $result2 = $stmt->fetchAll();

                        $values3 = "SELECT students.userName,data.labID, tool.tableNamex,tool.tableNamey , data.xValue,data.yValue FROM data join tool on tool.toolID = data.toolID join students on students.studentID = data.studentID where data.studentID = '$studentnum' AND tool.toolID = 3 ORDER BY data.labID";
                        $stmt = $pdo->query($values3); 
                        $result3 = $stmt->fetchAll();
                        
                        $values4 = "SELECT students.userName,data.labID, tool.tableNamey,tool.tableNamex , data.xValue,data.yValue FROM data join tool on tool.toolID = data.toolID join students on students.studentID = data.studentID where data.studentID = '$studentnum' AND tool.toolID = 1 ORDER BY data.labID";
                        $stmt = $pdo->query($values4); 
                        $result4 = $stmt->fetchAll();
                        //print_r($result);

                        $values5 = "SELECT students.userName,data.labID, tool.tableNamey,tool.tableNamex , data.xValue,data.yValue FROM data join tool on tool.toolID = data.toolID join students on students.studentID = data.studentID where data.studentID = '$studentnum' AND tool.toolID = 2 ORDER BY data.labID";
                        $stmt = $pdo->query($values5); 
                        $result5 = $stmt->fetchAll();

                        $values6 = "SELECT students.userName,data.labID, tool.tableNamey,tool.tableNamex , data.xValue,data.yValue FROM data join tool on tool.toolID = data.toolID join students on students.studentID = data.studentID where data.studentID = '$studentnum' AND tool.toolID = 3 ORDER BY data.labID";
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
                    $message = "There is no data available for this student yet." ;
                    include 'noResult.html.php';
                }
        }
        else
        {
          try
          {
           $selectString = "SELECT studentID,userName FROM students ORDER BY lastName";
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
      catch (PDOException $e) //output if connecting to the database is incorrect
      {
          $message = 'Connection to database server connection failed';
          include 'error.html.php';
          exit();
      } 
     
?>
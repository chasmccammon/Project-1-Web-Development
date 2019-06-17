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
          $message = 'Connection to database server connection failed';
          include 'error.html.php';
          exit();
      }
      
       try
      {
        if (isset($_POST['submit']))
        {
        
            $studentnum = $_POST['studentID'];
           
                /*****************************************
                // TOOL 1
                 *****************************************/
                $name = "SELECT students.userName , tool.tableNamex,tool.tableNamey, lab.labname
                FROM data 
                join tool on tool.toolID = data.toolID 
                join lab on lab.labID = data.labID 
                join students on students.studentID = data.studentID 
                where data.studentID = '$studentnum' 
                AND data.toolID = '1' 
                GROUP BY data.studentID";
                $tool1 = $pdo->query($name);

                /*****************************************
                // TOOL 2
                *****************************************/
                $name2 = "SELECT students.userName , tool.tableNamex,tool.tableNamey, lab.labname
                FROM data 
                join tool on tool.toolID = data.toolID 
                join lab on lab.labID = data.labID 
                join students on students.studentID = data.studentID 
                where data.studentID = '$studentnum' 
                AND data.toolID = '2' 
                GROUP BY data.studentID";
                $tool2 = $pdo->query($name2);

                /*****************************************
                // TOOL 3
                 *****************************************/
                $name3 = "SELECT students.userName , tool.tableNamex,tool.tableNamey, lab.labname
                FROM data 
                join tool on tool.toolID = data.toolID 
                join lab on lab.labID = data.labID 
                join students on students.studentID = data.studentID 
                where data.studentID = '$studentnum' 
                AND data.toolID = '3' 
                GROUP BY data.studentID";
                $tool3 = $pdo->query($name3);
                //if the above query has result then move the data result page else move to no data result page
                $countRows =  $tool1->rowCount();
                if($countRows>0)
                {
                   
                        /*****************************************
                        // Graph 1
                        *****************************************/
                        $values = "SELECT students.userName,data.labID,lab.labname, tool.tableNamex,tool.tableNamey ,tool.eastLabel,tool.northLabel,tool.southLabel,tool.westLabel, data.xValue, data.yValue 
                        FROM data 
                        join tool on tool.toolID = data.toolID 
                        join lab on lab.labID = data.labID 
                        join students on students.studentID = data.studentID 
                        where data.studentID = '$studentnum' 
                        AND data.toolID = '1'";
                        $graph1 = $pdo->query($values); 

                         /*****************************************
                        // Graph 2
                        *****************************************/
                        $values2 = "SELECT students.userName,data.labID,lab.labname, tool.tableNamex,tool.tableNamey ,tool.eastLabel,tool.northLabel,tool.southLabel,tool.westLabel, data.xValue, data.yValue 
                        FROM data 
                        join tool on tool.toolID = data.toolID 
                        join lab on lab.labID = data.labID 
                        join students on students.studentID = data.studentID 
                        where data.studentID = '$studentnum' 
                        AND data.toolID = '2'";
                        $graph2 = $pdo->query($values2);

                         /*****************************************
                        // Graph 3
                        *****************************************/
                        $values3 = "SELECT students.userName,data.labID,lab.labname, tool.tableNamex,tool.tableNamey ,tool.eastLabel,tool.northLabel,tool.southLabel,tool.westLabel, data.xValue, data.yValue 
                        FROM data 
                        join tool on tool.toolID = data.toolID 
                        join lab on lab.labID = data.labID 
                        join students on students.studentID = data.studentID 
                        where data.studentID = '$studentnum' 
                        AND data.toolID = '3'";
                        $graph3 = $pdo->query($values3);
                        

    
                    include 'graphResults.html.php';
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
           $selectString2 = "SELECT toolID,tableNamex,tableNamey FROM tool ORDER BY toolID";
           //Prepare the select statement.
           $result2 = $pdo->query($selectString2);
           //Execute the statement
          /*  $stmt->execute();
           //Retrieve the rows using fetchAll.
           $result2 = $stmt->fetchAll(); */
          }
          catch(PDOException $e)
          {
              
                  $message = 'There is no data available for this student yet.';
                  include 'error.html.php';
                  exit();
              
          }
          try
          {
           $selectString = "SELECT studentID,userName FROM students ORDER BY students.lastName";
           //Prepare the select statement.
           $result1 = $pdo->query($selectString);
           //Execute the statement
          /*  $stmt->execute();
           //Retrieve the rows using fetchAll.
           $result1 = $stmt->fetchAll(); */
          }
          catch(PDOException $e)
          {
              
                  $message = 'Select statement error';
                  include 'error.html.php';
                  exit();
              
          }
    
          include 'graphSelection.html.php';
    
        }

      }
      catch (PDOEXCEPTION $e) //output if connecting to the database is incorrect
      {
          $message = 'Connection to database server connection failed';
          include 'error.html.php';
          exit();
      } 
      
     
?>
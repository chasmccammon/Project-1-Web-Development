<?php
if(!isset($_SESSION)) { session_start(); } //refreshes session since a valid SID exit (type in by the user)
include 'accessControl.php';
/* 
Lead Developers: Albert Warner &  Olufemi Olusina
Description: The Page is add labs controller. cleans the data from input and pass into query that adds it to the database

*/


     // create log on page 
     include '../Config/connect.inc.php';
     //infromation put into the placeholder is put through clean data method and is strip of all tag ect 
     require_once '../Config/cleandata.php';
  
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
            $add = $_POST['addlab'];
           
            //Check if empty before processing
            if (!empty($add)) {

                //Check if there are labs on the database , if true can't use add labs field but the extra labs field
                $SelectQuery = "SELECT * FROM lab";
                $stmt = $pdo->prepare($SelectQuery);
                $stmt->execute();
                $countRows =  $stmt->rowCount();
                if($countRows>0)
                {
                    $message = "Sorry labs found in database.<br><br>To add extra labs, go to the 'Extra Lab' field";
                    include 'nolab.html.php';
                }
                else
                {       // if no labs found on the datbase all user to add as many labs as required
                        $labsnum = clean_input($_POST['addlab']);
                        for($i = 1; $i <= $labsnum; ++$i)
                        {
                            $insertQuery = "INSERT INTO lab(labname) VALUES(:labn)";
                            $stmt = $pdo->prepare($insertQuery);
                            $stmt->bindParam(':labn',$labn);
                            $labn = "Lab ".$i;
                            $stmt->execute();

                        }
                        try
                        {
                            $selectString = "SELECT DISTINCT labID,labname FROM lab;";
                            $result = $pdo->query($selectString);
                        }
                        catch(PDOException $e)
                        {
                            
                                $message = 'Select statement error';
                                include 'error.html.php';
                                exit();
                            
                        }
                    
                        include 'addlabsResult.html.php';
                    }
            }
            else {
                header('Location: #');
            }
        }
        else if (isset($_POST['add'])) // if the add button is pressed add one lab at a time
        {
            $extralab = clean_input($_POST['extra']);

            if (!empty($extralab)) {
                $insertQuery = "INSERT INTO lab(labname) VALUES(:labn)";
                $stmt = $pdo->prepare($insertQuery);
                $stmt->bindParam(':labn',$labn);
                $labn = $extralab;
                $stmt->execute();

                try
                {
                    $selectString = "SELECT DISTINCT labID,labname FROM lab;";
                    $result = $pdo->query($selectString);
                }
                catch(PDOException $e)
                {
                    
                        $message = 'Select statement error';
                        include 'error.html.php';
                        exit();
                    
                }
                include 'addlabsResult.html.php';
                
            }
            else
            {
                $message = "Sorry 'Extra Lab' field can not be empty!";
                include 'nolab.html.php';
            }
            
        }
        else
        {
            include 'addlabs.html.php';
        }
        

      }
      catch (PDOEXCEPTION $e) //output if connecting to the database is incorrect
      {
          $message = 'Connection to database server connection failed';
          include 'error.html.php';
          exit();
      }

    
?>
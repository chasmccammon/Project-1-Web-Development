<?PHP
session_start(); //refreshes session since a valid SID exit (type in by the user)
include 'accessControl.php';
/*
Lead Developers: Albert Warner &  Olufemi Olusina

Description: This file processes checkpoint labs selection.
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
        // To remove chekpoint labs
        if (isset($_POST['remCheck']))
        {
          $checkpointLabs = $_POST['checkpointlist'];
          
          //Check if empty before processing
           if ($checkpointLabs != NULL) {
            try
                {
                //For each through the array of selected and inserts the ID into update query 
                foreach( $checkpointLabs as $remCheck)
                    {
                        $remcheckString ="UPDATE Lab set isCheckpoint = 0 where labID in (".implode(",", $checkpointLabs ) . ")";
                        $stmt = $pdo->query($remcheckString);       
                    }
                }
                catch(PDOException $e)
                {
                        $message = 'Update statement: Remove checkpopint error';
                        include 'error.html.php';
                        exit();
                }
            }
            else {
                header('Location: #');
            }
        }

        // To add chekpoint labs
        if (isset($_POST['addCheck']))
        {
          $nonCheckpointLabs = $_POST['noncheckpointlist'];
           
          //Check if empty before processing
          if ($nonCheckpointLabs != NULL) {
                try
                {
                    //For each through the array of selected and inserts the ID into update query 
                    foreach( $nonCheckpointLabs as $addCheck)
                        {
                            $addcheckString ="UPDATE Lab set isCheckpoint = 1 where labID in (".implode(",", $nonCheckpointLabs ) . ")";
                            $stmt = $pdo->query($addcheckString);       
                        }
                }
                catch(PDOException $e)
                {
                        $message = 'Update statement: Add checkpoint error';
                        include 'error.html.php';
                        exit();
                }
            }
            else {
                header('Location: #');
            }
        }

        //display checkpoint labs
        $selectString = "SELECT DISTINCT labID,labname FROM Lab WHERE isCheckpoint = 1";
        $checkpoints = $pdo->query($selectString);
        $checkpointsCount =  $checkpoints->rowCount();

        //display non checkpoint labs
        $selectString = "SELECT DISTINCT labID,labname FROM Lab WHERE isCheckpoint = 0";
        $nonCheckpoints = $pdo->query($selectString);
        $nonCheckpointsCount =  $nonCheckpoints->rowCount();

        include 'checklabselection.html.php';
    }
    catch (PDOException $e)
    {
         $message = 'Select statement error';
         include 'error.html.php';
         exit();
    }
?>    
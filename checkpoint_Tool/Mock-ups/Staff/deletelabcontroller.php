<?PHP
if(!isset($_SESSION)) { session_start(); } //refreshes session since a valid SID exit (type in by the user)
include 'accessControl.php';
/*
Lead Developers: Albert Warner &  Olufemi Olusina
Description: Deleting the person/s the user selects via a checkbox
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
        if (isset($_POST['delete']))
        {

            $delete = $_POST['deletelist'];
            if (!empty($delete)) {

                //loops throught the array of detelist[] and stored the person/s select into the vatriable 
                $deleteLab = $_POST['deletelist'];

                //For each through the array of deleted sailor selected and inserts the ID into delete query 
                foreach( $deleteLab as $deletethem)
                {
                    $selectString = "SELECT DISTINCT labID,labname FROM Lab where labID = $deletethem";
                    $result = $pdo->query($selectString);
                    $labsToDelete =  $result->fetch();

                    $deleteString = "DELETE from Lab where labID = $deletethem";
                    $stmt = $pdo->query($deleteString);
                    $countRows = count($deleteLab); //counts the rows affected by the query and returns the number  
                }
                include 'deleteLabResult.html.php';
            }
            else {
                // include 'deletelab.html.php';
                header('Location: #');
            }
        }
        else
        {
            //display all the students 
            $selectString = "SELECT DISTINCT labID,labname FROM Lab";
            $result = $pdo->query($selectString);
            $countRows =  $result->rowCount();
            include 'deletelab.html.php';
        }

    }
    catch (PDOException $e)
    {
         $message = 'Select statement error';
         include 'error.html.php';
         exit();
    }
?>    
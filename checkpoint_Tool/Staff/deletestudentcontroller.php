<?PHP
if(!isset($_SESSION)) { session_start(); } //refreshes session since a valid SID exit (type in by the user)
include 'accessControl.php';

 /* 
Lead Developers: Albert Warner &  Olufemi Olusina
Description: Delete A student controller

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
                $deleteStudent = $_POST['deletelist'];
                //For each through the array of deleted sailor selected and inserts the ID into delete query 
                foreach( $deleteStudent as $deletethem)
                {
                    $selectString = "SELECT DISTINCT firstName,lastName FROM students where studentID = $deletethem";
                    $result = $pdo->query($selectString);
                    $studentsToDelete =  $result->fetch();

                    $deleteString = "DELETE from students where studentID = $deletethem";
                    $stmt = $pdo->query($deleteString);
                    $countRows = count($deleteStudent); //counts the rows affected by the query and returns the number  
                }
                include 'deletestudentResult.html.php';
            }
            else {
                // include 'deletelab.html.php';
                header('Location: #');
            }
        }
        else
        {
            //display all the students 
            $selectString = "SELECT DISTINCT studentID,studentNumber, firstName,lastName,userName FROM students";
            $result = $pdo->query($selectString);
            $countRows =  $result->rowCount();
            include 'deletestudent.html.php';
        }

    }
    catch (PDOException $e)
    {
         $message = 'Select statement error';
         include 'error.html.php';
         exit();
    }
?>    
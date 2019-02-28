<?php
if(!isset($_SESSION)) { session_start(); } //refreshes session since a valid SID exit (type in by the user)
include 'accessControl.php';
/*
Lead Developers: Albert Warner &  Olufemi Olusina
Description: DB Reset with new students
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

if (isset($_POST['upload'])){
    $currentDir = getcwd();
    $uploadDirectory = "/uploads/";

    $errors = []; // Store all foreseen and unforseen errors here

    //$fileExtensions = ['jpeg','jpg','png','csv']; // Get all the file extensions
    $fileExtensions = ['csv']; // Get all the file extensions

    $fileName = $_FILES['file_upload']['name'];
    $fileSize = $_FILES['file_upload']['size'];
    $fileTmpName  = $_FILES['file_upload']['tmp_name'];
    $fileType = $_FILES['file_upload']['type'];
    $tmp = explode('.', $fileName);
    $fileExtension = strtolower(end($tmp));
    $newFileName = "studentinfo.".$fileExtension; //Change the file that is uploaded to a name required by the reader 
    $upload = false;
    $uploadPath = $currentDir . $uploadDirectory . basename($newFileName); 

    if (isset($_POST['upload'])) {

        if (! in_array($fileExtension,$fileExtensions)) {
            $errors[] = "This file extension is not allowed. Please upload a CSV file";
        }

        if ($fileSize > 5000000) {
            $errors[] = "This file is more than 5MB. Sorry, it has to be less than or equal to 5MB";
        }

        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
            $upload = true;

            if ($didUpload) {
                //echo "The file " . basename($newFileName) . " has been uploaded";
                include 'defaultdb.html.php';
                echo '<script type="text/javascript">';
                echo 'alert("The file has been uploaded")';
                echo '</script>';

            } else {
                
                include 'defaultdb.html.php';
                echo '<script type="text/javascript">';
                echo 'alert("An error occurred somewhere\n\nPlease check permissions on the uploads directory. Try again or contact the admin")';
                echo '</script>';
            }
        } else {
            include 'defaultdb.html.php';
            foreach ($errors as $error) {
        
                echo '<script type="text/javascript">';
                echo 'alert("' .$error. ' . These are the errors. Try again ")';
                echo '</script>';
                
            }
            
        }
    }
}

    elseif (isset($_POST['reset']))
    {
        try
        {
            //Dont forget excute!!!!
            $dropQuery4 = "DROP TABLE IF EXISTS data";
            $pdo->exec($dropQuery4);
            $dropQuery7 = "DROP TABLE IF EXISTS lab";
            $pdo->exec($dropQuery7);
            $dropQuery5 = "DROP TABLE IF EXISTS completion";
            $pdo->exec($dropQuery5);
            $dropQuery6 = "DROP TABLE IF EXISTS attendance";
            $pdo->exec($dropQuery6);
            $dropQuery = "DROP TABLE IF EXISTS students";
            $pdo->exec($dropQuery);
        
            
            //Drop the tables in order because it has foreign keys in  
            //Create the following tables in order because the foreign keys require primary keys

                
        }
        catch(PDOException $e)
        {
                $message = 'Dropping tables failed';
                include 'error.html.php';
                exit(); 
        }

        try
        {
                   
            $createQuery1 = "CREATE TABLE students
            ( 
                studentID INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                studentNumber INT(100),
                firstName VARCHAR(100),
                lastName VARCHAR(100),
                userName VARCHAR(100)
                
            )";
            $pdo->exec($createQuery1);

            $createQuery1 = "CREATE TABLE lab
            ( 
                labID INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                labname VARCHAR(100),
                -- labcheck VARCHAR(100)
                isCheckpoint BOOLEAN NOT NULL DEFAULT 0
                
            )";
            $pdo->exec($createQuery1);

            $createQuery = "CREATE TABLE data
            ( 
                dataID INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                toolID INT NOT NULL,
                studentID INT(32) NOT NULL,
                labID INT(10) NOT NULL,
                xValue VARCHAR(32),
                yValue VARCHAR(32),
                FOREIGN KEY(toolID) REFERENCES tool(toolID) ON DELETE CASCADE ON UPDATE CASCADE,
                FOREIGN KEY(studentID) REFERENCES students(studentID) ON DELETE CASCADE ON UPDATE CASCADE,
                FOREIGN KEY(labID) REFERENCES lab(labID) ON DELETE CASCADE ON UPDATE CASCADE
            )";
            $pdo->exec($createQuery);

            $createQuery = "CREATE TABLE completion
            ( 
                completionID INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                studentID INT NOT NULL,
                labID INT(10) NOT NULL,
                responseTime TIMESTAMP,
                FOREIGN KEY(studentID) REFERENCES students(studentID) ON DELETE CASCADE ON UPDATE CASCADE
                
            )";
            $pdo->exec($createQuery);

            $createQuery = "CREATE TABLE attendance
            ( 
                attendanceID INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                studentID INT NOT NULL,
                labID INT(10) NOT NULL,
                responseTime TIMESTAMP,
                FOREIGN KEY(studentID) REFERENCES students(studentID) ON DELETE CASCADE ON UPDATE CASCADE
                
            )";
            $pdo->exec($createQuery);

        }
        //catch exception if error with query, display error page
        catch(PDOException $e)
        {
                $message = 'Creating tables failed';
                include 'error.html.php';
                exit();
        }
    
        try{

            //If the file delimiter is wrong, this will change the deliminter to a standard delimiter
            //File is uploaded change and saved back on the server with a new deliminter
            $classFile = "./uploads/studentinfo.csv";
            if (file_exists($classFile)) {

                $delimiters = array('|', ';', '^', "\t",":");
                $delimiter = ',';
            
                $str = file_get_contents($classFile);
                $str = str_replace($delimiters, $delimiter, $str);
                $newFile = file_put_contents($classFile, $str);

                    //Read the new file into the server
                        $File = fopen("./uploads/studentinfo.csv","r");
                        while (!feof($File)) 
                        {
                            $studentArray=fgetcsv($File);
                            if (!empty($studentArray)) {
                                $studentNumber=$studentArray[0];
                                $first = $studentArray[1];
                                $last = $studentArray[2];  
                                $userName = $first." ".$last;
                            
                                //Prepared statement used for inserting to ensure security
                                $insertQuery ="INSERT into students(studentNumber,firstName,lastName,userName) VALUES('$studentNumber','$first','$last','$userName')";
                                $stmt = $pdo->prepare($insertQuery);
                                $stmt->bindParam(':sailorID',$studentNumber);
                                $stmt->bindParam(':first',$first);
                                $stmt->bindParam(':last',$last);
                                $stmt->bindParam(':userName',$userName);
                                $stmt->execute();
                            }
                            else {
                                $message = "There is no CSV file uploaded!. Try uploading a CSV file before Resetting.";
                                include 'error.html.php';
                                exit();
                            }
                
                        }
                            fclose($File);

            } else {
                    $message = "There is no CSV file uploaded!. Try uploading a CSV file before Resetting.";
                    include 'error.html.php';
                    exit();
                  }
         }
         catch(PDOException $e)
         {
            $message = 'Uploading of students information failed';
            include 'error.html.php';
            exit();
         }

         try
         {
             $selectString = "SELECT DISTINCT studentNumber,firstname,lastname,userName FROM students;";
             $result = $pdo->query($selectString);
         }
         catch(PDOException $e)
         {    
            $message = 'Select statement error';
            include 'error.html.php';
            exit();
         }

         include 'output.html.php';
    }
    else
    {
        include 'defaultdb.html.php';
    }
    
?>
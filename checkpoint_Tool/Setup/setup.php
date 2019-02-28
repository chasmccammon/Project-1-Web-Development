<?php
/*
Lead Developers: Albert Warner &  Olufemi Olusina
Description: First Time Setup File -> Creates the tables in DB and Adds Admin
*/
   // create log on page 
   include '../Config/connect.inc.php';
   include_once '../Config/cleandata.php';

    //connect to the mysql server
    try
    {
        $pdo = new PDO("mysql:host=$host; dbname=$database; charset = UTF-8",$userMS,$passwordMS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOEXCEPTION $e) //output if connecting to the database is incorrect
    {
       $message = 'Connection to database server connection failed';
        include 'error.html.php';
        exit();
    }
        try
        {
            $tablequery = "SHOW TABLES LIKE 'admin'";
            $result = $pdo->query($tablequery);
            $tablecount = $result->rowCount();
            if($tablecount>0)
            {
              $adminQuery = "SELECT * FROM admin WHERE adminID='1'";
              $result1 = $pdo->query($adminQuery);
              $admincount = $result1->rowCount();
            }

                
        }
        catch (PDOEXCEPTION $e) //output if connecting to the database is incorrect
        {
            $message = 'Check for Admin in database failed!';
            include 'error.html.php';
            exit();
        }
    
        if (isset($_POST['submit']))
        {
            try{
                $name = clean_input($_POST['firstname']);
                $surname = clean_input($_POST['lastname']);
                $userName = clean_input($_POST['userName']);
                $password = clean_input($_POST['password']);
                $adminpass = clean_input($_POST['adminPassword']);
                $course = clean_input($_POST['courseName']);
                $marked = $_POST['marked'];

                foreach($marked as $mark)
                {
                //cost
                $cost=10;

                //Create a random salt
                $salt = strtr(base64_encode(random_bytes(16)), '+','.');
                $salt = sprintf("$2a$%02d$",$cost) . $salt;

                //hash the password with salt 
                $hash = crypt($password,$salt);
                $hash2 = crypt($adminpass,$salt);

                //using prepare statement to add the data to database
                $insertQuery = "INSERT INTO admin(firstName,lastName,userName,password,adminPassword,courseSub,tab) VALUES(:first,:last,:userName,:password,:adminPassword,:courseSub,:tab)";
                $stmt = $pdo->prepare($insertQuery);
                $stmt->bindParam(':first',$name);
                $stmt->bindParam(':last',$surname);
                $stmt->bindParam(':userName',$userName);
                $stmt->bindParam(':password',$hash);
                $stmt->bindParam(':adminPassword',$hash2);
                $stmt->bindParam(':courseSub',$course);
                $stmt->bindParam(':tab',$mark);
                
                $stmt->execute();
                }

                //include_once (dirname(__DIR__) . '/login.php');
                // include_once 'welcome.html.php';
            }
            catch(PDOException $e)
            {
                $message = 'Inserting Admin data failed';
                include 'error.html.php';
                exit();
            }

            try{
            $selectQuery = "SELECT userName FROM admin WHERE firstName = '$name'";
            $result = $pdo->query($selectQuery);
            $adminName =  $result->fetch();
            }
            catch(PDOException $e)
            {
                $message = 'Selecting Admin data failed';
                include 'error.html.php';
                exit();
            }

            include_once 'welcome.html.php';
        }
        else if($tablecount>0 && $admincount>0){
            include 'dataFound.php';
        }    
        else
        {

            try
            {
                //Dont forget excute!!!!
                $dropQuery4 = "DROP TABLE IF EXISTS data";
                $pdo->exec($dropQuery4);
                $dropQuery7 = "DROP TABLE IF EXISTS lab";
                $pdo->exec($dropQuery7);
                $dropQuery3 = "DROP TABLE IF EXISTS tool";
                $pdo->exec($dropQuery3);
                $dropQuery5 = "DROP TABLE IF EXISTS completion";
                $pdo->exec($dropQuery5);
                $dropQuery6 = "DROP TABLE IF EXISTS attendance";
                $pdo->exec($dropQuery6);  
                $dropQuery = "DROP TABLE IF EXISTS students";
                $pdo->exec($dropQuery);
                //Drop the tables in order because it has foreign keys in  
                $dropQuery7 = "DROP TABLE IF EXISTS admin";
                $pdo->exec($dropQuery7);
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
            $createQuery2 = "CREATE TABLE tool
            ( 
                toolID INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                tableNamex VARCHAR(100),
                tableNamey VARCHAR(100),
                northLabel VARCHAR(100),
                southLabel VARCHAR(100),
                eastLabel VARCHAR(100),
                westLabel VARCHAR(100)
            )";
            $pdo->exec($createQuery2);

            
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

            $createQuery = "CREATE TABLE admin
            ( 
                adminID INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                firstName VARCHAR(100),
                lastName VARCHAR(100),
                userName VARCHAR(100),
                password VARCHAR(128),
                adminPassword VARCHAR(128),
                courseSub VARCHAR(128), 
                tab VARCHAR (128) NOT NULL
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
            //Insert data into Position table by reading data from a CSV file
            
        $toolFile = fopen("tool.csv","r");
            
            while (!feof($toolFile)) 
            {
                $toolArray=fgetcsv($toolFile);
                $tableNamex = $toolArray[0];
                $tableNamey = $toolArray[1];
                $north = $toolArray[2];
                $south = $toolArray[3];  
                $east = $toolArray[4];
                $west = $toolArray[5];
                        
                $insertQuery ="INSERT into tool(tableNamex,tableNamey,northLabel,southLabel,eastLabel,westLabel) VALUES('$tableNamex','$tableNamey','$north','$south','$east','$west')";
                $stmt = $pdo->prepare($insertQuery);
                $stmt->bindParam(':tableNamex',$tableNamex);
                $stmt->bindParam(':tableNamey',$tableNamey);
                $stmt->bindParam(':northLabel',$north);
                $stmt->bindParam(':southLabel',$south);
                $stmt->bindParam(':westLabel',$east);
                $stmt->bindParam(':eastLabel',$west);
                $stmt->execute();

            }
                fclose($toolFile);

        }
        catch(PDOException $e)
        {
           $message = 'Inserting tool data failed';
            include 'error.html.php';
            exit();
        }

        include 'setup.html.php';
    }

?>
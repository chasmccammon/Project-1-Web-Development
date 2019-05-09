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
                $insertQuery = "INSERT INTO Admin(firstName,lastName,userName,password,adminPassword) VALUES(:first,:last,:userName,:password,:adminPassword)";
                $stmt = $pdo->prepare($insertQuery);
                $stmt->bindParam(':first',$name);
                $stmt->bindParam(':last',$surname);
                $stmt->bindParam(':userName',$userName);
                $stmt->bindParam(':password',$hash);
                $stmt->bindParam(':adminPassword',$hash2);
               
                
                
                $stmt->execute();
                }

                //include_once (dirname(__DIR__) . '/login.php');
                // include_once 'welcome.html.php';
            }
            catch(PDOException $e)
            {
                $message = $e;
                include 'error.html.php';
                exit();
            }

            try{
            $selectQuery = "SELECT userName FROM Admin WHERE firstName = '$name'";
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
                $dropQuery = "DROP TABLE IF EXISTS Data";
                $pdo->exec($dropQuery);
                $dropQuery = "DROP TABLE IF EXISTS Lab";
                $pdo->exec($dropQuery);
                $dropQuery = "DROP TABLE IF EXISTS Tool";
                $pdo->exec($dropQuery);
                $dropQuery = "DROP TABLE IF EXISTS Student_Subject";
                $pdo->exec($dropQuery);  
                $dropQuery = "DROP TABLE IF EXISTS Subject_Admin";
                $pdo->exec($dropQuery);
                $dropQuery = "DROP TABLE IF EXISTS Subject";
                $pdo->exec($dropQuery);
               
                $dropQuery = "DROP TABLE IF EXISTS Students";
                $pdo->exec($dropQuery);
                //Drop the tables in order because it has foreign keys in  
                
                $dropQuery = "DROP TABLE IF EXISTS Admin";
                $pdo->exec($dropQuery);
            }
            catch(PDOException $e)
            {
                   $message = $e;
                    include 'error.html.php';
                    exit(); 
            }
    
            try
            { 
                $createQuery2 = "CREATE TABLE Tool
                ( 
                    toolID INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    subjectID INT,
                    tableNamex VARCHAR(100),
                    tableNamey VARCHAR(100),
                    northLabel VARCHAR(100),
                    southLabel VARCHAR(100),
                    eastLabel VARCHAR(100),
                    westLabel VARCHAR(100)
                   
                )";
                $pdo->exec($createQuery2);
    
                
                $createQuery1 = "CREATE TABLE Students
                ( 
                    studentID INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    studentNumber VARCHAR(100),
                    firstName VARCHAR(100),
                    lastName VARCHAR(100),
                    userName VARCHAR(100)
                    
                )";
                $pdo->exec($createQuery1);
    
                $createQuery1 = "CREATE TABLE Lab
                ( 
                    labID INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    labname VARCHAR(100),
                    subjectID INT,
                    -- labcheck VARCHAR(100)
                    isCheckpoint BOOLEAN NOT NULL DEFAULT 0
                    
                )";
                $pdo->exec($createQuery1);
    
                $createQuery = "CREATE TABLE Data
                ( 
                    dataID INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    toolID INT,
                    studentID INT(32) NOT NULL,
                    labID INT(10) NOT NULL,
                    xValue VARCHAR(32),
                    yValue VARCHAR(32),
                    labcompleted BOOLEAN NOT NULL DEFAULT 0,
                    responseTime TIMESTAMP
                   
                )";
                $pdo->exec($createQuery);
    
                $createQuery = "CREATE TABLE Subject
                ( 
                    subjectID INT(10) AUTO_INCREMENT PRIMARY KEY,
                    subjectName VARCHAR (50) NOT NULL,
                    adminID INT(10),
                    code VARCHAR(20),
                    Year INT(4) NOT NULL,
                    semester INT(1) NOT NULL             
                   
                    
                )";
                $pdo->exec($createQuery);
    
                $createQuery = "CREATE TABLE Student_Subject
                ( 
                    sCourseID INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    studentID INT NOT NULL,
                    subjectID INT
                   
                    
                )";
                $pdo->exec($createQuery);
    
                $createQuery = "CREATE TABLE Admin
                ( 
                    adminID INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    firstName VARCHAR(100),
                    lastName VARCHAR(100),
                    userName VARCHAR(100),
                    password VARCHAR(128),
                    adminPassword VARCHAR(128)
                    
                )";
                $pdo->exec($createQuery);
    
                $createQuery = "CREATE TABLE Subject_Admin
                ( 
                    sAdminID INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    subjectID INT(10) NOT NULL,
                    adminID INT(10) 
                 
                )";
                $pdo->exec($createQuery);

          /////////////////// Alter statements for Subject table
         

      
          ///////////////////// Alter statements for Tool table
          $alterQuery = "ALTER TABLE Tool ADD FOREIGN KEY(subjectID) REFERENCES Subject(subjectID) ON DELETE CASCADE ON UPDATE CASCADE; ";
          $pdo->exec($alterQuery);

           ///////////////////// Alter statements for Data table
           $alterQuery = "ALTER TABLE Data ADD FOREIGN KEY(toolID) REFERENCES Tool(toolID) ON DELETE CASCADE ON UPDATE CASCADE; ";
          $pdo->exec($alterQuery);
          
          $alterQuery = "ALTER TABLE Data ADD FOREIGN KEY(studentID) REFERENCES Students(studentID) ON DELETE CASCADE ON UPDATE CASCADE; ";
          $pdo->exec($alterQuery);

          $alterQuery = "ALTER TABLE Data ADD FOREIGN KEY(labID) REFERENCES Lab(labID) ON DELETE CASCADE ON UPDATE CASCADE; ";
          $pdo->exec($alterQuery);

          ////////////////////// Alter statements for Lab table
          $alterQuery = "ALTER TABLE Lab ADD FOREIGN KEY(subjectID) REFERENCES Subject(subjectID) ON DELETE CASCADE ON UPDATE CASCADE; ";
          $pdo->exec($alterQuery);

          ////////////////////// Alter statements for Subject_Admin
          $alterQuery = "ALTER TABLE Subject_Admin ADD FOREIGN KEY(subjectID) REFERENCES Subject(subjectID) ON DELETE CASCADE ON UPDATE CASCADE; ";
          $pdo->exec($alterQuery);

          $alterQuery = "ALTER TABLE Subject_Admin ADD FOREIGN KEY(adminID) REFERENCES Admin(adminID) ON DELETE CASCADE ON UPDATE CASCADE; ";
          $pdo->exec($alterQuery);

          ////////////////////// Alter statement for Student_Subject
          $alterQuery = "ALTER TABLE Student_Subject ADD FOREIGN KEY(studentID) REFERENCES Students(studentID) ON DELETE CASCADE ON UPDATE CASCADE; ";
          $pdo->exec($alterQuery);

          $alterQuery = "ALTER TABLE Student_Subject ADD FOREIGN KEY(subjectID) REFERENCES Subject(subjectID) ON DELETE CASCADE ON UPDATE CASCADE; ";
          $pdo->exec($alterQuery);
        }

            //catch exception if error with query, display error page
            catch(PDOException $e)
            {
                   $message = $e;
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
                        
                $insertQuery ="INSERT into Tool(tableNamex,tableNamey,northLabel,southLabel,eastLabel,westLabel) VALUES('$tableNamex','$tableNamey','$north','$south','$east','$west')";
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
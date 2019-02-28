<!--Designed By: Olufemi Olusina & Albert Warner

    Purpose: A student lab chekpoint tool for Otago polytechnic students

    Description: 
    This PHP file is the controller for the check completed labs function.

    It does not attempt to create a new table, it only utilises the
    available/readily created tables in the database.   
-->
<?php 

    // Require all inputs to go through cleansing
    require_once '../Config/cleandata.php';

   //Connect to database with login details in connect file
   include '../Config/connect.inc.php';
   
   
    //Establish connection to the selected database
    try{
        $pdo = new PDO("mysql:host=$host;dbname=$database", $userMS,$passwordMS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $pdo->exec('SET NAMES "utf8"');

    }
    catch(PDOException $e)
    {
        $message = 'Connection to database failed!';
        include 'error.html.php';
        exit();
    }



    /**************ACCEPT INPUTS FROM USER AND QUERY THE DATABASE****************/

    //Check if completedLabs button is clicked and process contents of post array.
    if(isset($_POST['completedLabs'])) {

    
    /***********CHECK FOR USER INPUT************/
        $rawStudentIDNum = $_POST['studentIDNum'];


        /*****FILTER AND CLEANSE USER INPUTS*****/
        $studentNumber = clean_input($rawStudentIDNum);


        // Check if student has entry in students table.
        $stmt = $pdo->prepare("SELECT COUNT(*) AS `total` FROM students WHERE studentNumber = :studentNumber");
        $stmt->execute(array(':studentNumber' => $studentNumber));
        $result = $stmt->fetchObject();
            
        if ($result->total <= 0) 
        {
            $message = "Sorry...no entry for student with ID: $studentNumber in the database.<br>
                        Please check the input and try again!";
            include "noResult.html.php";
        }
        else {

                try
                {
                //SET ICONS
                $tick = "<h2 style=\"color:green\">&#10004;</h2>";
                $cross = "<h2 style=\"color:red\">&#10006;</h2>";
        
                $stmt = $pdo->prepare("SELECT studentID FROM students WHERE studentNumber = :studentNumber");
                $stmt->execute(array(':studentNumber' => $studentNumber));
                $idArray = $stmt->fetch();
                $id = $idArray[0];
        
        
                //create the Headers of the table
                $labnames = "SELECT labname FROM lab";
                $result = $pdo->query($labnames);
        
        
                //calculate the amount of labs required in the for loop
                $amountOflabs = "SELECT * FROM lab";
                $number = $pdo->query($amountOflabs);
                $numrows = $number->rowCount();
                $correction = $numrows - 1;
        
                //Join query to select a student and the labs they completed and put them into a table
                //The query is concatenated in order to create the pivot
                //The for loop loops around increasing the number of labs
                $table = "SELECT students.userName, ";
        
                for ($i=1; $i <=  $numrows; $i++) { 
        
                    $table.= "MAX(IF(labid = $i,'$tick', '-')) AS Lab$i";  //php pivot - if student has a lab it puts 1 in the table else blank space for no labs
        
                        if($i <= $correction){
                            $table.=", ";
                        }  
                    }
        
                $table.= " FROM completion INNER JOIN students on students.studentid = completion.studentid WHERE students.studentid = \"$id\"  GROUP BY completion.studentid";
                $stmt = $pdo->query($table);
        
                $studentArray = $stmt->fetch();
        
                
                /* Query To find which labs are marked as checkpoints */
                try
                {
                    $selectString = "SELECT DISTINCT labID,labname FROM lab WHERE isCheckpoint = 1";
                    $checkpoints = $pdo->query($selectString);
                    $checkCount = $checkpoints->rowCount();
                }
                catch(PDOException $e)
                {
                    
                    $message = 'Select statement error';
                    include 'error.html.php';
                    exit();
                    
                }

                /************************** IF NO LABS COMPLETED ***********************************************/
                if ($studentArray[0] == NULL){
        
                //create the Headers of the table
                $labnames = "SELECT labname FROM lab";
                $labs = $pdo->query($labnames);
        
                //calculate the amount of labs required in the for loop
                $amountOflabs = "SELECT * FROM lab";
                $number = $pdo->query($amountOflabs);
                $numrows = $number->rowCount();
                $correction = $numrows - 1;
        
                $tables = "SELECT userName FROM students  WHERE studentid = \"$id\"  GROUP BY studentid";
                $emptyLabs = $pdo->query($tables);

                $message = $cross;

                include 'completedLabsEmpty.html.php';
                }

                else{
                
                //create the Headers of the table
                $labnames = "SELECT labname FROM lab";
                $result = $pdo->query($labnames);
        
        
                //calculate the amount of labs required in the for loop
                $amountOflabs = "SELECT * FROM lab";
                $number = $pdo->query($amountOflabs);
                $numrows = $number->rowCount();
                $correction = $numrows - 1;
        
                //Join query to select a student and the labs they completed and put them into a table
                //The query is concatenated in order to create the pivot
                //The for loop loops around increasing the number of labs
                $table = "SELECT students.userName, ";
        
                for ($i=1; $i <=  $numrows; $i++) { 
        
                    $table.= "MAX(IF(labid = $i,'$tick', '-')) AS Lab$i";  //php pivot - if student has a lab it puts 1 in the table else blank space for no labs
        
                        if($i <= $correction){
                            $table.=", ";
                        }  
                    }
        
                $table.= " FROM completion INNER JOIN students on students.studentid = completion.studentid WHERE students.studentid = \"$id\"  GROUP BY completion.studentid";
                $stmt = $pdo->query($table);
        
                    include 'completedLabsOutput.html.php';
                }
                }
                catch (PDOEXCEPTION $e)
                {
                    $message = 'Select statement error';
                    include 'error.html.php';
                    exit();
                }

            }
   
    } 

    /***************************************************************************
    *Else if any other button is triggered other than see completed labs button
    *Load the completed labs form page
    ***************************************************************************/
   else {
        include "completedLabsForm.html.php";
   } 



?>
<!--Designed By: Olufemi Olusina & Albert Warner


    Purpose: A student lab chekpoint tool for Otago polytechnic students

    Description: 
    This PHP file is the controller to mark attendance function.
    It does not attempt to create a new table, it only utilises the
    available/readily created tables in the database.
    
     Security Note:
     1) Input Text for Tutor password changed to text.
     2) Added a font library link in the html
     3) On the style.css in the input tag there is a font family: text-security, which allows the input field to look like a security field.
     This cause the illusion to the browser that the field is plain text but the css covers the password not to be seen by the user.
     The browser think this is a plain text field and does not ask to store the password.  
-->
<?php 

    ###############################################
    # N.B: Go to Line 126 to change the passcode. #
    ###############################################

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


    /**************SELECT STATEMENTS FOR OPTIONS IN THE FORM****************/
    try{
        
    /*****************************************
    *  Select statement for list of students
    *****************************************/
        $selectString = "SELECT DISTINCT userName, studentID
        from students
        ORDER BY lastName";

       $students = $pdo->query($selectString);


   /*****************************************
    *  Select statement for list of labs
    *****************************************/
        $selectString = "SELECT labID, labname
        from lab
        ORDER BY labID";

       $labs = $pdo->query($selectString);


    /*****************************************
    *  Select statement for labels in tool 1
    *****************************************/
        $selectString = "SELECT *
        from tool
        WHERE toolID = 1";

       $tool1Labels = $pdo->query($selectString);



    /*****************************************
    *  Select statement for labels in tool 2
    *****************************************/ 
        $selectString = "SELECT *
        from tool
        WHERE toolID = 2";

       $tool2Labels = $pdo->query($selectString);


    /*****************************************
    *  Select statement for labels in tool 3
    *****************************************/
        $selectString = "SELECT *
        from tool
        WHERE toolID = 3";

       $tool3Labels = $pdo->query($selectString);

    }
    catch(PDOException $e)
    {
        $message = 'Select statement error';
        include 'error.html.php';
        exit();
    }

    /**************ACCEPT INPUTS FROM USER AND QUERY THE DATABASE****************/

    //Check if submit button is clicked and process contents of post array.
    if(isset($_POST['attendanceOnly'])) {

        /***********CHECK FOR USER INPUT************/
        
        $tutorPassword = $_POST['tutorPassword'];
        $studentID = $_POST['studentName'];
        $labNumber = $_POST['labs'];

        // Set timezone and format for response time
        date_default_timezone_set('Pacific/Auckland');
        $responseTime = date('Y-m-d H:i:s');
            
        /*****FILTER AND CLEANSE USER INPUTS*****/
        $password = clean_input($tutorPassword);

        ###########################################
        # Calculate passcode from Lab Number      #
        ###########################################
        $passCode = $labNumber + 5; 

        //Regular expression check for correct entered password
        $passwordMatch = "$passCode";
        $success = true;

        if ($password == $passCode) {

            // Check if student has entry in attendance table, and has used the grid
            $stmt = $pdo->prepare("SELECT COUNT(*) AS `total` FROM attendance WHERE studentID = :studentID AND labID = :labID");
            $stmt->execute(array(':studentID' => $studentID,':labID' => $labNumber));
            $result = $stmt->fetchObject();
                
            if ($result->total > 0) 
            {
                $message = "Sorry...your attendance has already been marked off for this lab!.";
                include "noResult.html.php";
            }
            else {
                // Check if student has entry in the data table or has been marked off already
                $stmt = $pdo->prepare("SELECT COUNT(*) AS `total` FROM data WHERE studentID = :studentID AND labID = :labID");
                $stmt->execute(array(':studentID' => $studentID,':labID' => $labNumber));
                $result = $stmt->fetchObject();
                
                if ($result->total > 0) 
                {
                    $message = "Sorry...you have already done the survey for this lab!.";
                    include "noResult.html.php";
                }

                else{
                    try{
                        // Prepare statement and bind parameters
                        $insertQuery ="INSERT into attendance(studentID,labID,responseTime)                
                        VALUES(:studentID,:labID,:responseTime)";

                        $stmt = $pdo->prepare($insertQuery);
                        $stmt->bindParam(':studentID',$studentID);
                        $stmt->bindParam(':labID',$labNumber);
                        $stmt->bindParam(':responseTime',$responseTime);

                        $result = $stmt->execute();

                        include 'toolOne.html.php';
                        }                                
                    catch(PDOException $e){

                        $message = 'Insert into database failed!';
                        include 'error.html.php';
                        exit();
                    }
                }
            }     
        }
        else {
                if(!preg_match("/$passwordMatch/", $password))
                {
                    //make an error variable to be echoed in an error page
                    $success = false;
                    $message = "Incorrect password!. <br><br> Go back and try again.";
                    include "wrongPassword.html.php";
                }
            }
    }
      
   
    /******************************* TOOL 1 *******************************/
   else if((isset($_POST['sendAnswer1'])) || (isset($_POST['skip1'])) ){
        try{

            $studentID = $_POST['studentID'];
            $labID = $_POST['labID'];

                //Get clicked coordinates from grid
                if (isset($_POST['editRadio'])) {

                    $selected = $_POST['editRadio'];

                    $cords = explode(",",$selected);
                    $xValue = $cords[0];
                    $yValue = $cords[1];
                }
                else {
                    $xValue = NULL;
                    $yValue = NULL;
                }

                $toolID = 1;

                // Prepare statement and bind parameters
                $insertQuery ="INSERT into data(toolID,studentID,labID,xValue,yValue)                
                VALUES(:toolID,:studentID,:labID,:xValue,:yValue)";

                $stmt = $pdo->prepare($insertQuery);
                $stmt->bindParam(':toolID',$toolID);
                $stmt->bindParam(':studentID',$studentID);
                $stmt->bindParam(':labID',$labID);
                $stmt->bindParam(':xValue',$xValue);
                $stmt->bindParam(':yValue',$yValue);

                $result = $stmt->execute();

                 include "toolTwo.html.php";
            }
        catch(PDOException $e){
                        $message = 'Insert into database failed!';
                        include 'error.html.php';
                        exit();
                }
        }
        

     /******************************* TOOL 2 *******************************/
   else if((isset($_POST['sendAnswer2'])) || (isset($_POST['skip2'])) ){
        try{
            $studentID = $_POST['studentID'];
            $labID = $_POST['labID'];

                //Get clicked coordinates from grid
                if (isset($_POST['editRadio'])) {
                    
                    $selected = $_POST['editRadio'];

                    $cords = explode(",",$selected);
                    $xValue = $cords[0];
                    $yValue = $cords[1];
                }
                else {
                    $xValue = NULL;
                    $yValue = NULL;
                }

                $toolID = 2;
               
                $insertQuery ="INSERT into data(toolID,studentID,labID,xValue,yValue)                
                VALUES(:toolID,:studentID,:labID,:xValue,:yValue)";

                $stmt = $pdo->prepare($insertQuery);
                $stmt->bindParam(':toolID',$toolID);
                $stmt->bindParam(':studentID',$studentID);
                $stmt->bindParam(':labID',$labID);
                $stmt->bindParam(':xValue',$xValue);
                $stmt->bindParam(':yValue',$yValue);

                $result = $stmt->execute();
        
                
                include "toolThree.html.php";

            }
        catch(PDOException $e){
                    $message = 'Insert into database failed!';
                    include 'error.html.php';
                    exit();
            }
        }


     /******************************* TOOL 3 *******************************/
   else if((isset($_POST['sendAnswer3'])) || (isset($_POST['skip3'])) ){

        try{
            $studentID = $_POST['studentID'];
            $labID = $_POST['labID'];
            
                 //Get clicked coordinates from grid
                 if (isset($_POST['editRadio'])) {
                    
                    $selected = $_POST['editRadio'];

                    $cords = explode(",",$selected);
                    $xValue = $cords[0];
                    $yValue = $cords[1];
                }
                else {
                    $xValue = NULL;
                    $yValue = NULL;
                }


                $toolID = 3;

                // Prepare statement and bind parameters
                $insertQuery ="INSERT into data(toolID,studentID,labID,xValue,yValue)                
                VALUES(:toolID,:studentID,:labID,:xValue,:yValue)";

                $stmt = $pdo->prepare($insertQuery);
                $stmt->bindParam(':toolID',$toolID);
                $stmt->bindParam(':studentID',$studentID);
                $stmt->bindParam(':labID',$labID);
                $stmt->bindParam(':xValue',$xValue);
                $stmt->bindParam(':yValue',$yValue);

                $result = $stmt->execute();

                $message = "Your answers have been saved.";
                include "feedback.html.php";
            }
        catch(PDOException $e){
                $message = 'Insert into database failed!';
                include 'error.html.php';
                exit();
            }
        }

    /*************************************************************** 
    *Else if any other button is triggered other than mark attendance 
    *only button. Load the form.
    ****************************************************************/
   else {
    include "attendanceForm.html.php";
   } 

?>
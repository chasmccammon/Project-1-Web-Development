<?php 
if(!isset($_SESSION)) { session_start(); } //refreshes session since a valid SID exit (type in by the user)
include 'accessControl.php';
/*
Lead Developers: Albert Warner &  Olufemi Olusina
Description: Controller to calculate the class average response
*/


     // create log on page 
     include '../Config/connect.inc.php';
     include_once '../Config/cleandata.php';

   
   
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
    
    // Select Tool's axes values for graphs
    try
    {
        $selectString = "SELECT * FROM tool where toolID = 1";
        $stmt = $pdo->query($selectString);
        $tool1 = $stmt->fetch();
        $tool1x = $tool1["tableNamex"];
        $tool1y = $tool1["tableNamey"];

        $selectString = "SELECT * FROM tool where toolID = 2";
        $stmt = $pdo->query($selectString);
        $tool2 = $stmt->fetch();
        $tool2x = $tool2["tableNamex"];
        $tool2y = $tool2["tableNamey"];

        $selectString = "SELECT * FROM tool where toolID = 3";
        $stmt = $pdo->query($selectString);
        $tool3 = $stmt->fetch();
        $tool3x = $tool3["tableNamex"];
        $tool3y = $tool3["tableNamey"];
    }
    catch(PDOException $e)
    {
        $message = 'Select statement error';
        include 'error.html.php';
        exit();  
    }

    /**************SELECT STATEMENTS FOR OPTIONS IN THE FORM****************/

    try
        {
        /*****************************************
        *  Select statement for count of labs
        *****************************************/
        $selectString = "SELECT DISTINCT COUNT(labID)
        from lab";
        $stmt = $pdo->query($selectString);
        $labCount = $stmt->fetch(PDO::FETCH_COLUMN,0);

        
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


        /*****************************************
        // TOOL 1
        *****************************************/
        $interest = "SELECT DISTINCT  data.labID, AVG(data.xValue) as 'xValueAverage',tool.toolID
                        FROM data join tool on tool.toolID = data.toolID 
                        where data.toolID = 1
                        GROUP BY data.labID";

        $stmt = $pdo->query($interest);
        $InterestAVG = $stmt->fetchAll();


        $difficulty = "SELECT DISTINCT  data.labID, AVG(data.yValue) as 'yValueAverage',tool.toolID
                        FROM data join tool on tool.toolID = data.toolID 
                        where data.toolID = 1
                        GROUP BY data.labID";

        $stmt = $pdo->query($difficulty);
        $DifficultyAVG = $stmt->fetchAll();



        /*****************************************
        // TOOL 2
        *****************************************/
        $plan = "SELECT DISTINCT  data.labID, AVG(data.xValue) as 'xValueAverage',tool.toolID
                    FROM data join tool on tool.toolID = data.toolID 
                    where data.toolID = 2
                    GROUP BY data.labID";

        $stmt = $pdo->query($plan);
        $PlanAVG = $stmt->fetchAll();


        $familiarity = "SELECT DISTINCT  data.labID, AVG(data.yValue) as 'yValueAverage',tool.toolID
                        FROM data join tool on tool.toolID = data.toolID 
                        where data.toolID = 2
                        GROUP BY data.labID";

        $stmt = $pdo->query($familiarity);
        $FamiliarityAVG = $stmt->fetchAll();



        /*****************************************
        // TOOL 3
        *****************************************/
        $satisfaction = "SELECT DISTINCT  data.labID, AVG(data.xValue) as 'xValueAverage',tool.toolID
                        FROM data join tool on tool.toolID = data.toolID 
                        where data.toolID = 3
                        GROUP BY data.labID";

        $stmt = $pdo->query($satisfaction);
        $SatisfactionAVG = $stmt->fetchAll();


        $improvement = "SELECT DISTINCT  data.labID, AVG(data.yValue) as 'yValueAverage',tool.toolID
                        FROM data join tool on tool.toolID = data.toolID 
                        where data.toolID = 3
                        GROUP BY data.labID";

        $stmt = $pdo->query($improvement);
        $ImprovementAVG = $stmt->fetchAll();


        include 'ClassAverageResponse.html.php';
        }
        catch(PDOException $e)
        {    
                $message = 'Select statement error';
                include 'error.html.php';
                exit();      
        }
      
?>
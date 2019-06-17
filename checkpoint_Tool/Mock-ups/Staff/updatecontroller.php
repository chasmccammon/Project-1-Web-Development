<?PHP
if(!isset($_SESSION)) { session_start(); } //refreshes session since a valid SID exit (type in by the user)
include 'accessControl.php';
/*
Lead Developers: Albert Warner &  Olufemi Olusina
Description: The Page is allows the admin to update the label / questions of student tool
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
        if (isset($_POST['update']))
        {
            $tool1 = clean_input($_POST['toolID1']);  
            $tool2 = clean_input($_POST['toolID2']);
            $tool3 = clean_input($_POST['toolID3']); 

            $namex1 = clean_input($_POST['tableNamex1']);
            $namey1 = clean_input($_POST['tableNamey1']);
            $northlabel1 = clean_input($_POST['northLabel1']);
            $southlabel1 = clean_input($_POST['southLabel1']);
            $eastlabel1 = clean_input($_POST['eastLabel1']);
            $westlabel1 = clean_input($_POST['westLabel1']);

            $namex2 = clean_input($_POST['tableNamex2']);
            $namey2 = clean_input($_POST['tableNamey2']);
            $northlabel2 = clean_input($_POST['northLabel2']);
            $southlabel2 = clean_input($_POST['southLabel2']);
            $eastlabel2 = clean_input($_POST['eastLabel2']);
            $westlabel2 = clean_input($_POST['westLabel2']);

            $namex3 = clean_input($_POST['tableNamex3']);
            $namey3 = clean_input($_POST['tableNamey3']);
            $northlabel3 = clean_input($_POST['northLabel3']);
            $southlabel3 = clean_input($_POST['southLabel3']);
            $eastlabel3 = clean_input($_POST['eastLabel3']);
            $westlabel3 = clean_input($_POST['westLabel3']);

            try{

                $updateString = "UPDATE Tool set tableNamex ='$namex1',tableNamey ='$namey1',northLabel='$northlabel1',southLabel='$southlabel1',eastLabel='$eastlabel1',westLabel='$westlabel1' where toolID = $tool1";
                $stmt = $pdo->query($updateString);

                $updateString2 = "UPDATE Tool set tableNamex ='$namex2',tableNamey ='$namey2',northLabel='$northlabel2',southLabel='$southlabel2',eastLabel='$eastlabel2',westLabel='$westlabel2' where toolID = $tool2";
                $stmt2 = $pdo->query($updateString2);

                $updateString = "UPDATE Tool set tableNamex ='$namex3',tableNamey ='$namey3',northLabel='$northlabel3',southLabel='$southlabel3',eastLabel='$eastlabel3',westLabel='$westlabel3' where toolID = $tool3";
                $stmt = $pdo->query($updateString);

            }       
               catch(PDOException $e)
            {
                
                    $message = 'Update statement error';
                    include 'error.html.php';
                    exit();
                
            }

            try
            {
                $selectString = "SELECT *
                from Tool
                ORDER BY toolID";
                $tool= $pdo->query($selectString);
            }
            catch(PDOException $e)
            {
                
                    $message = 'Select statement error';
                    include 'error.html.php';
                    exit();
                
            }
                include 'updategraphResults.php';
            
            
        }
        else
        {
            try{
            //display all the Graphs information from DB
            $selectString = "SELECT toolID, tableNamex, tableNamey, northLabel,southLabel,eastLabel,westLabel FROM Tool WHERE toolID = 1";
            $stmt = $pdo->prepare($selectString);
            //Execute the statement
            $stmt->execute();
            //Retrieve the rows using fetchAll.
            $label = $stmt->fetchAll();


            $selectString2 = "SELECT toolID, tableNamex, tableNamey, northLabel,southLabel,eastLabel,westLabel FROM Tool WHERE toolID = 2";
            $stmt = $pdo->prepare($selectString2);
            //Execute the statement
            $stmt->execute();
            //Retrieve the rows using fetchAll.
            $label2 = $stmt->fetchAll();

            $selectString3 = "SELECT toolID, tableNamex, tableNamey, northLabel,southLabel,eastLabel,westLabel FROM Tool WHERE toolID = 3";
            $stmt = $pdo->prepare($selectString3);
            //Execute the statement
            $stmt->execute();
            //Retrieve the rows using fetchAll.
            $label3 = $stmt->fetchAll();
            }
            catch(PDOException $e)
            {
                
                    $message = 'Select statement error';
                    include 'error.html.php';
                    exit();
                
            }
            include 'updategraphs.html.php';
        }

    }
    catch (PDOException $e)
    {
         $message = 'Select statement error';
         include 'error.html.php';
         exit();
    }
?>    
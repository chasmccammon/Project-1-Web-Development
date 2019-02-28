<?PHP
if(!isset($_SESSION)) { session_start(); } //refreshes session since a valid SID exit (type in by the user)
include 'accessControl.php';
/* 
Lead Developers: Albert Warner &  Olufemi Olusina
Description: The Page is add student controller , takes the information from the html and passes into the database with a
query. User regular expression to check if the student information is entered correctly

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
        if (isset($_POST['submit']))
        {
                // the data cleaned from the post and stored into variables
                $studentNumber = clean_input($_POST['studentNumber']);   
                $name = clean_input($_POST['firstname']);
                $surname = clean_input($_POST['lastname']);
                //Regular expression
                $firstNameMatch = "(^[-a-z-A-Z,.'\s]+$)"; # -a-Z allow for hyphen between words. \s allows for spaces between words
                $lastNameMatch = "(^[-a-z-A-Z,.'\s]+$)";
                $IDMatch = "(^[0-9]+$)"; 
                //Boolean set to true
                $success = true;
                // if the regular express does not match,set boolean to false
                        if(!preg_match($firstNameMatch, $name))
                        {
                            //make an error variable to be echoed in an error page
                            $message = "Please enter character A-Z";
                            $success = false; 
                
                        }
                        else // if true display blank message just in case of other regular expression is false
                        {
                            $message = " ";
                        }
                        if(!preg_match($lastNameMatch, $surname))
                        {
                            //make an error variable to be echoed in an error page
                            $message1 = "Please enter character A-Z";
                            $success = false;
                
                        }
                        else
                        {
                            $message1 = " ";
                        }
                        if(!preg_match($IDMatch, $studentNumber))
                        {
                            //make an error variable to be echoed in an error page
                            $message2 ="Please enter character 0-9";
                            $success = false;
                
                        }
                        else
                        {
                            $message2 = " ";
                        }
                    //if the boolean is still true insert the data into the database with a query
                    if( $success == true)
                    {
                        $username = $name." ".$surname;
                        $insertQuery = "INSERT INTO students(studentNumber,firstName,lastName,userName) VALUES(:snumber,:first,:last,:userName)";
                        $stmt = $pdo->prepare($insertQuery);
                        $stmt->bindParam(':snumber',$num);
                        $stmt->bindParam(':first',$first);
                        $stmt->bindParam(':last',$last);
                        $stmt->bindParam(':userName',$userN);
                        
                        //inserting the records
                        $num = $studentNumber;
                        $first = $name;
                        $last = $surname;
                        $userN = $username;
                        $stmt->execute();
                        $lastOne = $pdo->lastInsertId();
                        $countRows =  $stmt->rowCount();
                        $name = $first." ".$last;
                        include 'addStudentResult.html.php';
                    }
                    else
                    {
                        include 'addstudentfail.html.php';
                    }                     
                
        }
        else
        {
          
            include 'addstudent.html.php';
        }

    }
    catch (PDOException $e)
    {
         $message = 'Select statement error';
         include 'error.html.php';
         exit();
    }
?>    
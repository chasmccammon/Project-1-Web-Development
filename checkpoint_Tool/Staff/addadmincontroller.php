<?PHP
if(!isset($_SESSION)) { session_start(); } //refreshes session since a valid SID exit (type in by the user)
include 'accessControl.php';

/* 
Lead Developers: Albert Warner &  Olufemi Olusina
Description: This is the add admin controller , it adds people to database , people who have access to log onto the website
*/


     // create log on page 
     include '../Config/connect.inc.php';
     require_once '../Config/cleandata.php';

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
                $name = clean_input($_POST['firstname']);
                $surname = clean_input($_POST['lastname']);
                $newUser = clean_input($_POST['newUser']);
                $userpassword = clean_input($_POST['userpassword']);
                $adminpass = clean_input($_POST['adminPassword']);
                //Get the admin 
                $adminQuery = "SELECT * FROM admin WHERE adminID = '1'";
                 //get the name.
                $stmt = $pdo->prepare($adminQuery);
                $stmt->execute();
                 //Retrieve the rows using fetchAll.
                $names = $stmt->fetchAll();
                $admin = $names[0]['userName']; // retrieve the name from array
            
                $selectQuery = "SELECT userName,adminPassword FROM admin WHERE userName =  :first";
                $result = $pdo->prepare($selectQuery);
                $result->bindParam(':first',$admin);
                $result->execute();
                $rowCount = $result->rowCount();
                $row = $result->fetch();
                if($rowCount>0)
                {
                //check the database to see if the password is same
                //crypt takes the inserted password and hashes it and compares to the database
                    if(crypt($adminpass,$row['adminPassword']) === $row['adminPassword'])
                    {
                         //cost
                        $cost=10;
                        //Create a random salt
                        $salt = strtr(base64_encode(random_bytes(16)), '+','.');
                        $salt = sprintf("$2a$%02d$",$cost) . $salt;
                        //hash the password with salt 
                        $hash = crypt($userpassword,$salt);
                            //using prepare statement to add the data to database
                        $insertQuery = "INSERT INTO admin(firstName,lastName,userName,password) VALUES(:first,:last,:userName,:password)";
                        $stmt = $pdo->prepare($insertQuery);
                        $stmt->bindParam(':first',$first);
                        $stmt->bindParam(':last',$last);
                        $stmt->bindParam(':userName',$userN);
                        $stmt->bindParam(':password',$passW);
                        
                        //inserting the records
                        $first = $name;
                        $last = $surname;
                        $userN = $newUser;
                        $passW = $hash;
                        $stmt->execute();
                        $lastOne = $pdo->lastInsertId();
                        $countRows =  $stmt->rowCount();
                        $name = $first." ".$last;
                        include 'registrationResult.html.php';
                    }
                    else
                    {
                        
                        $message = "Sorry, incorrect Admin password!";
                        include 'error.html.php';
                    }
                
                }
        }
        else
        {
            include 'registration.html.php';
        }

    }
    catch (PDOException $e)
    {
         $message = 'Select statement error';
         include 'error.html.php';
         exit();
    }
?>    
Welcome To The Student Tool Setup.

***************************************************
* Database Setup                                  *
***************************************************

1) Inside the Config Directory, there is a file called connect.inc.php
2) Open the file and you will find: $host , $userMS ,  $passwordMS , $database
3) Please note this file will contains personal information to the Database, keep it safe on the server.
    Information required to be completed by user:
    $host -> The name of the database you are connecting to: mariadb.ict.op.ac.nz
    $userMS -> The username you use to log onto the database
    $passwordMS -> Password to the Database
    $database -> The database been used for the tool -> Please note: this must be manually created via phpmyadmin or the console.

***************************************************
* Configuring the Admin of the Student Tool       *
***************************************************

1) Select the Setup Directory and follow the steps to set up the Course details and the Admin of the tool.

***************************************************
* Directory Permissions                           *
***************************************************

1) There is a Directory called uploads, this Directory is where files are uploaded from the website.
2) Location of Directory: Checkpoint_Tool/Staff/uploads 
2) Right click on the Directory and click on the properties tab
3) Change the Permissions to 5777
4) Please note the tool used to upload folders/files to the server was WinSCP - The next following step are done through FTP Tool:
5) Refresh the server and make sure Rights on the folder have to changed to: "rwsrwxrwt"
6) Go into the uploads directory and refresh the server
7) The refresh is just to make sure the server updates on the new Permissions 
8) If the Permissions are not change on this Directory, no files can be uploaded.


***************************************************
* Login as a Admin                                *
***************************************************

1) First step is to upload students file as a CSV file format. This can be found on the Database Tab.
2) CSV format should be: Student ID, name then surname -> example: 10000001,James,Bond
3) Second is to add the number of labs required for the semester. This can be found on the Labs Tab.  

***************************************************
* Change Password on the Stupid Tool                  *
***************************************************

1) The File path is: Checkpoint_Tool/Student/
2) In the checkpointController.php on line 123 change the password
3) If you selected the attendance tab, in the attendanceController.php on line 126 change the password  



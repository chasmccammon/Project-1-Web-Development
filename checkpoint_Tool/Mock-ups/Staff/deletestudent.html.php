<!-- /* 
Lead Developers: Albert Warner &  Olufemi Olusina
Description: The Page displays the the sailor that can be deleted with a checkbox next to their name

*/ -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     
     <!-- Bootstrap CSS CDN -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style4.css?<?php echo time();?>">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="js/top.js"></script>

    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
     <title>Delete Student</title>
 </head>
 <body>
    <form class="deletestudentcontroller" action = 'deletestudentcontroller.php' method = 'POST'>
        <?php include 'navigation.php' ?>

        <div class="container3">

        <h1 class="title"> Delete Student</h1>

        <br>
         <p class= "alert alert-info text-center"> Tip: Select student to delete with the radio button, and scroll to bottom of page to click "Delete" button. </p>
            <table >
                <tr>
                    <th> Student ID</th><th> Student Number</th><th> First Name</th> <th> Last Name</th> <th> User Name</th> 
                </tr>
                <!--Check if nothing to show-->
                <?php if ($countRows == 0 ) {?>
                    <tr>
                    <td colspan="5">No Entry yet!</td>
                    </tr>
                <?php } ?>

                <?php
                foreach($result as $row)
                {?>
                    
                <tr>
                    <td>
                    <label class="btn btn-circle btn-sm"><input type='radio' class= "radio" name='deletelist[]' value='<?=("$row[studentID]");?>' required></label>
                    </td>
                    <td>
                    <?=("$row[studentNumber]");?>
                    </td>
                    <td>
                    <?=("$row[firstName]");?>
                    </td>
                    <td>
                    <?=("$row[lastName]");?>
                    </td>
                    <td>
                    <?=("$row[userName]");}?>
                    </td>
                </tr>  
                
        </table>
        <br>
        <input id="checkBtn" class="button btn btn-info btn-lg" type='submit' name='delete' value='Delete' />
        </div>

       </form>
       <script type="text/javascript">
            $(document).ready(function () {
                $('#checkBtn').click(function() {
                    checked = $("input[type=checkbox]:checked").length;
                    if(!checked) {
                        alert("You must check at least one checkbox");
                        return false;
                    }
                });
            });
        </script>

                <!-- jQuery CDN -->
                <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script> 

 </body>
 </html>
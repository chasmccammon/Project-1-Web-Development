<!--     
Lead Developers: Albert Warner &  Olufemi Olusina

Description: The Page displays the list of Labs to to be selected for checkpoint.
 -->

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">

     <!-- Bootstrap CSS CDN -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="./css/style4.css?<?php echo time();?>">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script> 

    <!--Script for Checkpoint Select All function-->
    <script language="JavaScript">
        function toggleCheck(source) {
            checkboxesCheck = document.getElementsByName('checkpointlist[]');
            for(var i=0, n=checkboxesCheck.length;i<n;i++) {
                checkboxesCheck[i].checked = source.checked;
            }
        }
    </script>

    <!--Script for Non Checkpoint Select All function-->
    <script language="JavaScript">
        function toggleNonCheck(source) {
            checkboxes = document.getElementsByName('noncheckpointlist[]');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
            }
        }
    </script>

     <title>Checkpoint Labs</title>
 </head>
 <body>
    <form class="checklabcontroller" action = 'checklabcontroller.php' method = 'POST'>
        <?php include 'navigation.php' ?>

        <div class="container3">

            <h1 class="title"> Checkpoint Lab Selection</h1>

            <br>

            <!--INFO-->
            <p class= "alert alert-info text-left"> 
               <strong> Tip:</strong> Use the checkbox to select Labs, scroll to the bottom of page and click <u>"Add Checkpoint"</u> or <u>"Remove Checkpoint"</u>  button to update list.
                            <br>These Labs will be displayed as checkpoints for students.
                </p>
                
                <!--================================CHECKPOINTS=======================================-->
                <fieldset>
                    <legend><h3 class="title text-left">Checkpoint Labs:</h3></legend>
                
                    <!--SELECT ALL-->
                    <div class="text-left">
                        <label class="btn btn-circle btn-sm"><input type='checkbox' id="check" class="radio" onClick="toggleCheck(this)"/></label>
                        <label for="check"><h4> Select All</h4></label>
                    </div>

                    <!--TABLE-->
                    <table >
                        
                        <tr>
                            <th> Lab ID</th><th> Lab Name</th> 
                        </tr>

                        <!--Check if no lab to show-->
                        <?php if ($checkpointsCount == 0 ) {?>
                            <tr>
                            <td colspan="2">No Lab Entry yet!</td>
                            </tr>
                        <?php } ?>
                        
                        <?php foreach($checkpoints as $key){?>                   
                        <tr>
                            <td>
                            <label class="btn btn-circle btn-sm"><input type='checkbox' class="radio" name='checkpointlist[]' value='<?=("$key[labID]");?>'></label>
                            </td>
                            <td>
                                <?=("$key[labname]");?>
                            </td>
                        </tr>  
                       <?php }?>
                </table>
                <br>
                <input id="checkBtnCheck" class="button btn btn-info btn-lg checkBtn" type='submit' name='remCheck' value='Remove Checkpoint' />
            </fieldset>

            <br><br><br>

            <!--================================NON CHECKPOINTS=======================================-->
            <fieldset>
                <legend><h3 class="title text-left">Non Checkpoint Labs:</h3></legend>

                <!--SELECT ALL-->
                <div class="text-left">
                    <label class="btn btn-circle btn-sm"><input type='checkbox' id="nonCheck" class="radio" onClick="toggleNonCheck(this)"/></label>
                    <label for="nonCheck"><h4> Select All</h4></label>
                </div>

                <!--TABLE-->
                <table >
                    
                    <tr>
                        <th> Lab ID</th><th> Lab Name</th> 
                    </tr>

                    <!--Check if no lab to show-->
                    <?php if ($nonCheckpointsCount == 0 ) {?>
                        <tr>
                            <td colspan="2">No Lab Entry yet!</td>
                        </tr>
                    <?php } ?>

                    <?php
                    foreach($nonCheckpoints as $row)
                    {?>                   
                    <tr>
                        <td>
                        <label class="btn btn-circle btn-sm"><input type='checkbox' class="radio" name='noncheckpointlist[]' value='<?=("$row[labID]");?>'></label>
                        </td>
                        <td>
                             <?=("$row[labname]");}?>
                        </td>
                    </tr>  
                    
            </table>
            <br>
            <input id="checkBtn" class="button btn btn-info btn-lg checkBtn" type='submit' name='addCheck' value='Add Checkpoint' />
        </fieldset>
        </div>

       </form>

       <!--Script to enforce selection-->
       <script type="text/javascript">
            $(document).ready(function () {
                $('.checkBtn').click(function() {
                    checked = $('input[type=checkbox]:checked').length;
                    if(!checked) {
                        alert("Info: You must check at least one checkbox!");
                        location.href='#'                 
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
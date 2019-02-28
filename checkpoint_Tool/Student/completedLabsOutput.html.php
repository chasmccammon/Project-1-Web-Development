<!--Designed By: Olufemi Olusina & Albert Warner
    Purpose: A student lab chekpoint tool for Otago polytechnic students
    Description:
    This file displays the user's search results from database query
    -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!--<meta charset="UTF-8">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--INCLUDE HEADER DEFINITION FILE-->
    <?php include 'header.inc.php'; ?>
    <title><?= $header[0];?> Checkpoint Tool</title>

    <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cambay:400,400i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>">
    <script src="top.js"></script>
</head>
<body>

        <!--************************HEADER****************************-->
        <div class="header">
            <!--Lab Checkpoint Tool-->
             <?= $header[0];?> Checkpoint Tool
        </div>

        <div class="body">
        <!--************************CONTENT****************************-->

            <a href='completedLabsController.php'>
                    <div class='go_back'>
                        &lt; Go Back
                    </div>
                </a>

            <div class="contentLabsCompleted">

                <!--Display checkpoint labs in a table-->
                <table class="completedLabs">
                    <tr><th colspan="<?= $checkCount ?>"> Checkpoint Labs</th></tr>
                    <br>
                    <tr>
                        <?php 
                        // <!--Check if no lab to show-->
                        if ($checkCount == 0 ) {?>
                            <tr>
                                <td colspan="3">No Lab Entry yet!</td>
                            </tr>
                        <tr>
                       <?php }
                        else{
                            
                            foreach($checkpoints as $c){ ?>
                            <td style="border: dotted 0.5px black;"><?= $c['labname'] ?></td>
                        <?php } 
                        }?>
                        </tr>
                    </tr>
                </table>

                <br>
              <!--Display results from in a table-->
              <?php foreach($stmt as $row){ ?>
                    <table class="completedLabs">
                        <caption><strong>Labs Completed for: <?= $row['userName'] ?></strong></caption>
                        <br>
                        <tr>
                            <?php foreach($result as $r){ ?>
                                <th><?= $r['labname'] ?></th>
                            <?php } ?>
                        </tr>
        
                        <tr>  
                            <?php for($i=1;$i<=$numrows;$i++){ ?>
                                <td><?= $row["Lab".$i] ?></td>
                            <?php } ?>  
                            
                        </tr>
                    </table>
                
                <?php  }?>

            </div>

        <!--Function to help user navigate the page easily-->
        <button onclick="topFunction()" id="myBtn" title="Go to top">Go To Top</button>

        </div>    
</body>
</html>
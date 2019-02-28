<!--Designed By: Olufemi Olusina & Albert Warner

    Purpose: A student lab chekpoint tool for Otago polytechnic students

    Description:
    This file displays the grid that the user clicks on for survey.
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
    <script src="highlightCell.js"></script>
</head>
<body>
        <!--************************HEADER****************************-->
        <div class="header">
            <!--Lab Checkpoint Tool-->
             <?= $header[0];?> Checkpoint Tool
        </div>

        <div class="body">
        <!--************************CONTENT****************************-->

            <div class="toolContent">
            
                <form action="checkpointController.php" method="post" class="form">

                <!-- Hidden inputs to use values in session on this page -->
                <input type="hidden" name="studentID" value="<?=  $studentID ?>"/>
                <input type="hidden" name="labID" value="<?=  $labID ?>"/>

                            <h3>QUESTION  3 / 3: </h3>
                            <h4>Use the grid to choose the point that best describes your opinion of today's lab.</h4>
            
                            <table >
                            <tr>

                                <!-- Cell containing label for negative X-Axis side-->
                                <td class="xAxisNeg">
                                    <?php foreach ($tool3Labels as $key) {?>
                                    <div class="xAxisText"><?= $key['westLabel']; ?></div>
                                </td>


                                <!-- Cell containing grid/canvas-->
                                <td>

                                    <!--Canvas table-->
                                    <table class="table" >

                                        <!--Caption for top of grid -->
                                        <caption class="yAxisPos" style="caption-side:top"><?=  $key['northLabel']; ?></caption>

                                        <!--Caption for bottom of grid -->
                                        <caption class="yAxisNeg" style="caption-side:bottom"><?= $key['southLabel'];  ?></caption>
                                    
                                        <!--Generate cells with values-->
                                        <?php for ($col=10; $col >= -10; $col--) { ?>

                                        <tr>
                                            <?php for ($row=-10; $row <= 10; $row++) { 

                                                    if (($col != 0) && ($row != 0)) { ?>
                                                    
                                                        <!--Draw cells that do not have values of zero '0'-->
                                                        <td>
                                                            <label class="radio" for='radio <?=$row?>,<?=$col?>'>

                                                                <div class='cell' onclick='highlightLink(this);'>
                                                                    <input class='radio' type='radio' name='editRadio' value='<?=$row?>,<?=$col?>' id='radio <?=$row?>,<?=$col?>'/>
                                                                </div>

                                                            </label>
                                                        </td>

                                                        <?php  } 
                                                    else { ?>
                                                            <!--Shade out cells with values of zero '0'-->
                                                            <td class='shadedRow'></td>
                                                    <?php  } ?>	

                                            <?php  } ?>
                                        </tr>
                                            
                                        <?php  } ?>

                                    </table>
                                </td>

                                <!--Cell containing label for positive X-Axis side-->
                                <td class="xAxisPos">
                                    <div class="xAxisText"><?= $key['eastLabel']; ?></div>
                                    <?php } ?>
                                </td>

                            </tr>
                        </table>
            
                            <p><input type="submit" class="button" name="skip3" value="Skip Question" />
            
                            <input type="submit" class="button" name="sendAnswer3" value="Send Answer" id="sendAnswer3"/></p>
                            
                            </form>
            
                </div>
                
                <!--Function to help user navigate the page easily-->
                <button onclick="topFunction()" id="myBtn" title="Go to top">Go To Top</button>
            </div>
</body>
</html>
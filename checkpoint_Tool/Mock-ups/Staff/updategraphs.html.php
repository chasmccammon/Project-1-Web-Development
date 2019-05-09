<?PHP
if(!isset($_SESSION)) { session_start(); } //refreshes session since a valid SID exit (type in by the user)
include 'accessControl.php';
?>
<!-- /* 
Lead Developers: Albert Warner &  Olufemi Olusina
Description: The Page is allows the admin to update the label / questions of student tool

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

    <title>Update Tool Labels</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
</head>
<body>
    <form class="updatecontroller.php" action = 'updatecontroller.php' method = 'POST'>

    <?php include 'navigation.php' ?>

    <div class="container3">
        <h1 class="title">Update Tool Labels</h1>

        <p class= "alert alert-info text-center"> Tip: Update any of the questions / labels that show on graphs(tools) for the students.</p>
        <br>
            
        <img class="graphImg" src="images/graph.JPG" alt="graph">

        <br><br><br><br>

        <!--=====TOOL 1=====-->
        <fieldset>
            <legend class="text-left">Tool 1: Labels & Category</legend>

               <?php
                foreach($label as $l)
                {?>
                <div class="form-group">

                    <input class="form-control" type="hidden" name="toolID1" value='<?=("$l[toolID]");?>'>

                    <label  class="control-label  col-sm-3 text-right" >Current Category Name X :</label>
                    <div class="col-sm-3">
                        <input id="regularExpression2" class="form-control" type="text" value='<?=("$l[tableNamex]");?>' DISABLED> 
                    </div>

                    <label  class="control-label  col-sm-3 text-right" > New Category Name X :</label>
                    <div class="col-sm-3">
                        <input class="form-control" type="text" name="tableNamex1"  pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter A-Z Characters" value='<?=("$l[tableNamex]");?>' > 
                    </div>
                </div>


                    <br>
                    <br>

                      <div class="form-group">

                            <label  class="control-label  col-sm-3 text-right" >Current Category Name Y :</label>
                            <div class="col-sm-3">
                                <input id="regularExpression2" class="form-control" type="text" value='<?=("$l[tableNamey]");?>' DISABLED> 
                            </div>

                            <label  class="control-label  col-sm-3 text-right" > New Category Name Y :</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="tableNamey1"  pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter A-Z Characters" value='<?=("$l[tableNamey]");?>' > 
                             </div>
                      </div>
                            <br>
                            <br>

                        <div class="form-group">

                            <label   class="control-label  col-sm-3 text-right" >Current North Label :</label>
                            <div class="col-sm-3">
                                <input id="regularExpression2" class="form-control" type="text" value='<?=("$l[northLabel]");?>' DISABLED> 
                            </div>

                            <label   class="control-label  col-sm-3 text-right" > New North Label :</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="northLabel1"  pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter A-Z Characters" value='<?=("$l[northLabel]");?>' > 
                            </div>
                        </div>
                            <br>
                            <br>   
                            
                            <div class="form-group">

                                <label   class="control-label  col-sm-3 text-right" >Current South Label :</label>
                                <div class="col-sm-3">
                                    <input id="regularExpression2" class="form-control" type="text" value='<?=("$l[southLabel]");?>' DISABLED> 
                                </div>

                                <label   class="control-label  col-sm-3 text-right" > New South Label :</label>
                                <div class="col-sm-3">
                                    <input class="form-control" type="text" name="southLabel1"  pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter A-Z Characters" value='<?=("$l[southLabel]");?>' > 
                                </div>
                            </div>
                                <br>
                                <br>    
                                
                        <div class="form-group">

                            <label   class="control-label  col-sm-3 text-right" >Current East Label :</label>
                            <div class="col-sm-3">
                                <input id="regularExpression2" class="form-control" type="text" value='<?=("$l[eastLabel]");?>' DISABLED> 
                            </div>

                            <label   class="control-label  col-sm-3 text-right" > New East Label :</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="eastLabel1"  pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter A-Z Characters" value='<?=("$l[eastLabel]");?>' > 
                            </div>
                        </div>
                            <br>
                            <br>


                         <div class="form-group">

                                <label   class="control-label  col-sm-3 text-right" >Current West Label :</label>
                                <div class="col-sm-3">
                                    <input id="regularExpression2" class="form-control" type="text" value='<?=("$l[westLabel]");?>' DISABLED> 
                                </div>

                                <label   class="control-label  col-sm-3 text-right" > New West Label :</label>
                                <div class="col-sm-3">
                                    <input class="form-control" type="text" name="westLabel1"  pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter A-Z Characters" value='<?=("$l[westLabel]");}?>' > 
                                </div>
                        </div> 

        </fieldset>

        <br><br><br>

        <!--=====TOOL 2=====-->
        <fieldset>
            <legend class="text-left">Tool 2: Labels & Category</legend>
               <?php
                foreach($label2 as $l2)
                {?>
                
                    <div class="form-group">

                        <input class="form-control" type="hidden" name="toolID2" value='<?=("$l2[toolID]");?>'>

                        <label   class="control-label  col-sm-3 text-right" >Current Category Name X :</label>
                         <div class="col-sm-3">
                            <input id="regularExpression2" class="form-control" type="text" value='<?=("$l2[tableNamex]");?>' DISABLED> 
                         </div>

                         <label   class="control-label  col-sm-3 text-right" > New Category Name X :</label>
                         <div class="col-sm-3">
                            <input class="form-control" type="text" name="tableNamex2"  pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter A-Z Characters" value='<?=("$l2[tableNamex]");?>' > 
                         </div>
                    </div>
                    <br>
                    <br>

                      <div class="form-group">

                            <label   class="control-label  col-sm-3 text-right" >Current Category Name Y :</label>
                            <div class="col-sm-3">
                                <input id="regularExpression2" class="form-control" type="text" value='<?=("$l2[tableNamey]");?>' DISABLED> 
                            </div>

                            <label   class="control-label  col-sm-3 text-right" > New Category Name Y :</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="tableNamey2"  pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter A-Z Characters" value='<?=("$l2[tableNamey]");?>' > 
                             </div>
                      </div>
                            <br>
                            <br>

                        <div class="form-group">

                            <label   class="control-label  col-sm-3 text-right" >Current North Label :</label>
                            <div class="col-sm-3">
                                <input id="regularExpression2" class="form-control" type="text" value='<?=("$l2[northLabel]");?>' DISABLED> 
                            </div>

                            <label   class="control-label  col-sm-3 text-right" > New North Label :</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="northLabel2"  pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter A-Z Characters" value='<?=("$l2[northLabel]");?>' > 
                            </div>
                        </div>
                            <br>
                            <br>   
                            
                            <div class="form-group">

                                <label   class="control-label  col-sm-3 text-right" >Current South Label :</label>
                                <div class="col-sm-3">
                                    <input id="regularExpression2" class="form-control" type="text" value='<?=("$l2[southLabel]");?>' DISABLED> 
                                </div>

                                <label   class="control-label  col-sm-3 text-right" > New South Label :</label>
                                <div class="col-sm-3">
                                    <input class="form-control" type="text" name="southLabel2"  pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter A-Z Characters" value='<?=("$l2[southLabel]");?>' > 
                                </div>
                            </div>
                                <br>
                                <br>    
                                
                        <div class="form-group">

                            <label   class="control-label  col-sm-3 text-right" >Current East Label :</label>
                            <div class="col-sm-3">
                                <input id="regularExpression2" class="form-control" type="text" value='<?=("$l2[eastLabel]");?>' DISABLED> 
                            </div>

                            <label   class="control-label  col-sm-3 text-right" > New East Label :</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="eastLabel2"  pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter A-Z Characters" value='<?=("$l2[eastLabel]");?>' > 
                            </div>
                        </div>
                            <br>
                            <br>


                         <div class="form-group">

                                <label   class="control-label  col-sm-3 text-right" >Current West Label :</label>
                                <div class="col-sm-3">
                                    <input id="regularExpression2" class="form-control" type="text" value='<?=("$l2[westLabel]");?>' DISABLED> 
                                </div>

                                <label   class="control-label  col-sm-3 text-right" > New West Label :</label>
                                <div class="col-sm-3">
                                    <input class="form-control" type="text" name="westLabel2"  pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter A-Z Characters" value='<?=("$l2[westLabel]");}?>' > 
                                </div>
                        </div>
        </fieldset>  

        <br><br><br>

        <!--=====TOOL 3=====-->
        <fieldset>
            <legend class="text-left">Tool 3: Labels & Category</legend>
               <?php
                foreach($label3 as $l3)
                {?>
                
                    <div class="form-group">

                        <input class="form-control" type="hidden" name="toolID3" value='<?=("$l3[toolID]");?>'>

                        <label   class="control-label  col-sm-3 text-right" >Current Category Name X :</label>
                         <div class="col-sm-3">
                            <input id="regularExpression2" class="form-control" type="text" value='<?=("$l3[tableNamex]");?>' DISABLED> 
                         </div>

                         <label   class="control-label  col-sm-3 text-right" > New Category Name X :</label>
                         <div class="col-sm-3">
                            <input class="form-control" type="text" name="tableNamex3"  pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter A-Z Characters" value='<?=("$l3[tableNamex]");?>' > 
                         </div>
                    </div>
                    <br>
                    <br>

                      <div class="form-group">

                            <label   class="control-label  col-sm-3 text-right" >Current Category Name Y :</label>
                            <div class="col-sm-3">
                                <input id="regularExpression2" class="form-control" type="text" value='<?=("$l3[tableNamey]");?>' DISABLED> 
                            </div>

                            <label   class="control-label  col-sm-3 text-right" > New Category Name Y :</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="tableNamey3"  pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter A-Z Characters" value='<?=("$l3[tableNamey]");?>' > 
                             </div>
                      </div>
                            <br>
                            <br>

                        <div class="form-group">

                            <label   class="control-label  col-sm-3 text-right" >Current North Label :</label>
                            <div class="col-sm-3">
                                <input id="regularExpression2" class="form-control" type="text" value='<?=("$l3[northLabel]");?>' DISABLED> 
                            </div>

                            <label   class="control-label  col-sm-3 text-right" > New North Label :</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="northLabel3"  pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter A-Z Characters" value='<?=("$l3[northLabel]");?>' > 
                            </div>
                        </div>
                            <br>
                            <br>   
                            
                            <div class="form-group">

                                <label   class="control-label  col-sm-3 text-right" >Current South Label :</label>
                                <div class="col-sm-3">
                                    <input id="regularExpression2" class="form-control" type="text" value='<?=("$l3[southLabel]");?>' DISABLED> 
                                </div>

                                <label   class="control-label  col-sm-3 text-right" > New South Label :</label>
                                <div class="col-sm-3">
                                    <input class="form-control" type="text" name="southLabel3"  pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter A-Z Characters" value='<?=("$l3[southLabel]");?>' > 
                                </div>
                            </div>
                                <br>
                                <br>    
                                
                        <div class="form-group">

                            <label   class="control-label  col-sm-3 text-right" >Current East Label :</label>
                            <div class="col-sm-3">
                                <input id="regularExpression2" class="form-control" type="text" value='<?=("$l3[eastLabel]");?>' DISABLED> 
                            </div>

                            <label   class="control-label  col-sm-3 text-right" > New East Label :</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="eastLabel3"  pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter A-Z Characters" value='<?=("$l3[eastLabel]");?>' > 
                            </div>
                        </div>
                            <br>
                            <br>


                         <div class="form-group">

                                <label   class="control-label  col-sm-3 text-right" >Current West Label :</label>
                                <div class="col-sm-3">
                                    <input id="regularExpression2" class="form-control" type="text" value='<?=("$l3[westLabel]");?>' DISABLED> 
                                </div>

                                <label   class="control-label  col-sm-3 text-right" > New West Label :</label>
                                <div class="col-sm-3">
                                    <input class="form-control" type="text" name="westLabel3"  pattern="(^[-a-z-A-Z0-9,.'\s]+$)" title="Enter A-Z Characters" value='<?=("$l3[westLabel]");}?>' > 
                                </div>
                        </div>  
        </fieldset>

        <br><br><br>

        <input class="button btn btn-info btn-lg" type='submit' name='update' value='Update' />
                    
    </div>

    </form>  
       

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
<!--     
/*
Lead Developers: Albert Warner &  Olufemi Olusina
Description: This page display the labs completed by students neatly in a table

*/ 
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
    <link rel="stylesheet" href="css/style4.css?<?php echo time();?>">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    
    <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script src="js/table-fixed-header.js"></script>

    <title>Completed Labs Table</title>

<script   
   src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js">
    </script>
    <script>

    function scrolify(tblAsJQueryObject, height){
        var oTbl = tblAsJQueryObject;

        // for very large tables you can remove the four lines below
        // and wrap the table with <div> in the mark-up and assign
        // height and overflow property  
        // var oTblDiv = $("<div/>");
        // oTblDiv.css('height', height);
        // oTblDiv.css('overflow','scroll');               
        // oTbl.wrap(oTblDiv);

        // save original width
        oTbl.attr("data-item-original-width", oTbl.width());
        oTbl.find('thead tr td').each(function(){
            $(this).attr("data-item-original-width",$(this).width());
        }); 
        oTbl.find('tbody tr:eq(0) td').each(function(){
            $(this).attr("data-item-original-width",$(this).width());
        });                 


        // clone the original table
        var newTbl = oTbl.clone();

        // remove table header from original table
        oTbl.find('thead tr').remove();                 
        // remove table body from new table
        newTbl.find('tbody tr').remove();   

        oTbl.parent().parent().prepend(newTbl);
        newTbl.wrap("<div/>");

        // replace ORIGINAL COLUMN width                
        newTbl.width(newTbl.attr('data-item-original-width'));
        newTbl.find('thead tr td').each(function(){
            $(this).width($(this).attr("data-item-original-width"));
        });     
        oTbl.width(oTbl.attr('data-item-original-width'));      
        oTbl.find('tbody tr:eq(0) td').each(function(){
            $(this).width($(this).attr("data-item-original-width"));
        });                 
    }

    $(document).ready(function(){
        scrolify($('#tblNeedsScrolling'), 760); // 160 is height
    });
    </script>


</head>
   
<body>
    <?php include 'navigation.php' ?>
    <form class="labscompleted.php" action = 'labscompleted.php' method = 'POST' >
    
    <h1 class="text-center"> Labs Completed By Students</h1>  
        <div class="container3">
                <div id="wrap" style="margin-right: -19px;">
                    <table class="table" id="tblNeedsScrolling">

                        <thead style="margin-right: -17px;">
                            <tr>
                                <th class="text-center" style="border: dotted 0.5px black; width:150px;">Student Name</th>

                                <?php foreach($result as $r){ ?>
                                    <th class="text-center" style="border: dotted 0.5px black;"><?= $r['labname'] ?></th>
                                    <?php } ?>

                                    <th class="text-center" style="border: dotted 0.5px black;">Labs Completed </th>
                                </tr>
                            </thead>

                        <tbody style="margin-right: -17px;">
                            <!--Check if no lab to show-->
                            <?php if ($stmtCount == 0 ) {?>
                                <tr>
                                <td colspan="<?= $headerCount ?>">No Lab Entry yet!</td>
                                </tr>
                            <?php } ?>

                            <?php foreach($stmt as $row){?>
                                    <tr>
                                        <td class="text-center" style="width:150px; border: dotted 0.5px black; margin-right: -17px; word-break:break-all;"><?=$row['userName']?></td>
                                        <?php for($i=1;$i<=$numrows;$i++){ ?>
                                            <td class="text-center" style="border: dotted 0.5px black;"><?= $row["Lab".$i] ?></td>
                                        <?php } ?> 
                                        <td class="text-center" style="border: dotted 0.5px black;"><?=$row['labcount']?></td>
                                    </tr>
                                <?php  }?>
                            </tbody>

                    </table>
                    </div>
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

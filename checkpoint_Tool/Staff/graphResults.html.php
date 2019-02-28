<?PHP
if(!isset($_SESSION)) { session_start(); } //refreshes session since a valid SID exit (type in by the user)
include 'accessControl.php';
?>
<!-- /* 
Lead Developers: Albert Warner &  Olufemi Olusina
Description: Lab scatter graph selection

*/ -->
<!DOCTYPE html>
<html>
  <head>
    <title>Student Scatter Graph</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style4.css?<?php echo time();?>">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="js/top.js"></script>

    <!-- 
         /*****************************************
         // Graph 1
         *****************************************/
     -->
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        /* create the tables names x and y axis */
        <?php foreach($tool1 as $row) {?>   

            // Create the data table.
            var data = new google.visualization.DataTable();

            data.addColumn('number','<?= $row['tableNamex']; ?>');
            data.addColumn('number','<?= $row['tableNamey']; ?>');
            // A column for custom tooltip content
            data.addColumn({type: 'string', role: 'tooltip', 'p': {'html': true}});

            data.addRows([     
                <?php foreach($graph1 as $key) {?> 
                    <?= "[
                        ".$key['xValue'].",
                        ".$key['yValue'].",
                        ' ".$key['labname']." <br/> <strong>X: ".$key['xValue']." , Y: ".$key['yValue']."</strong>',
                        ],"
                    ;?>  
                <?php } ?>
            ]);

        var options = {
          title: '<?= $row['userName']; ?> - All labs <?= $row['tableNamex']; ?> Vs <?= $row['tableNamey']; ?>', //Create the title of graph student name + table vs name
          hAxis: {
                    title: '<?= $key['westLabel']; ?> - <?= $key['eastLabel']; ?>', //height axis label 
                    minValue: -10,
                    maxValue: 10
                },
                vAxis: { //vertical axis labels 
                    title: '<?= $key['southLabel']; ?> - <?= $key['northLabel']; ?>',
                    minValue: -10,
                    maxValue: 10
                }, //set the x and y axis how they view on the screen
          // Use an HTML tooltip.
          tooltip: { isHtml: true},
          legend: 'none'
        };
      <?php }?>
        var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));

        chart.draw(data, options);
      }
    </script>

        <!-- 
        /*****************************************
         // Graph 2
         *****************************************/

         -->

 <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

/* create the tables names x and y axis */
<?php foreach($tool2 as $row) {?>   

    // Create the data table.
    var data = new google.visualization.DataTable();

    data.addColumn('number','<?= $row['tableNamex']; ?>');
    data.addColumn('number','<?= $row['tableNamey']; ?>');
    // A column for custom tooltip content
    data.addColumn({type: 'string', role: 'tooltip', 'p': {'html': true}});

    data.addRows([     
        <?php foreach($graph2 as $key) {?> 
            <?= "[
                ".$key['xValue'].",
                ".$key['yValue'].",
                ' ".$key['labname']." <br/> <strong>X: ".$key['xValue']." , Y: ".$key['yValue']."</strong>',
                ],"
            ;?>  
        <?php } ?>
    ]);

var options = {
  title: '<?= $row['userName']; ?> - All labs <?= $row['tableNamex']; ?> Vs <?= $row['tableNamey']; ?>', //Create the title of graph student name + table vs name
  hAxis: {
            title: '<?= $key['westLabel']; ?> - <?= $key['eastLabel']; ?>', //height axis label 
            minValue: -10,
            maxValue: 10
        },
        vAxis: { //vertical axis labels 
            title: '<?= $key['southLabel']; ?> - <?= $key['northLabel']; ?>',
            minValue: -10,
            maxValue: 10
        }, //set the x and y axis how they view on the screen
  // Use an HTML tooltip.
  tooltip: { isHtml: true},
  legend: 'none'
};
<?php }?>
var chart = new google.visualization.ScatterChart(document.getElementById('chart_div2'));

chart.draw(data, options);
}
</script>


     <!-- 
        /*****************************************
         // Graph 3
         *****************************************/

         -->



     <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

/* create the tables names x and y axis */
<?php foreach($tool3 as $row) {?>   

    // Create the data table.
    var data = new google.visualization.DataTable();

    data.addColumn('number','<?= $row['tableNamex']; ?>');
    data.addColumn('number','<?= $row['tableNamey']; ?>');
    // A column for custom tooltip content
    data.addColumn({type: 'string', role: 'tooltip', 'p': {'html': true}});

    data.addRows([     
        <?php foreach($graph3 as $key) {?> 
            <?= "[
                ".$key['xValue'].",
                ".$key['yValue'].",
                ' ".$key['labname']." <br/> <strong>X: ".$key['xValue']." , Y: ".$key['yValue']."</strong>',
                ],"
            ;?>  
        <?php } ?>
    ]);

var options = {
  title: '<?= $row['userName']; ?> - All labs <?= $row['tableNamex']; ?> Vs <?= $row['tableNamey']; ?>', //Create the title of graph student name + table vs name
  hAxis: {
            title: '<?= $key['westLabel']; ?> - <?= $key['eastLabel']; ?>', //height axis label 
            minValue: -10,
            maxValue: 10
        },
        vAxis: { //vertical axis labels 
            title: '<?= $key['southLabel']; ?> - <?= $key['northLabel']; ?>',
            minValue: -10,
            maxValue: 10
        }, //set the x and y axis how they view on the screen
  // Use an HTML tooltip.
  tooltip: { isHtml: true},
  legend: 'none'
};
<?php }?>
var chart = new google.visualization.ScatterChart(document.getElementById('chart_div3'));

chart.draw(data, options);
}
</script>
    <style>
        .google-visualization-tooltip {
            border: 1px dotted black !important;
            font-family:Verdana;
            font-size: 16px !important;
            padding:10px 10px 10px 10px !important;
            width: 250px;
            }

        .google-visualization-tooltip span {
            color: white !important;
            } 
        </style>   
    
  </body>
  </head>
  <body>
    <form class="index.php" action = 'index.php' method = 'POST' >

        <?php include 'navigation.php' ?>

        <div class="container3">

            <h1 class="title"> Labs Completed by Student</h1>
            <!-- CSS for graph size and styling -->
            <div class="chart_graph" id="chart_div"></div>

            <div class="chart_graph" id="chart_div2"></div>

            <div class="chart_graph" id="chart_div3"></div>
            
            <input class="button btn btn-info btn-lg" type='submit' name='Return' value='Return' />
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
</html>
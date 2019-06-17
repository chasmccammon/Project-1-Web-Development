<!-- /* 
Lead Developers: Albert Warner &  Olufemi Olusina
Description: Lab scatter graph selection

*/ -->
<!DOCTYPE html>
<html>
  <head>
  <title> All Labs Scatter Graph</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style4.css?<?php echo time();?>">
    
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="js/top.js"></script>

    
        <!--    /*****************************************
                // TOOL1 
                *****************************************/
         -->
    
    <script>
        // Load the Visualization API and the corechart package.
        google.charts.load('current', {
            'packages': ['corechart', 'line']
        });

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawScatterGraph);

        // #######################################################################################################
        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawScatterGraph() {

            <?php foreach($toolOptions as $row) {?>
              
                // Create the data table.
                var data = new google.visualization.DataTable();

                data.addColumn('number','<?= $row['tableNamex']; ?>');
                data.addColumn('number','<?= $row['tableNamey']; ?>');
                // A column for custom tooltip content
                data.addColumn({type: 'string', role: 'tooltip', 'p': {'html': true}});
                
                data.addRows([     
                    <?php foreach($Students as $key) {?> 
                        <?= "[
                            ".$key['xValue'].",
                            ".$key['yValue'].",
                            ' ".$key['userName']." <br/> <strong>X: ".$key['xValue']." , Y: ".$key['yValue']."</strong>',
                            ],"
                        ;?>  
                    <?php } ?>
                ]);
            
            // Set chart options
            var options = {
                title: 'Lab <?= $row['labID']; ?> Tool <?= $row['toolID']; ?>: <?= $row['tableNamex']; ?> to <?= $row['tableNamey']; ?> Comparison',
                hAxis: {
                    title: '<?= $row['westLabel']; ?> - <?= $row['eastLabel']; ?>',
                    minValue: -10,
                    maxValue: 10
                },
                vAxis: {
                    title: '<?= $row['southLabel']; ?> - <?= $row['northLabel']; ?>',
                    minValue: -10,
                    maxValue: 10
                },
                 // Use an HTML tooltip.
                tooltip: { isHtml: true},
                legend: 'none'
            };
            <?php } ?>
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.ScatterChart(document.getElementById('scatter_div'));
            chart.draw(data, options);
        }       
    </script>

        <!--            
                /*****************************************
                // TOOL2
                *****************************************/
         -->

<script>
        // Load the Visualization API and the corechart package.
        google.charts.load('current', {
            'packages': ['corechart', 'line']
        });

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawScatterGraph);

        // #######################################################################################################
        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawScatterGraph() {

            <?php foreach($toolOptions2 as $row) {?>
              
                // Create the data table.
                var data = new google.visualization.DataTable();

                data.addColumn('number','<?= $row['tableNamex']; ?>');
                data.addColumn('number','<?= $row['tableNamey']; ?>');
                // A column for custom tooltip content
                data.addColumn({type: 'string', role: 'tooltip', 'p': {'html': true}});
                
                data.addRows([     
                    <?php foreach($Students2 as $key) {?> 
                        <?= "[
                            ".$key['xValue'].",
                            ".$key['yValue'].",
                            ' ".$key['userName']." <br/> <strong>X: ".$key['xValue']." , Y: ".$key['yValue']."</strong>',
                            ],"
                        ;?>  
                    <?php } ?>
                ]);
            
            // Set chart options
            var options = {
                title: 'Lab <?= $row['labID']; ?> Tool <?= $row['toolID']; ?>: <?= $row['tableNamex']; ?> to <?= $row['tableNamey']; ?> Comparison',
                hAxis: {
                    title: '<?= $row['westLabel']; ?> - <?= $row['eastLabel']; ?>',
                    minValue: -10,
                    maxValue: 10
                },
                vAxis: {
                    title: '<?= $row['southLabel']; ?> - <?= $row['northLabel']; ?>',
                    minValue: -10,
                    maxValue: 10
                },
                 // Use an HTML tooltip.
                tooltip: { isHtml: true},
                legend: 'none'
            };
            <?php } ?>
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.ScatterChart(document.getElementById('scatter_div2'));
            chart.draw(data, options);
        }       
    </script>

        <!--            
                /*****************************************
                // TOOL3
                *****************************************/
         -->

<script>
        // Load the Visualization API and the corechart package.
        google.charts.load('current', {
            'packages': ['corechart', 'line']
        });

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawScatterGraph);

        // #######################################################################################################
        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawScatterGraph() {

            <?php foreach($toolOptions3 as $row) {?>
              
                // Create the data table.
                var data = new google.visualization.DataTable();

                data.addColumn('number','<?= $row['tableNamex']; ?>');
                data.addColumn('number','<?= $row['tableNamey']; ?>');
                // A column for custom tooltip content
                data.addColumn({type: 'string', role: 'tooltip', 'p': {'html': true}});
                
                data.addRows([     
                    <?php foreach($Students3 as $key) {?> 
                        <?= "[
                            ".$key['xValue'].",
                            ".$key['yValue'].",
                            ' ".$key['userName']." <br/> <strong>X: ".$key['xValue']." , Y: ".$key['yValue']."</strong>',
                            ],"
                        ;?>  
                    <?php } ?>
                ]);
            
            // Set chart options
            var options = {
                title: 'Lab <?= $row['labID']; ?> Tool <?= $row['toolID']; ?>: <?= $row['tableNamex']; ?> to <?= $row['tableNamey']; ?> Comparison',
                hAxis: {
                    title: '<?= $row['westLabel']; ?> - <?= $row['eastLabel']; ?>',
                    minValue: -10,
                    maxValue: 10
                },
                vAxis: {
                    title: '<?= $row['southLabel']; ?> - <?= $row['northLabel']; ?>',
                    minValue: -10,
                    maxValue: 10
                },
                 // Use an HTML tooltip.
                tooltip: { isHtml: true},
                legend: 'none'
            };
            <?php } ?>
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.ScatterChart(document.getElementById('scatter_div3'));
            chart.draw(data, options);
        }       
    </script>
    <style>




    <style>

    <style>
        .google-visualization-tooltip {
            border: 1px dotted black !important;
            font-family:Verdana;
            font-size: 16px !important;
            padding:10px 10px 10px 10px !important;
            width:auto;
            min-width: 150px;
            }

        .google-visualization-tooltip span {
            color: white !important;
            } 
        </style>
  </head>


  <body>
    <form class="graphAll.php" action = 'graphAll.php' method = 'POST' >

    <?php include 'navigation.php' ?>

            <div class="container3">
                <h1 class="title"> All Labs Completed by Students</h1>

                <div class="scatter_graph" id="scatter_div"></div>

                <div class="scatter_graph" id="scatter_div2"></div>

                <div class="scatter_graph" id="scatter_div3"></div>
                
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

  </body>
</html>
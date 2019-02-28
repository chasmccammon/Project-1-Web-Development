<?PHP
if(!isset($_SESSION)) { session_start(); } //refreshes session since a valid SID exit (type in by the user)
include 'accessControl.php';
?>
<!-- /* 
Lead Developers: Albert Warner &  Olufemi Olusina
Description: Class average response response

*/ -->
<!DOCTYPE html>
 <html lang="en">

<head>
<title> Class Average Response</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style4.css?<?php echo time();?>">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script src="js/top.js"></script>

    <script>
        // Load the Visualization API and the corechart package.
        google.charts.load('current', {
            'packages': ['corechart', 'line']
        });

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawLineGraphInterest);
        google.charts.setOnLoadCallback(drawLineGraphDifficulty);
        google.charts.setOnLoadCallback(drawLineGraphPlan);
        google.charts.setOnLoadCallback(drawLineGraphFamiliarity);
        google.charts.setOnLoadCallback(drawLineGraphSatisfaction);
        google.charts.setOnLoadCallback(drawLineGraphImprovement);

        
        /*###########################################  
        * TOOL 1 - DIFFICULTY
        *############################################*/
        function drawLineGraphDifficulty() {

            // Create the data table.
           var data = new google.visualization.DataTable();

           //Columns for Graph
            data.addColumn('number', 'Lab Number');
            data.addColumn('number', '<?= $tool1y ?>');

            //Do a foreach through data table and get values for Lab ID's and Average of X-axis
            <?php foreach($InterestAVG as $row) {?>
                data.addRows([
                    <?= "[".$row['labID'].",".$row['xValueAverage']."],";?>
                ]);
                <?php } ?>
            
            // Set chart options
                var options = {
                    title: 'Tool 1 - <?= $tool1y ?>',
                     // width: 990,
                    // height:400,
                    hAxis: {
                        title: 'Lab Number',
                        gridlines: {count:<?=$labCount?>}
                    },
                    vAxis: {
                        title: '<?php foreach($tool1Labels as $row) {?>
                                <?= $row['westLabel']; ?> - <?= $row['eastLabel']; ?>',
                        
                        minValue: -10,
                        maxValue: 10
                    },
                    legend: {
                        position: 'right'
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.LineChart(document.getElementById('line_div_Difficulty'));

                //chart.draw(data, google.charts.Line.convertOptions(options));
                chart.draw(data, options);
                }


            /*#############################################  
            * TOOL 1 - INTEREST 
            *##############################################*/
            function drawLineGraphInterest() {

                // Create the data table.
                var data = new google.visualization.DataTable();

                //Columns for Graph
                data.addColumn('number', 'Lab Number');
                data.addColumn('number', '<?= $tool1x ?>');

                //Do a foreach through data table and get values for Lab ID's and Average of Y-axis
                <?php foreach($DifficultyAVG as $key) {?>
                    data.addRows([
                        <?= "[".$key['labID'].",".$key['yValueAverage']."],";?>
                    ]);
                    <?php } ?>

                // Set chart options
                var options = {
                    title: 'Tool 1 - <?= $tool1x ?>',
                    // width: 990,
                    // height:400,
                    hAxis: {
                        title: 'Lab Number',
                        gridlines: {count:<?=$labCount?>}
                    },
                    vAxis: {
                        title: '<?= $row['southLabel']; ?> - <?= $row['northLabel']; ?>
                                <?php } ?>',
                        minValue: -10,
                        maxValue: 10
                    },
                    legend: {
                        position: 'right'
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.LineChart(document.getElementById('line_div_Interesting'));

                //chart.draw(data, google.charts.Line.convertOptions(options));
                chart.draw(data, options);
                }



            /*#############################################  
            * TOOL 2 - FAMILIARITY
            *##############################################*/
            function drawLineGraphFamiliarity() {

                // Create the data table.
                var data = new google.visualization.DataTable();

                //Columns for Graph
                data.addColumn('number', 'Lab Number');
                data.addColumn('number', '<?= $tool2y ?>');

                //Do a foreach through data table and get values for Lab ID's and Average of Y-axis
                <?php foreach($PlanAVG as $key) {?>
                    data.addRows([
                        <?= "[".$key['labID'].",".$key['xValueAverage']."],";?>
                    ]);
                    <?php } ?>

                // Set chart options
                var options = {
                    title: 'Tool 2 - <?= $tool2y ?>',
                    // width: 990,
                    // height:400,
                    hAxis: {
                        title: 'Lab Number',
                        gridlines: {count:<?=$labCount?>}
                    },
                    vAxis: {
                        title: '<?php foreach($tool2Labels as $row) {?>
                                <?= $row['westLabel']; ?> - <?= $row['eastLabel']; ?>',
                        minValue: -10,
                        maxValue: 10
                    },
                    legend: {
                        position: 'right'
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.LineChart(document.getElementById('line_div_Familiarity'));

                //chart.draw(data, google.charts.Line.convertOptions(options));
                chart.draw(data, options);
                }



            /*#############################################  
            * TOOL 2 - PLAN 
            *##############################################*/
            function drawLineGraphPlan() {

                // Create the data table.
                var data = new google.visualization.DataTable();

                //Columns for Graph
                data.addColumn('number', 'Lab Number');
                data.addColumn('number', '<?= $tool2x ?>');

                //Do a foreach through data table and get values for Lab ID's and Average of Y-axis
                <?php foreach($FamiliarityAVG as $key) {?>
                    data.addRows([
                        <?= "[".$key['labID'].",".$key['yValueAverage']."],";?>
                    ]);
                    <?php } ?>

                // Set chart options
                var options = {
                    title: 'Tool 2 - <?= $tool2x ?>',
                     // width: 990,
                    // height:400,
                    hAxis: {
                        title: 'Lab Number',
                        gridlines: {count:<?=$labCount?>}
                    },
                    vAxis: {
                        title: '<?= $row['southLabel']; ?> - <?= $row['northLabel']; ?>
                                <?php } ?>',
                        minValue: -10,
                        maxValue: 10
                    },
                    legend: {
                        position: 'right'
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.LineChart(document.getElementById('line_div_Plan'));

                //chart.draw(data, google.charts.Line.convertOptions(options));
                chart.draw(data, options);
                }



            /*#############################################  
            * TOOL 3 - IMPROVEMENT
            *##############################################*/
            function drawLineGraphImprovement() {

                // Create the data table.
                var data = new google.visualization.DataTable();

                //Columns for Graph
                data.addColumn('number', 'Lab Number');
                data.addColumn('number', '<?= $tool3y ?>');

                //Do a foreach through data table and get values for Lab ID's and Average of Y-axis
                <?php foreach($SatisfactionAVG as $key) {?>
                    data.addRows([
                        <?= "[".$key['labID'].",".$key['xValueAverage']."],";?>
                    ]);
                    <?php } ?>

                // Set chart options
                var options = {
                    title: 'Tool 3 - <?= $tool3y ?>',
                     // width: 990,
                    // height:400,
                    hAxis: {
                        title: 'Lab Number',
                        gridlines: {count:<?=$labCount?>}
                    },
                    vAxis: {
                        title: '<?php foreach($tool3Labels as $row) {?>
                                <?= $row['westLabel']; ?> - <?= $row['eastLabel']; ?>',
                        minValue: -10,
                        maxValue: 10
                    },
                    legend: {
                        position: 'right'
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.LineChart(document.getElementById('line_div_Improvement'));

                //chart.draw(data, google.charts.Line.convertOptions(options));
                chart.draw(data, options);
                }



            /*#############################################  
            * TOOL 3 - SATISFACTION 
            *##############################################*/
            function drawLineGraphSatisfaction() {

                // Create the data table.
                var data = new google.visualization.DataTable();

                //Columns for Graph
                data.addColumn('number', 'Lab Number');
                data.addColumn('number', '<?= $tool3x ?>');

                //Do a foreach through data table and get values for Lab ID's and Average of Y-axis
                <?php foreach($ImprovementAVG as $key) {?>
                    data.addRows([
                        <?= "[".$key['labID'].",".$key['yValueAverage']."],";?>
                    ]);
                    <?php } ?>

                // Set chart options
                var options = {
                    title: 'Tool 3 - <?= $tool3x ?>',
                    // width: 990,
                    // height:400,
                    hAxis: {
                        title: 'Lab Number',
                        gridlines: {count:<?=$labCount?>}
                    },
                    vAxis: {
                        title: '<?= $row['southLabel']; ?> - <?= $row['northLabel']; ?>
                                <?php } ?>',
                        minValue: -10,
                        maxValue: 10
                    },
                    legend: {
                        position: 'right'
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.LineChart(document.getElementById('line_div_Satisfaction'));

                //chart.draw(data, google.charts.Line.convertOptions(options));
                chart.draw(data, options);
                }
    </script>

</head>
<body>


<?php include 'navigation.php' ?>

<div class="container3">

    <h1 class="title"> Class Average Response</h1>
    <br>

        <a class=" btn btn-info btn-sm" href="#<?= $tool1x ?>"><?= $tool1x ?> Graph</a>
        <a class=" btn btn-info btn-sm" href="#<?= $tool1y ?>"><?= $tool1y ?> Graph</a>
        <a class=" btn btn-info btn-sm" href="#<?= $tool2x ?>"><?= $tool2x ?> Graph</a>
        <a class=" btn btn-info btn-sm" href="#<?= $tool2y ?>"><?= $tool2y ?> Graph</a>
        <a class=" btn btn-info btn-sm" href="#<?= $tool3x ?>"><?= $tool3x ?> Graph</a>
        <a class=" btn btn-info btn-sm" href="#<?= $tool3y ?>"><?= $tool3y ?> Graph</a>

        <br><br>
        <div class="container">
            <div id="<?= $tool1x ?>">
            <!-- Interesting Graph -->
            <div class="line_div1" id="line_div_Interesting"></div>
            </div>
            <br>

            <!-- Difficulty Graph -->
            <div id="<?= $tool1y ?>">
                <div class="line_div1" id="line_div_Difficulty"></div>
            </div>
            <br>

            <!-- Plan Graph -->
            <div id="<?= $tool2x ?>">
            <div class="line_div1" id="line_div_Plan"></div>
            </div>
            <br>

            <!-- Familiarity Graph -->
            <div id="<?= $tool2y ?>">
            <div class="line_div1" id="line_div_Familiarity"></div>
            </div>
            <br>

            <!-- Satisfaction Graph -->
            <div id="<?= $tool3x ?>">
            <div class="line_div1" id="line_div_Satisfaction"></div>
            </div>
            <br>

            <!-- Improvement Graph -->
            <div id="<?= $tool3y ?>">
            <div class="line_div1" id="line_div_Improvement"></div>
            </div>
            <button onclick="topFunction()" id="myBtn" title="Go to top">Go To Top</button>  
        </div>
    </div>

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
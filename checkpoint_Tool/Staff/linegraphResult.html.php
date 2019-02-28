<!-- /*
Lead Developers: Albert Warner &  Olufemi Olusina
Description: This page is Diplays the line page , using google graphs

*/ -->
<!DOCTYPE html>
<html>

<head>
    <title>Student Line Graph</title>

      <!-- Bootstrap CSS CDN -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="css/style4.css?<?php echo time();?>">
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

        <!--Load the AJAX API-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="js/top.js"></script>

        <!-- 
                /*****************************************
                // Graph 1
                *****************************************/
         -->
        <script>
            // Load the Visualization API and the corechart package.
            google.charts.load('current', {
                'packages': ['corechart','line']
            });

            // Set a callback to run when the Google Visualization API is loaded.

            google.charts.setOnLoadCallback(drawLineGraph);

            // #######################################################################################################
            // Callback that creates and populates a data table,
            // instantiates the pie chart, passes in the data and
            // draws it.
            function drawLineGraph() {
                <?php foreach($tool1 as $row) {?>
                // Create the data table.
                var data = new google.visualization.DataTable();
                data.addColumn('number', 'Lab Number');
                data.addColumn('number', '<?= $row['tableNamex']; ?>');
                
               
                data.addRows([

                    <?php foreach($result as $key) {?>
                    /* All the students x and y values */
                <?= "[".$key['labID'].",".$key['yValue']."],"; }?>
                ]);

                // Set chart options
                
                var options = {
                    title: '<?= $row['userName']; ?> - All labs <?= $row['tableNamex']; ?>',
                    width: 'auto',
                    height: 'auto',
                    hAxis: {title: 'Lab Number'},
                vAxis: {title: '<?= $row['tableNamex']; ?> ',
                    minValue: -10,
                    maxValue: 10 }, 
                    legend: {position:'right'} 
                };
                <?php }?>
                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.LineChart(document.getElementById('line_div'));
                //chart.draw(data, google.charts.Line.convertOptions(options));
                chart.draw(data, options);
            }
        </script>

         <!-- 
                /*****************************************
                // Graph 2
                *****************************************/
         -->

        <script>
            // Load the Visualization API and the corechart package.
            google.charts.load('current', {
                'packages': ['corechart','line']
            });

            // Set a callback to run when the Google Visualization API is loaded.

            google.charts.setOnLoadCallback(drawLineGraph);

            // #######################################################################################################
            // Callback that creates and populates a data table,
            // instantiates the pie chart, passes in the data and
            // draws it.
            function drawLineGraph() {
                <?php foreach($tool2 as $row) {?>
                // Create the data table.
                var data = new google.visualization.DataTable();
                data.addColumn('number', 'Lab Number');
                data.addColumn('number', '<?= $row['tableNamex']; ?>');
                
               
                data.addRows([

                    <?php foreach($result2 as $key) {?>
                    /* All the students x and y values */
                <?= "[".$key['labID'].",".$key['yValue']."],"; }?>
                ]);

                // Set chart options
                
                var options = {
                    title: '<?= $row['userName']; ?> - All labs <?= $row['tableNamex']; ?>',
                    width: 'auto',
                    height: 'auto',
                    hAxis: {title: 'Lab Number'},
                vAxis: {title: '<?= $row['tableNamex']; ?> ',
                    minValue: -10,
                    maxValue: 10 }, 
                    legend: {position:'right'} 
                };
                <?php }?>
                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.LineChart(document.getElementById('line_div2'));
                //chart.draw(data, google.charts.Line.convertOptions(options));
                chart.draw(data, options);
            }
        </script>

        <!-- 
                /*****************************************
                // Graph 3
                *****************************************/
         -->

        <script>
            // Load the Visualization API and the corechart package.
            google.charts.load('current', {
                'packages': ['corechart','line']
            });

            // Set a callback to run when the Google Visualization API is loaded.

            google.charts.setOnLoadCallback(drawLineGraph);

            // #######################################################################################################
            // Callback that creates and populates a data table,
            // instantiates the pie chart, passes in the data and
            // draws it.
            function drawLineGraph() {
                <?php foreach($tool3 as $row) {?>
                // Create the data table.
                var data = new google.visualization.DataTable();
                data.addColumn('number', 'Lab Number');
                data.addColumn('number', '<?= $row['tableNamex']; ?>');
                
               
                data.addRows([

                    <?php foreach($result3 as $key) {?>
                    /* All the students x and y values */
                <?= "[".$key['labID'].",".$key['yValue']."],"; }?>
                ]);

                // Set chart options
                
                var options = {
                    title: '<?= $row['userName']; ?> - All labs <?= $row['tableNamex']; ?>',
                    width: 'auto',
                    height: 'auto',
                    hAxis: {title: 'Lab Number'},
                vAxis: {title: '<?= $row['tableNamex']; ?> ',
                    minValue: -10,
                    maxValue: 10 }, 
                    legend: {position:'right'} 
                };
                <?php }?>
                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.LineChart(document.getElementById('line_div3'));
                //chart.draw(data, google.charts.Line.convertOptions(options));
                chart.draw(data, options);
            }
        </script>



         <!-- 
                /*****************************************
                // Graph 4
                *****************************************/
         -->

        <script>
            // Load the Visualization API and the corechart package.
            google.charts.load('current', {
                'packages': ['corechart','line']
            });

            // Set a callback to run when the Google Visualization API is loaded.

            google.charts.setOnLoadCallback(drawLineGraph);

            // #######################################################################################################
            // Callback that creates and populates a data table,
            // instantiates the pie chart, passes in the data and
            // draws it.
            function drawLineGraph() {
                <?php foreach($tool4 as $row) {?>
                // Create the data table.
                var data = new google.visualization.DataTable();
                data.addColumn('number', 'Lab Number');
                data.addColumn('number', '<?= $row['tableNamey']; ?>');
                
               
                data.addRows([

                    <?php foreach($result4 as $key) {?>
                    /* All the students x and y values */
                <?= "[".$key['labID'].",".$key['xValue']."],"; }?>
                ]);

                // Set chart options
                
                var options = {
                    title: '<?= $row['userName']; ?> - All labs <?= $row['tableNamey']; ?>',
                    width: 'auto',
                    height: 'auto',
                    hAxis: {title: 'Lab Number'},
                vAxis: {title: '<?= $row['tableNamey']; ?> '},  
                    legend: {position:'right'} 
                };
                <?php }?>
                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.LineChart(document.getElementById('line_div4'));
                //chart.draw(data, google.charts.Line.convertOptions(options));
                chart.draw(data, options);
            }
        </script>


 <!-- 
                /*****************************************
                // Graph 5
                *****************************************/
         -->

       <script>
            // Load the Visualization API and the corechart package.
            google.charts.load('current', {
                'packages': ['corechart','line']
            });

            // Set a callback to run when the Google Visualization API is loaded.

            google.charts.setOnLoadCallback(drawLineGraph);

            // #######################################################################################################
            // Callback that creates and populates a data table,
            // instantiates the pie chart, passes in the data and
            // draws it.
            function drawLineGraph() {
                <?php foreach($tool5 as $row) {?>
                // Create the data table.
                var data = new google.visualization.DataTable();
                data.addColumn('number', 'Lab Number');
                data.addColumn('number', '<?= $row['tableNamey']; ?>');
                
               
                data.addRows([

                    <?php foreach($result5 as $key) {?>
                    /* All the students x and y values */
                <?= "[".$key['labID'].",".$key['xValue']."],"; }?>
                ]);

                // Set chart options
                
                var options = {
                    title: '<?= $row['userName']; ?> - All labs <?= $row['tableNamey']; ?>',
                    width: 'auto',
                    height: 'auto',
                    hAxis: {title: 'Lab Number'},
                vAxis: {title: '<?= $row['tableNamey']; ?> '},  
                    legend: {position:'right'} 
                };
                <?php }?>
                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.LineChart(document.getElementById('line_div5'));
                //chart.draw(data, google.charts.Line.convertOptions(options));
                chart.draw(data, options);
            }
        </script>



         <!-- 
                /*****************************************
                // Graph 6
                *****************************************/
         -->

       <script>
            // Load the Visualization API and the corechart package.
            google.charts.load('current', {
                'packages': ['corechart','line']
            });

            // Set a callback to run when the Google Visualization API is loaded.

            google.charts.setOnLoadCallback(drawLineGraph);

            // #######################################################################################################
            // Callback that creates and populates a data table,
            // instantiates the pie chart, passes in the data and
            // draws it.
            function drawLineGraph() {
                <?php foreach($tool6 as $row) {?>
                // Create the data table.
                var data = new google.visualization.DataTable();
                data.addColumn('number', 'Lab Number');
                data.addColumn('number', '<?= $row['tableNamey']; ?>');
                
               
                data.addRows([

                    <?php foreach($result6 as $key) {?>
                    /* All the students x and y values */
                <?= "[".$key['labID'].",".$key['xValue']."],"; }?>
                ]);

                // Set chart options
                
                var options = {
                    title: '<?= $row['userName']; ?> - All labs <?= $row['tableNamey']; ?>',
                    width: 'auto',
                    height: 'auto',
                    hAxis: {title: 'Lab Number'},
                vAxis: {title: '<?= $row['tableNamey']; ?> '},  
                    legend: {position:'right'} 
                };
                <?php }?>
                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.LineChart(document.getElementById('line_div6'));
                //chart.draw(data, google.charts.Line.convertOptions(options));
                chart.draw(data, options);
            }
        </script>

</head>

<body>

    <form class="linegraph.php" action = 'linegraph.php' method = 'POST' >

        <?php include 'navigation.php' ?>

        <div class="container3">
            <h1 class="title"> Labs Completed by Student</h1>

            <br>
            <?php foreach($tool1 as $row) {?>
                <a class=" btn btn-info btn-sm" href="#<?= $row['tableNamex']; ?>"><?= $row['tableNamex']; ?> Graph</a> 
            <?php }?>

            <?php foreach($tool2 as $row) {?>
                <a class=" btn btn-info btn-sm" href="#<?= $row['tableNamex']; ?>"><?= $row['tableNamex']; ?> Graph</a> 
            <?php }?>

            <?php foreach($tool3 as $row) {?>
                <a class=" btn btn-info btn-sm" href="#<?= $row['tableNamex']; ?>"><?= $row['tableNamex']; ?> Graph</a> 
            <?php }?>

            <?php foreach($tool4 as $row) {?>
                <a class=" btn btn-info btn-sm" href="#<?= $row['tableNamey']; ?>"><?= $row['tableNamey']; ?> Graph</a> 
            <?php }?>

            <?php foreach($tool5 as $row) {?>
                <a class=" btn btn-info btn-sm" href="#<?= $row['tableNamey']; ?>"><?= $row['tableNamey']; ?> Graph</a> 
            <?php }?>

            <?php foreach($tool6 as $row) {?>
                <a class=" btn btn-info btn-sm" href="#<?= $row['tableNamey']; ?>"><?= $row['tableNamey']; ?> Graph</a> 
            <?php }?>

            <br><br>

            <!--Divs that will hold the scatter graph-->
            <div class="container">

                <?php foreach($tool1 as $row) {?>
                    <div id="<?= $row['tableNamex']; ?>">
                        <div class="line_div" id="line_div"></div>
                    </div>
                <?php }?>
                <br>
                <?php foreach($tool2 as $row) {?>
                    <div id="<?= $row['tableNamex']; ?>">
                        <div class="line_div" id="line_div2"></div>
                    </div>
                <?php }?>
                <br>
                <?php foreach($tool3 as $row) {?>
                    <div id="<?= $row['tableNamex']; ?>">
                        <div class="line_div" id="line_div3"></div>
                    </div>
                <?php }?>
                <br>
                <?php foreach($tool4 as $row) {?>
                    <div id="<?= $row['tableNamey']; ?>">
                        <div class="line_div" id="line_div4"></div>
                    </div>
                <?php }?>
                <br>
                <?php foreach($tool5 as $row) {?>
                    <div id="<?= $row['tableNamey']; ?>">
                        <div class="line_div" id="line_div5"></div>
                    </div>
                <?php }?>
                <br>
                <?php foreach($tool6 as $row) {?>
                    <div id="<?= $row['tableNamey']; ?>">
                        <div class="line_div" id="line_div6"></div>
                    </div>
                <?php }?>
                <br>
            
            </div>
            <br>

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
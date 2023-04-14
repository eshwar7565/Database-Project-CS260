
<?php
// Database configuration
include 'config.php';



// Fetch data from the table
$query = "SELECT year, count(distinct(compname)) as no_of_companies FROM yearwisecomp group by year";
$result = mysqli_query($conn,$query);

// Create an array to hold the data
$data = array();
$data[] = array('Year', 'No. of Companies');

// Loop through the result set and add each row to the data array
while ($row = $result->fetch_assoc()) {
    $data[] = array($row['year'], (int) $row['no_of_companies']);
}

// Close the database connection
$conn->close();

// Encode the data array as a JSON string
$jsonData = json_encode($data);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Line Chart Example</title>
    <!-- Load the Google Charts library -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        // Load the Visualization API and the corechart package
        google.charts.load('current', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Create a new DataTable object
            var data = new google.visualization.arrayToDataTable(<?php echo $jsonData; ?>);

            // Set chart options
            var options = {
                title: 'No. of Companies by Year',
                curveType: 'function',
                legend: { position: 'bottom' }
            };

            // Instantiate and draw the chart, passing in the data and options
            var chart = new google.visualization.LineChart(document.getElementById('chart'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>
    <div id="chart" style="width: 100%; height: 500px;"></div>
</body>
</html>

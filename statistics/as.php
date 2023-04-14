<?php
// Connect to the database
include "databaseconfig.php";

// Get the user input for the company and number of years
if(isset($_POST['submit'])) {
    $company = $_POST['company'];
    $num_of_years = $_POST['num_of_years'];
    
    // Get the current year
    $current_year = date('Y');
    
    // Calculate the start year
    $start_year = $current_year - $num_of_years;
    
    // Prepare the SQL query
    $stmt = $pdo->prepare("SELECT passyear, COUNT(*) as num_of_selections FROM alumnir WHERE compname = :compname AND passyear BETWEEN :start_year AND :current_year GROUP BY passyear");
    $stmt->execute(array(':compname' => $company, ':start_year' => $start_year, ':current_year' => $current_year));
    
    // Fetch the results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Convert the results into JSON format
    $chart_data = array();
    foreach ($results as $row) {
        $chart_data[] = array(
            'year' => $row['passyear'],
            'count' => $row['num_of_selections']
        );
    }
    $chart_data_json = json_encode($chart_data);

    // Create the chart using Chart.js
    echo "
    <canvas id='myChart'></canvas>
    <script src='https://cdn.jsdelivr.net/npm/chart.js'></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: " . $chart_data_json . ".map(x => x.year),
                datasets: [{
                    label: 'Number of Alumni Selected',
                    data: " . $chart_data_json . ".map(x => x.count),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            autoSkip: false,
                            maxRotation: 90,
                            minRotation: 90
                        }
                    }]
                }
            }
        });
    </script>
    ";

    // Display the results
    echo "<h2>Number of alumni selected in $company in the last $num_of_years years</h2>";
    echo "<ul>";
    foreach($results as $row) {
        echo "<li>".$row['passyear']." - ".$row['num_of_selections']."</li>";
    }
    echo "</ul>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Alumni Selections</title>
</head>
<body>
    <h1>Alumni Selections</h1>
    
    <form method="post">
        <label for="company">Company:</label>
        <input type="text" id="company" name="company"><br><br>
        
        <label for="num_of_years">Number of years:</label>
        <input type="number" id="num_of_years" name="num_of_years" min="1"><br><br>
        
        <input type="submit" name="submit" value="Submit">
    </form>
    
</body>
</html>

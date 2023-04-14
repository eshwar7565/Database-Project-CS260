
<!DOCTYPE html>
<html>
<head>
	<title>Placement Stats </title>
	<style>
		body {
			margin: 0;
			padding: 0;
		}

		#navbar {
			height: 100%;
			width: 200px;
			position: fixed;
			z-index: 1;
			top: 0;
			left: 0;
			background-color: #f5f5f5;
			overflow-x: hidden;
			padding-top: 20px;
		}

		#navbar a {
			display: block;
			padding: 10px;
			text-decoration: none;
			color: #000;
			font-size: 16px;
			font-weight: bold;
			transition: 0.3s;
		}

		#navbar a:hover {
			background-color: #555;
			color: #fff;
		}

		#main {
			margin-left: 200px;
			padding: 20px;
			font-size: 28px;
			text-align: center;
		}
	</style>
</head>
<body>
	<div id="navbar">
    <a href="../index.php">Home </a>
		<a href="ywca1.php">Year Wise Companies Appeared</a>
		<a href="tec.php">Top Expensive Companies</a>
		<a href="view.php">Branch wise Placements</a>
        <a href="as.php">Alumni Selections</a>
	</div>

<head>
    <style>
        h1 {
            font-family: 'Architects Daughter', cursive;
            font-size: 42px;
            text-align: left;
            margin-left: 575px;
        }
    </style>
    <link href="https://fonts.googleapis.com/css?family=Architects+Daughter&display=swap" rel="stylesheet">
</head>
<style>
table {
  border-collapse: collapse;
  margin-left: 25%;
  width: 60%;
}
th, td {
  text-align: center;
  padding: 10px;
  width: 10%;
}
th {
  background-color: #008080;
  color: white;
  font-size: 18px;
  text-transform: uppercase;
  border-top: 3px solid blue;
  border-bottom: 3px solid blue;
}
tr:nth-child(even) {
  background-color: #f2f2f2;
}
td {
  border: 1px solid #ddd;
}
tr:hover {
  background-color: #ddd;
}
</style>
</body>
</html>
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
    <div style='display: flex; justify-content: center; margin-top:40px;margin-left:400px; width:30%'>
    <canvas id='myChart'  margin-left:1000 ></canvas>
</div>

    
    
    <script src='https://cdn.jsdelivr.net/npm/chart.js'></script>
    <div style='text-align:center; margin-left:300px;width: 50%; height: 50%;'>
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
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize:10
                            
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize:0.1,
                            maxRotation: 45,
                            autoSkip: false
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
    <h1
    style="margin-left: 250px;"> Alumni Selections</h1>
    
    <form method="post">
        <label for="company" style=" margin-left:250px" >Company:</label>
        <input type="text" id="company" name="company" style=" margin-left:53px"><br><br>
        
        <label for="num_of_years" style=" margin-left:250px">Number of years:</label>
        <input type="number" id="num_of_years" name="num_of_years" min="1" style=" margin-left:10px"><br><br>
        
        <input type="submit" name="submit" style=" margin-left:300px" value="Submit">
    </form>
   <style>
    #myChart {
  width: 30%;
  height: 200px;
 
}
</style>

</body>
</html>

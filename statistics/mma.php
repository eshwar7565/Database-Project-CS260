
<!DOCTYPE html>
<html>
<head>
	<title>Min Max Average Salary</title>
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
			margin-left: 30px;
			padding: 20px;
			font-size: 28px;
			text-align: center;
		}    
        </style> 

	</style>
</head>
<body>
	<div id="navbar">
    <a href="../index.php">Home </a>
		<a href="ywca1.php">Year Wise Companies Appeared</a>
		<a href="tec.php">Top Expensive Companies</a>
		<a href="view.php">Branch wise Placements</a>
        <a href="as.php">Alumni Selections</a>
		<a href="mma.php">Average Minimum Maximum Packages</a>
		<a href="mmapb.php">Particular Branch Min Max Avg Salary</a>
	</div>

	<div id="main">
		<p>Min Max Average Salary</p>
	</div>
    <br><br>
</div>
</body>
</html>
<?php
include 'config.php';
// Query the database to retrieve the min, max, and average salary of every year


    // Query the database to retrieve the min, max, and average salary of every year for all branches
    $sql = "SELECT passyear, MIN(salary) AS min_salary, MAX(salary) AS max_salary, AVG(salary) AS avg_salary 
    FROM alumnir 
    where isplacedbyiit='YES' GROUP BY passyear";
$result = $conn->query($sql);

// Create an array to hold the chart data
$data = array(
    'labels' => array(),
    'datasets' => array(
        array(
            'label' => 'Minimum Salary',
            'data' => array(),
            'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
            'borderColor' => 'rgba(255, 99, 132, 1)',
            'borderWidth' => 1
        ),
        array(
            'label' => 'Maximum Salary',
            'data' => array(),
            'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
            'borderColor' => 'rgba(54, 162, 235, 1)',
            'borderWidth' => 1
        ),
        array(
            'label' => 'Average Salary',
            'data' => array(),
            'backgroundColor' => 'rgba(255, 206, 86, 0.2)',
            'borderColor' => 'rgba(255, 206, 86, 1)',
            'borderWidth' => 1
        )
    )
);

// Loop through the query results and add the data to the chart array
while ($row = $result->fetch_assoc()) {
    $data['labels'][] = $row['passyear'];
    $data['datasets'][0]['data'][] = $row['min_salary'];
    $data['datasets'][1]['data'][] = $row['max_salary'];
    $data['datasets'][2]['data'][] = $row['avg_salary'];
}

// Convert the chart data to JSON
$json_data = json_encode($data);

// Create the chart using Chart.js
echo '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';
echo '<div style="text-align:center; margin-left:300px ;width: 70%; height: 70%;">';
echo "<canvas id='myChart'></canvas>";
echo "<script src='https://cdn.jsdelivr.net/npm/chart.js'></script>";
echo "<script>";
echo "var ctx = document.getElementById('myChart').getContext('2d');";
echo "var myChart = new Chart(ctx, {";
echo "    type: 'bar',";
echo "    data: $json_data,";
echo "    options: {";
    echo 'maintainAspectRatio: false,';
echo "        scales: {";
echo "            yAxes: [{";
echo "                ticks: {";
echo "                    beginAtZero: true";
echo "                }";
echo "            }]";
echo "        }";
echo "    }";
echo "});";
echo "</script>";
?>




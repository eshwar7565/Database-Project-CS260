
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
			margin-left: 30px;
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
		<a href="mma.php">Average Minimum Maximum Packages</a>
	</div>

	<div id="main">
		<p> Placement Statistics!</p>
	</div>
</body>
</html>

<?php
// Database configuration
include 'config.php';



// Fetch data from the table
$query = "SELECT year, count(distinct(compname)) as no_of_companies FROM yearwisecomp group by year order by year asc";
$result = mysqli_query($conn,$query);



$labels = array();
$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    array_push($labels, $row['year']);
    array_push($data, $row['no_of_companies']);
}


echo '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';
echo '<div style="text-align:center; margin-left:300px ;width: 70%; height: 70%;">';
echo '<canvas id="myChart" ></canvas>';

echo '<script>';
echo 'var ctx = document.getElementById("myChart").getContext("2d");';
echo 'var myChart = new Chart(ctx, {';
echo 'type: "bar",';
echo 'data: {';
echo 'labels: ' . json_encode($labels) . ',';
echo 'datasets: [{';
echo 'label: "Number of companies",';
echo 'data: ' . json_encode($data) . ',';
echo 'backgroundColor: "rgba(54, 162, 235, 0.5)",';
echo 'borderColor: "rgba(54, 162, 235, 1)",';
echo 'borderWidth: 0.6';
echo '}]';
echo '},';
echo 'options: {';
    echo 'maintainAspectRatio: false,';
echo 'scales: {';
echo 'yAxes: [{';
echo 'ticks: {';
echo 'beginAtZero: true';
echo '}';
echo '}]';
echo '}';
echo '}';
echo '});';
echo '</script>';
?>
</html>
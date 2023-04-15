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
		<a href="mma.php">Average Minimum Maximum Packages</a>
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
include 'config.php';
//Find various fields for an  and save them in variables for display purposes 

// Select all rows from table
$query = "select * from branchwiseyear";
$result = mysqli_query($conn, $query);

echo '<div>';
echo '<h1>Placement Stats</h1>';
// Generate HTML table to display data
echo '<table>';
echo '<tr><th>YEAR</th><th>AI</th><th>CBE</th><th>CE</th><th>CSE</th><th>EE</th><th>EP</th><th>MC</th><th>ME</th><th>MME</th></tr>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . ($row['Year'] ?? 0) . '</td>';
    echo '<td>' . ($row['AI'] ?? 0) . '</td>';
    echo '<td>' . ($row['CBE'] ?? 0) . '</td>';
    echo '<td>' . ($row['CE'] ?? 0) . '</td>';
    echo '<td>' . ($row['CSE'] ?? 0) . '</td>';
    echo '<td>' . ($row['EE'] ?? 0) . '</td>';
    echo '<td>' . ($row['EP'] ?? 0) . '</td>';
    echo '<td>' . ($row['MC'] ?? 0) . '</td>';
    echo '<td>' . ($row['ME'] ?? 0) . '</td>';
    echo '<td>' . ($row['MME'] ?? 0) . '</td>';
    echo '</tr>';
}
echo '</table>';

?>
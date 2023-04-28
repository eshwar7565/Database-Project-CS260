<!DOCTYPE html>
<html>
<head>
	<title>Navigation Bar</title>
	<style>
		body {
			margin: 0;
			padding: 0;
			background-color: #f5f5f5;
			font-family: Arial, sans-serif;
		}
		nav {
			background-color: #333;
			overflow: hidden;
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			z-index: 1;
			border-bottom: 2px solid #4CAF50;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
		}
		nav a {
			float: left;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-size: 18px;
			font-weight: bold;
			transition: background-color 0.3s;
		}
		nav a:hover {
			background-color: #4CAF50;
			color: white;
		}
		nav a.active {
			background-color: #4CAF50;
			color: white;
		}
		.container {
			margin-top: 80px;
			text-align: center;
		}
		h1 {
			margin-top: 0;
			font-size: 36px;
			font-weight: bold;
			color: #333;
			text-shadow: 1px 1px #ccc;
		}
		p {
			font-size: 24px;
			color: #666;
			line-height: 1.5;
			margin-bottom: 30px;
		}
	</style>
</head>
<body>
	<nav>
		<a href="verifystud.php">Verify Students</a>
		<a href="verifyalum.php">Verify Alumni</a>
		<a href="verifycomp.php">Verify Companies</a>
        <a href="logout.php">Logout </a>
	</nav>
	<head>
	<style type="text/css">
		.container {
			display: flex;
			flex-wrap: wrap;
		}
		.table-container {
			width: 70%;
			margin: 0 auto;
		}
		table {
			border-collapse: collapse;
			width: 60%;
		}
		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		th {
			background-color: #4CAF50;
			color: white;
		}
		tr:nth-child(even) {background-color: #f2f2f2;}
		.add-delete {
			display: flex;
			align-items: center;
			margin-top: 20px;
			margin-left: 30px;
		}
		.add-btn, .delete-btn {
			background-color: #4CAF50;
			color: white;
			padding: 8px 16px;
			margin-right: 0px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}
		.delete-btn {
			background-color: #f44336;
		}
		.add-btn:hover, .delete-btn:hover {
			background-color: #3e8e41;
		}
		.add-btn:active, .delete-btn:active {
			background-color: #3e8e41;
			box-shadow: 0 5px #666;
			transform: translateY(4px);
		}
        h1 {
            margin-top: 40px;
        }
	</style>
</head>
<?php
require 'config.php';

//Find various fields for an  and save them in variables for display purposes 

// Select all rows from table
$query = "SELECT * from sd where isverified!='YES' ";
$result = mysqli_query($conn, $query);


// Generate HTML table to display data
echo "<br>";
echo "<table>";
echo "<h1>Pending Student Verifications</h1>" ;
echo "<tr><th>RollNo</th><th>Name</th><th>Webmail</th><th>Action1</th><th>Action2</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>" . $row['rollno'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['webmail'] . "</td>";
  echo "<td><a href='studaccept.php?id=" . $row["rollno"] . "'>Accept</a></td>";
  echo "<td><a href='studreject.php?id=" . $row["rollno"] . "'>Reject</a></td>";
  echo "</tr>";
}
echo "</table>";
?>

</body>
</html>
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
include "databaseconfig.php";
// Establish connection to the database

// Check if form is submitted
if(isset($_POST['submit'])) {

    // Sanitize user input
    $num_of_companies = filter_var($_POST['num_of_companies'], FILTER_SANITIZE_NUMBER_INT);

    // Prepare SQL statement
    $stmt = $pdo->prepare("SELECT compname, salary FROM companydetails ORDER BY salary DESC LIMIT :num_of_companies");

    // Bind parameters
    $stmt->bindParam(':num_of_companies', $num_of_companies, PDO::PARAM_INT);

    // Execute SQL statement
    $stmt->execute();

    // Fetch all rows as an associative array
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<h2 style='margin-left: 250px;'>Top $num_of_companies Expensive Companies</h2>";
    echo "<ul style='margin-left: 250px;'>";
foreach($results as $key => $row) {
    echo "<li style='margin-bottom: 5px;'>";
    $rank = $key + 1;
    $salary = "₹" . $row['salary'] . " LPA CTC";
    echo "<span class='rank' style='font-weight: bold;'>$rank.</span> <span class='company-name'>".$row['compname']."</span> <span class='salary'>".$salary."</span></li>";
}
echo "</ul>";
}
?>

<!-- HTML form to get input from user -->
<!DOCTYPE html>
<html>
<h2 style=" margin-left :250px;" >Top companies</h2>

</html>
<form method="post">
   
    <label for="num_of_companies" style="  margin-left:250px">Enter number of companies:</label>
    <input type="number" id="num_of_companies" name="num_of_companies"  style=" margin-left:10px">
    <br><br>
    <input type="submit" style="  margin-left:300px" name="submit" value="Submit">
</form>



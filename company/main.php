
<?php
//Connect to MySQL server 
require 'config.php';
session_start();


//If there is no session user, then redirect to login page 
if (!isset($_SESSION['sess_user'])) {
	header("location: login.php");
}

//Find various fields for an  and save them in variables for display purposes 
$empid = $_SESSION['sess_user'];
$result = mysqli_query($conn, "SELECT * FROM companyregister WHERE compname='$empid'");
$row = mysqli_fetch_array($result);

$name1 = $row["compname"];
$reyear = $row["year"];
$email = $row["email"];

$mincpi=$row["mincpi"];
$minqual=$row['minqualification'];
$salary=$row["salary"];
$mode=$row["mode"];
$type=$row["type"];
$cyear=$row["curryear"];
$role=$row["role"];


?>

</div>
<!DOCTYPE html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"/>

 <title>Student Details</title>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="main.php">Home</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="ase.php">Recruit</a>
      </li>
    
	 
      
      
    </ul>
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item">
        <a class="nav-link" onclick=logout()>Logout</a>
      </li>
    </ul>
  </div>
</nav>

<script>
function logout() {
  if (window.confirm("Are you sure you want to log out?")) {
    // Send request to server to invalidate session and log out user
    // ...
    alert("You have been logged out."); // Display a message to the user
    window.location.href = "logout.php"; // Redirect the user to the login page
  }
}
</script>


</html>

<!DOCTYPE html>
<html>
<head>
	<title>Company Dashboard</title>
    <br>
	<style>
      
	
	</style>
</head>
<body>
<h1> <?php echo "Welcome " . $name1 ; ?> </h1>
<style>
		





table th, table td {
  border: 1px solid #ddd;
  padding: 8px;
}
div {
  
 
  left: 30%;
}
.centered-button {
  display: block;
  margin-left: 50px ;
}
</style>
<div> 
<br>
<h2>Eligibility</h2>
</div>

   

<table>
		<tr>
			<td>Company Name </td>
			<td><?php echo $name1 ;echo "\t" ; ?></td>
            <br>
          
        </tr>
        <tr>
            <td>Recruiting Since  </td>
			<td><?php echo $reyear; ?></td>
		</tr>
        <tr>
			<td>Email  </td>
			<td><?php echo $email; ?></td>
		</tr>
        <tr>
            <td>Min CPI  </td>
			<td><?php echo $mincpi; ?></td>
		</tr>
        <tr>
            <td>Min Qualification  </td>
			<td><?php echo $minqual; ?></td>
		</tr>
        <tr>
            <td>Salary (LPA)  </td>
			<td><?php echo $salary; ?></td>
		</tr>
        <tr>
            <td>Mode  </td>
			<td><?php echo $mode; ?></td>
		</tr>
        <tr>
            <td>Type  </td>
			<td><?php echo $type; ?></td>
		</tr>
		<tr>
            <td>Role  </td>
			<td><?php echo $role; ?></td>
		</tr>
        <tr>
            <td>Current Year  </td>
			<td><?php echo $cyear; ?></td>
		</tr>
		
		
		
		
		
	</table>

    <br>

    <form method="get" action="update.php">
		
        <button class="centered-button">Update</button>

	</form>


</html>
	
</body>
<style>
 body {
    margin: 0 20px; /* set left and right margin to 20px */
  }
 </style>
</html>
<?php
echo "<hr style='border: 1px dashed black;'>";
?>
<?php
echo "<br><br>";
echo "<table>";
echo "<h4>List of Years Appearing in IITP</h4>" ;
?>
<!DOCTYPE html>
<html>
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
	</style>
</head>
<body>

<div style="float: left;">
<div class="container">
	<div class="table-container">
		<table>
			<thead>
				<tr>
					<th>Year</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php

				// Check if the connection was successful
				if (!$conn) {
				    die('Connection failed: ' . mysqli_connect_error());
				}

				// Fetch the data from the table
				$sql = "SELECT year FROM yearwisecomp where compname='$empid'";
				$result = mysqli_query($conn, $sql);

				// Display the data as a HTML table
				while ($row = mysqli_fetch_assoc($result)) {
				    echo '<tr>';
				    echo '<td>' . $row['year'] . '</td>';
				    echo '<td><a href="deleteyear.php?year=' . $row['year'] . '">Delete</a></td>';
				    echo '</tr>';
				}

				// Close the database connection
				mysqli_close($conn);
        echo "<br><br>";
				?>
			</tbody>
		</table>
	</div>
	<form method="POST" action="addyear.php">
  <label for="year">Year:</label>
  <input type="text" id="year" name="year">
  <input type="hidden" name="compname" value="<?php echo $empid; ?>">
  <button type="submit">Add</button>
</form>

<?php
echo "<hr style='border: 1px dashed black;'>";
?>
</div>
</div>

</body>
</html>










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
      <li class="nav-item">
        <a class="nav-link" href="filter.php">For Filter Applied Candidates</a>
      </li>
    
	 
      
      
    </ul>
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item">
        <a class="nav-link" onclick=logout()>Logout</a>
      </li>
    </ul>
  </div>
</nav>
<style type="text/css">
		.container {
			display: flex;
			flex-wrap: wrap;
            margin: 20px;
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

<?php
require 'config.php';
session_start();
$empid = $_SESSION['sess_user'];

//Find various fields for an  and save them in variables for display purposes 

// Select all rows from table
$query = "SELECT * from sd,companyregister,apply 
where '$empid'=companyregister.compname and '$empid'=apply.compname and apply.rollno=sd.rollno and companyregister.mincpi<=sd.cpi";
$result = mysqli_query($conn, $query);
 $mycount = mysqli_num_rows($result);


// Generate HTML table to display data
echo "<br><br>";
echo "<table>";
echo "<h5>List of applied candidates who are eligible</h5>" ;
echo "<br><br>";

echo "No of candidates = ";
echo $mycount;
echo "<br><br>";
echo "<tr><th>ID</th><th>CPI</th><th>Webmail</th><th>Action1</th><th>Action2</th><th>Resume</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>" . $row['rollno'] . "</td>";
  echo "<td>" . $row['cpi'] . "</td>";
  echo "<td>" . $row['webmail'] . "</td>";
  echo "<td><a href='accept.php?id=" . $row["rollno"] . "'>Accept</a></td>";
  echo "<td><a href='reject.php?id=" . $row["rollno"] . "'>Reject</a></td>";
  echo "<td><a href='blobdemo.php?id=" . $row["rollno"] . "'>View</a></td>";
  echo "</tr>";
}
echo "</table>";

echo "<hr style='border: 1px dashed black;'>";



// Select all rows from table
$query2 = "SELECT * from sd,companyregister,apply 
where '$empid'=companyregister.compname and '$empid'=apply.compname and apply.rollno=sd.rollno and companyregister.mincpi>sd.cpi";
$result2 = mysqli_query($conn, $query2);
 $mycount2 = mysqli_num_rows($result2);
 

// Generate HTML table to display data
echo "<br><br>";
echo "<table>";
echo "<h5>List of applied candidates who are not eligible</h5>" ;
echo "<br><br>";

echo "No of candidates = ";
echo $mycount2;
echo "<br><br>";
echo "<tr><th>ID</th><th>CPI</th><th>Webmail</th><th>Action1</th><th>Action2</th><th>Resume</th></tr>";
while ($row = mysqli_fetch_assoc($result2)) {
  echo "<tr>";
  echo "<td>" . $row['rollno'] . "</td>";
  echo "<td>" . $row['cpi'] . "</td>";
  echo "<td>" . $row['webmail'] . "</td>";
  echo "<td><a href='accept.php?id=" . $row["rollno"] . "'>Accept</a></td>";
  echo "<td><a href='reject.php?id=" . $row["rollno"] . "'>Reject</a></td>";
  echo "<td><a href='blobdemo.php?id=" . $row["rollno"] . "'>View</a></td>";
  echo "</tr>";
}
echo "</table>";


// Query database
$query = mysqli_query($conn, "SELECT rollno, webmail , cpi FROM sd where compname='$empid'");
$mycount = mysqli_num_rows($query);
// Fetch data

// Close database connection
echo "<hr style='border: 1px dashed black;'>";
echo "<br><br>";
echo "<table>";
echo "<h4>List of Recruited candidates</h4>" ;
echo "<br><br>";

echo "<h7>No of recruited candidates = $mycount </h7> ";

echo "<tr><th>RollNo</th><th>CPI</th><th>Webmail</th></tr>";
while ($row = mysqli_fetch_assoc($query)) {
  echo "<tr>";
  echo "<td>" . $row['rollno'] . "</td>";
  echo "<td>" . $row['cpi'] . "</td>";
  echo "<td>" . $row['webmail'] . "</td>";
  echo "</tr>";
}
echo "</table>";


?>
<style>
    
    </style>


</html>
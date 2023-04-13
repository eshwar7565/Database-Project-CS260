
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

$result2 = mysqli_query($conn, "SELECT * FROM companydetails WHERE compname='$empid'");
$row2 = mysqli_fetch_array($result2);

$name1 = $row["compname"];
$reyear = $row["year"];
$email = $row["email"];

$mincpi=$row2["mincpi"];
$minqual=$row2['minqualification'];
$salary=$row2["salary"];
$mode=$row2["mode"];
$type=$row2["type"];
$cyear=$row2["curryear"];

?>
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

//Find various fields for an  and save them in variables for display purposes 

// Select all rows from table
$query = "SELECT * from sd,companydetails,apply 
where '$empid'=companydetails.compname and '$empid'=apply.compname and apply.rollno=sd.rollno and companydetails.mincpi<=sd.cpi";
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
echo "<tr><th>ID</th><th>Name</th><th>Webmail</th><th>Action1</th><th>Action2</th><th>Resume</th></tr>";
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


// Select all rows from table
$query2 = "SELECT * from sd,companydetails,apply 
where '$empid'=companydetails.compname and '$empid'=apply.compname and apply.rollno=sd.rollno and companydetails.mincpi>sd.cpi";
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
echo "<tr><th>ID</th><th>Name</th><th>Webmail</th><th>Action1</th><th>Action2</th><th>Resume</th></tr>";
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
$query = mysqli_query($conn, "SELECT rollno, webmail , cpi FROM recruitment natural join sd where compname='$empid'");
$mycount = mysqli_num_rows($query);
// Fetch data

// Close database connection
echo "<br><br>";
echo "<table>";
echo "<h4>List of Recruited candidates</h4>" ;
echo "<br><br>";

echo "No of candidates = ";
echo $mycount;
echo "<br><br>";
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




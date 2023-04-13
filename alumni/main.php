
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
$result = mysqli_query($conn, "SELECT * FROM alumnir WHERE rollno='$empid'");
$row = mysqli_fetch_array($result);



$name1 = $row["name"];
$passyear = $row["passyear"];
$email = $row["alemail"];
$rollno=$row['rollno'];


?>

<?php
require 'config.php';
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
        <a class="nav-link"  onclick=logout()>Logout</a>
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
	<title>Alumni Dashboard</title>
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
  <br><br>
<h3>Basic Info</h3>
</div>
<table>
		<tr>
			<td>Roll No </td>
			<td><?php echo $rollno ;echo "\t" ; ?></td>
            <br>
        </tr>
        <tr>
            <td>Passed Out Year </td>
			<td><?php echo $passyear; ?></td>
		</tr>		
	</table>

    <br>
    <h2>Career Info</h2>
    <br>
    <?php
 

 $query = "SELECT * from alumnic where rollno = '$empid'";
 $result=mysqli_query($conn,$query);
 
 echo "<table>";
   
echo "<tr><th>Company Name </th><th>Salary </th><th>Joined Year</th><th> Left Year</th><th> Area of Work</th><th> Position</th> <th> Location</th> <th> Update</th>  </tr>";
while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>" . $row['compname'] . "</td>";
  echo "<td>" . $row['salary'] . "</td>";
  echo "<td>" . $row['joinyear'] . "</td>";
  echo "<td>" . $row['leftyear'] . "</td>";
  echo "<td>" . $row['areaofwork'] . "</td>";

  echo "<td>" . $row['position'] . "</td>";
  echo "<td>" . $row['location'] . "</td>";
  echo "<td><a href='editc.php?id=" . $row["rollno"] . "'>Edit</a></td>";
  echo "</tr>";
}
echo "</table>";
echo "<br><br>";
?>


    <form method="get" action="updatej.php">
		
        <button class="centered-button">Add Job Info</button>
        
        
<br><br>

        <h2>Education Info</h2>
       
  <?php
  
 $query = "SELECT * from alumnie where rollno = '$empid'";
 $result=mysqli_query($conn,$query);
 
 echo "<table>";
   
echo "<tr><th>College Name </th><th>Degree </th><th>Joined Year</th><th> Left Year</th><th> Area of Study</th> <th> Location</th><th>Update</th>  </tr>";
while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>" . $row['collegename'] . "</td>";
  echo "<td>" . $row['degree'] . "</td>";
  echo "<td>" . $row['joinyear'] . "</td>";
  echo "<td>" . $row['leftyear'] . "</td>";
  echo "<td>" . $row['areaofstudy'] . "</td>";

  
  echo "<td>" . $row['location'] . "</td>";
  echo "<td><a href='edite.php?id=" . $row["rollno"] . "'>Edit</a></td>";
  echo "</tr>";
}
echo "</table>";
echo "<br><br>";
?>
	</form>
 
    
    <form method="get" action="updatep.php">
		
        <button class="centered-button">Add Education Info</button>

	</form><br>
  <h2> Info</h2>
    <br>
    <form method="get" action="updateiitp.php">
		
        <button class="centered-button"> Info</button>

	</form>
  



</html>
	
</body>
</html>

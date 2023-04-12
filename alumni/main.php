
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
<h2>Basic Info</h2>
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
    <?php
 

 $query = "SELECT * from alumnic where rollno = '$empid'";
 $result=mysqli_query($conn,$query);
 
 echo "<table>";
   
echo "<tr><th>Company Name </th><th>Salary </th><th>Joined Year</th><th> Left Year</th><th> Area of Work</th><th> Position</th> <th> Location</th>  </tr>";
while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>" . $row['compname'] . "</td>";
  echo "<td>" . $row['salary'] . "</td>";
  echo "<td>" . $row['joinyear'] . "</td>";
  echo "<td>" . $row['leftyear'] . "</td>";
  echo "<td>" . $row['areaofwork'] . "</td>";

  echo "<td>" . $row['position'] . "</td>";
  echo "<td>" . $row['location'] . "</td>";
  echo "</tr>";
}
echo "</table>";
echo "<br><br>";
?>


    <form method="get" action="updatej.php">
		
        <button class="centered-button">Add Job Info</button>

	</form>
  <h2>Personal Info</h2>
    <br>
    <form method="get" action="update.php">
		
        <button class="centered-button">Update Personal Info</button>

	</form>




</html>
	
</body>
</html>

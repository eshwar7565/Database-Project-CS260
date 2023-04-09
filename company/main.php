
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
<html>
<head>
	<title>Company Dashboard</title>
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
</html>

<?php
include 'config.php';

require 'config.php';
session_start();


//If there is no session user, then redirect to login page 
if (!isset($_SESSION['sess_user'])) {
	header("location: login.php");
}
 
$empid = $_SESSION['sess_user'];


if (isset($_POST['submit'])) {
	//Save all values given in respective variables 
	
	$compname = $_POST['compname'];
    $salary = $_POST['salary'];
    $startdate=$_POST['startyear'];
    $enddate=$_POST['endyear'];
    $aow=$_POST['aow'];
    $position=$_POST['position']; 
    $location=$_POST['location'];



	

			//Insert new employee entry into database 
			$query = "INSERT INTO `alumnic`(`rollno`, `compname`, `salary`, `joinyear`, `leftyear`, `areaofwork`, `position`, `location`)
             VALUES ('$empid','$compname','$salary','$startdate','$enddate','$aow','$position','$location')";

			$result = mysqli_query($conn, $query);
			//If insertion is successful, then redirect to login page else throw error 
			if ($result) {
				echo "<script>alert(Info Updated!')</script>";
				header("Location: main.php");
			} else {
				echo "<script>alert('Something went wrong!')</script>";
			}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
	
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
	<!--<link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->

<body>
	<div class="container">
		<div class="row col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1>Job Information </h1>
				</div>
				<div class="panel-body">
					<form action="" method="post">
						<div class="row">
							<div class="col-md-6 mb-4">
								
							</div>
							<div class="col-md-6 mb-4">
								

							</div>
                            <p><pre>Fill all the works done so far by adding job info multiple times</p>
						</div>
						<div class="form-group">
							<label for="compname" class="form-label">Company Name</label>
							<input type="text" class="form-control" id="compname" name="compname" placeholder="Company Name" required />
						</div>
						<div class="form-group">
							<label for="salary" class="form-label"> Salary</label>
							<input type="text" class="form-control" id="salary" name="salary" placeholder="Salary" required />
						</div>
                        <p>&ensp; Please enter in this format &ensp; 'YYYY-MM-DD'</p>
						<div class="form-group">
							<label for="joinyear" class="form-label">Start Date </label>
							<input type="text" class="form-control" id="startyear" name="startyear" placeholder="Start date YYYY-MM-DD" required />
						</div>
                        <p>&ensp; Please enter in this format &ensp; 'YYYY-MM-DD'</p>
						<div class="form-group">
							<label for="enddate" class="form-label">End Date</label>
							<input type="text" class="form-control" id="endyear" name="endyear" placeholder="End Date YYYY-MM-DD" required />
						</div>
						<div class="form-group">
							<label for="Areaofwork" class="form-label">Field</label>
							<input type="text" class="form-control" id="aow" name="aow" placeholder="IT,Business,.." required />
						</div>
						<div class="form-group">
							<label for="position" class="form-label">Position</label>
							<input type="text" class="form-control" id="position" name="position" placeholder="Position" required />
						</div>
						<div class="form-group">
							<label for="Location" class="form-label">Location</label>
							<input type="text" class="form-control" id="location" name="location" placeholder="Location " required />
						</div>
						
							
						
						<div class="row">
							<div style="align-items: center;padding-left: 3%;">
								<button type="submit" name="submit"  class="btn btn-default">Add</button>
								
								      <br><br><a href="main.php">Go Back</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>


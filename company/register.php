<?php
include 'config.php';

if (isset($_POST['submit'])) {
	//Save all values given in respective variables 
	
	$name1 = $_POST['name1'];
	$year=$_POST['year'];
	
	
	$email = $_POST['email'];
	
	$pwd1 = $_POST['pwd1'];
	$pwd2 = $_POST['pwd2'];

	//If password does not match confirm password then throw error 
	if ($pwd1 != $pwd2) {
		echo "<script>alert('Passwords do not match.')</script>";
	} else {
		//Check if user with the same employee id already exists
		$query = "SELECT * FROM companyregister where email='$email' ";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) > 0) {
			echo "<script>alert('User already registered. Please login.')</script>";
		} else {
			//Insert new employee entry into database 
			$query = "INSERT INTO companyregister ( compname,year, email,pass) 
				VALUES ('$name1','$year','$email','$pwd1')";
				//$query2="INSERT INTO companydetails (minqualification,mincpi,compname,salary,mode,type,curryear) values (null,null,'$name1',null,null,null,null)";
				
			$result = mysqli_query($conn, $query);
			//If insertion is successful, then redirect to login page else throw error 
			if ($result) {
				echo "<script>alert('User registerd!')</script>";
				header("Location: login.php");
			} else {
				echo "<script>alert('Something went wrong!')</script>";
			}
		}
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
<a href="../index.php" class="home-button">Home<i class="fas fa-home"></i></a>
<style>
.home-button {
  display: inline-block;
  background-color: blue;
  color: white;
  padding: 10px 20px;
  border-radius: 5px;
  text-decoration: none;
  margin-top: 10px;
  margin-right: 20px;
  margin-bottom: 30px;
  margin-left: 40px;
}

.home-button:hover {
  background-color: lightgray;
}
</style>
	<div class="container">
		<div class="row col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1>Registration Form</h1>
				</div>
				<div class="panel-body">
					<form action="" method="post">
						<div class="row">
							<div class="col-md-6 mb-4">
								
							</div>
							<div class="col-md-6 mb-4">
								

							</div>
						</div>
						<div class="row">
							<div class="col-md-5 mb-4">
								<div class="form-group">
							
							<label for="name1" class="form-label">User Name</label>
							<input type="text" class="form-control" id="name1" name="name1" placeholder="User Name" required />
							</div>
							</div>
						</div>
						
						
						
							
						<div class="row">
							<div class="col-md-8 mb-4">
								<div class="form-group">
									<label class="form-label" for="email">Email ID</label>
									<input type="email" class="form-control" name="email" id="email" placeholder="Email" required />
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label class="form-label" for="year">Year</label>
									<input type="year" class="form-control" name="year" id="year" placeholder="Year" required />
								</div>
							</div>
							
						</div>
						<div class="form-group">
							
							<label for="pwd1" class="form-label">Password</label>
							<input type="password" class="form-control" name="pwd1" id="pwd1" placeholder="Password" required />
						</div>
						<div class="form-group">
							<label for="pwd2" class="form-label">Confirm Password</label>
							<input type="password" class="form-control" name="pwd2" id="pwd2" placeholder="Confirm Password" required />
						</div>
						<div class="row">
							<div style="align-items: center;padding-left: 3%;">
								<button type="submit" name="submit"  class="btn btn-default">Register</button>
								
								      <br><br>Already a user? <a href="login.php">Login</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>


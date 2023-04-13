<?php
include 'config.php';

if (isset($_POST['submit'])) {
	//Save all values given in respective variables 
	
	$roll = $_POST['rollno'];
	$name = $_POST['name'];
	$year = $_POST['year'];
	$cpi = $_POST['cpi'];
	$degree = $_POST['degree'];
	$branch = $_POST['branch'];
	$linkedin = $_POST['linkedin'];
	
	
	
	$email = $_POST['email'];
	
	$pwd1 = $_POST['pwd1'];
	$pwd2 = $_POST['pwd2'];

	//If password does not match confirm password then throw error 
	if ($pwd1 != $pwd2) {
		echo "<script>alert('Passwords do not match.')</script>";
	} else {
		//Check if user with the same employee id already exists
		$query = "SELECT * FROM alumnir where rollno='$roll' ";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) > 0) {
			echo "<script>alert('User already registered. Please login.')</script>";
		} else {
			//Insert new employee entry into database 
			$query = "INSERT INTO `alumnir`(`rollno`, `name`, `passyear`, `alcpi`, `degree`, `branch`, `alemail`, `allinkedin`, `pass`)
			 VALUES ('$roll','$name','$year','$cpi','$degree','$branch','$email','$linkedin','$pwd1')";

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
						<div class="form-group">
							<label for="name1" class="form-label">Roll No</label>
							<input type="text" class="form-control" id="rollno" name="rollno" placeholder="Roll No" required />
						</div>
						<div class="form-group">
							<label for="name" class="form-label"> Name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Name" required />
						</div>
						<div class="form-group">
							<label for="year" class="form-label">Passed Out Year </label>
							<input type="text" class="form-control" id="year" name="year" placeholder="Passed Out Year" required />
						</div>
						<div class="form-group">
							<label for="cpi" class="form-label">CPI</label>
							<input type="text" class="form-control" id="cpi" name="cpi" placeholder="CPI" required />
						</div>
						<div class="form-group">
							<label for="degree" class="form-label">Degree</label>
							<input type="text" class="form-control" id="degree" name="degree" placeholder="Degree" required />
						</div>
						<div class="form-group">
							<label for="branch" class="form-label">Branch</label>
							<br>
							<select name="branch">
							<option value="">Select Branch </option>
  <option value="CSE">Computer Science and Engineering</option>
  <option value="EE">Electrical Engineering</option>
  <option value="ME">Mechanical Engineering</option>
  <option value="CE">Civil Engineering</option>
  <option value="MM">Materials and Metallurgical Engineering</option>
  <option value="AI">Artificial Intelligence and DataScience</option>
  <option value="PH">Engineering Physics  </option>
  <option value="MC">Mathematics and Computing   </option>
  <option value="CB">Chemical and Biochemical Engineering     </option>


							< required />
							 </select>
						</div>
						<div class="form-group">
							<label for="linkedin" class="form-label">LinkedIn</label>
							<input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Linkedin URL" required />
						</div>
					
					
							
						<div class="row">
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label class="form-label" for="email">Email ID</label>
									<input type="email" class="form-control" name="email" id="email" placeholder="Email" required />
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


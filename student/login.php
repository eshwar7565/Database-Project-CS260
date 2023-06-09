<?php
require 'config.php';
if (isset($_POST['submit'])) {
	$empid = $_POST['emp'];
	$pwd = $_POST['pass'];
	
	// select query to check if profile exists 
	$query = "SELECT * FROM sd WHERE rollno='$empid' and pass='$pwd' and isverified ='YES'";
	$result = mysqli_query($conn, $query);
	
	//If there exists a row with the given credentials, then redirect to respective profile page otherwise stay on same page by alert 
	if (mysqli_num_rows($result) != 0) {
		session_start();
		$_SESSION['sess_user'] = $empid;
		header("Location: main.php");
	} else {
		echo "<script>alert('Invalid email or password or user not yet verified .')</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign in</title>
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
					<h1 style="text-align: center;">Sign In</h1>
				</div>
				<div class="panel-body">
					<form action="" method="post">
						<div class="form-group">
							<label class="form-label" for="eid">Roll No</label>
							<input type="text" class="form-control" name="emp" id="eid" placeholder="Roll No"  required />
						</div>
						<div class="form-group">
							<label for="pwd" class="form-label">Password</label>
							<input type="password" class="form-control" id="pwd" name="pass" placeholder="Password" required />
						</div>
						<div class="row">
							<div style="align-items: center;padding-left: 3%;">
								<input type="submit" value="Login" name="submit" /><br><br>
								No credentials yet? <a href="register.php">Register</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
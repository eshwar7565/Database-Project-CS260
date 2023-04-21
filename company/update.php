<?php
//Connect to MySQL 
require 'config.php';
session_start();

//If there is no session user, then redirect to login page 
if (!isset($_SESSION['sess_user'])) {
	header("location: login.php");
}
$empid = $_SESSION['sess_user'];
if (isset($_POST['submit'])) {

	//Store entered values in variables 
	
	
	$type = $_POST['type'];
	$mode=$_POST['mode'];
	$mincpi=$_POST['mincpi'];
	$minqual=$_POST['minqual'];
    $salary=$_POST['salary'];
    $curryear=$_POST['year'];
	$role=$_POST['role'];

	//Check credentials with password and proceed 
    if($mincpi!=NULL){
        $query="update  companyregister set mincpi=$mincpi where compname='$empid'";
        $result=mysqli_query($conn,$query);
    }
    if($minqual!=NULL){
        $query="update  companyregister set minqualification='$minqual' where compname='$empid'";
        $result=mysqli_query($conn,$query);
    }
    if($salary!=NULL){
        $query="update  companyregister set salary=$salary where compname='$empid'";
        $result=mysqli_query($conn,$query);
    }
    if($curryear!=NULL){
        $query="update  companyregister set curryear=$curryear where compname='$empid'";
        $result=mysqli_query($conn,$query);
    }
    if($type!=NULL){
        $query="update  companyregister set type='$type' where compname='$empid'";
        $result=mysqli_query($conn,$query);
    }
    if($mode!=NULL){
        $query="update  companyregister set mode='$mode' where compname='$empid'";
        $result=mysqli_query($conn,$query);
    }
	if($role!=NULL){
        $query="update  companyregister set role='$role' where compname='$empid'";
        $result=mysqli_query($conn,$query);
    }

  
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update</title>
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
					<h1>Update Eligibility</h1>
				</div>
				<div class="panel-body">
					<form action="" method="post">					
						<br />
						<div class="row mb-3">
							<label class="col-sm-3 col-form-label" for="mincpi">Min CPI</label>
							<div class="col-sm-2">
								<input type="text" class="form-control"  id="mincpi" name="mincpi" />
							</div>
						</div>
						<br />
                        <div class="row mb-3">
							<label class="col-sm-3 col-form-label" for="minqual"> Qualification</label>
							<div class="col-sm-6">
								<input type="text" class="form-control"  id="minqual" name="minqual" />
							</div>
						</div>
						<br />
                        <div class="row mb-3">
							<label class="col-sm-3 col-form-label" for="salary"> Salary</label>
							<div class="col-sm-6">
								<input type="text" class="form-control"  id="salary" name="salary" />
							</div>
						</div>
						<br />
                        <div class="row mb-3">
							<label class="col-sm-3 col-form-label" for="mode"> Mode</label>
							<div class="col-sm-6">
								<input type="text" class="form-control"  id="mode" name="mode" />
							</div>
						</div>
						<br />
                        <div class="row mb-3">
							<label class="col-sm-3 col-form-label" for="type"> Type</label>
							<div class="col-sm-6">
								<input type="text" class="form-control"  id="type" name="type" />
							</div>
						</div>
						<br />
                        <div class="row mb-3">
							<label class="col-sm-3 col-form-label" for="year">Current Year</label>
							<div class="col-sm-4">
								<input type="text" class="form-control"  id="year" name="year" />
							</div>
						</div><br/>
						<div class="row mb-3">
							<label class="col-sm-3 col-form-label" for="role">Role</label>
							<div class="col-sm-4">
								<input type="text" class="form-control"  id="role" name="role" />
							</div>
						</div>
						<br />
						<button type="submit" name="submit" class="btn btn-default">Submit</button>
						<a href="main.php"><br><br>Back to Main page</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
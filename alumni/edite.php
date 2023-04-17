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
        <a class="nav-link" href="about.php">About</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="eligcomp.php">Apply For Job</a>
      </li>
      
      
    </ul>
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item">
        <a class="nav-link" href="login.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>


    </html>
    <?php
require 'config.php';
include 'config.php';
session_start();
$empid=$_SESSION['sess_user'];
?>
<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "project");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the values from the form
  
  $collegename = $_POST['collegename'];
  $joinyear = $_POST['joinyear'];
  $leftyear = $_POST['leftyear'];
  $degree = $_POST['degree'];
  $location = $_POST['location'];

  $aos = $_POST['aos'];

  $value = $leftyear;// assuming $row is an array containing the database row
    if (($value=="0000-00-00")) {
     $value=" ";
    } 
 

  // Update the values in the sd table
  $query = "UPDATE alumnie SET collegename='$collegename',degree='$degree', joinyear='$joinyear', leftyear='$value', location='$location', areaofstudy='$aos'  WHERE rollno='$empid'";
  $result = mysqli_query($conn, $query);

  if ($result) {
    echo '<div class="success-message"><p>Records updated successfully.</p>';

  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
}

// Fetch the data for the rollno passed in the URL parameter
$id = $_GET['id'];
$query = "SELECT * FROM alumnie WHERE rollno='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Close the database connection
mysqli_close($conn);
?>
<!-- HTML code for update form -->
<form method="POST">
<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">College Name:</label>
    <div class="col-sm-10">
      <input type="text" id="collegename" name="collegename" class="form-control" value="<?php echo $row['collegename']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="degree" class="col-sm-2 col-form-label">Degree:</label>
    <div class="col-sm-10">
      <input type="text" id="degree" name="degree" class="form-control" value="<?php echo $row['degree']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="joinyear" class="col-sm-2 col-form-label">Join Year:</label>
    <div class="col-sm-10">
      <input type="text" id="joinyear" name="joinyear" class="form-control" value="<?php echo $row['joinyear']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="leftyear" class="col-sm-2 col-form-label">Left Year:</label>
    <div class="col-sm-10">
      <input type="text" id="leftyear" name="leftyear" class="form-control" value="<?php $leftyear=$row['leftyear'];
       $value = $leftyear;// assuming $row is an array containing the database row
    if (($value=="0000-00-00")) {
     $value=" ";
    } 
    echo $value; ?>">
    </div>
  </div>
 
  <div class="form-group row">
    <label for="aos" class="col-sm-2 col-form-label">Area Of Study:</label>
    <div class="col-sm-10">
      <input type="text" id="aos" name="aos" class="form-control" value="<?php echo $row['areaofstudy']; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="location" class="col-sm-2 col-form-label">Location:</label>
    <div class="col-sm-10">
      <input type="text" id="location" name="location" class="form-control" value="<?php echo $row['location']; ?>">
    </div>
  </div>
 
 
  <div class="form-submit">
  <input type="submit" id="button" name="submit" value="Update">
</div>
<!-- Bootstrap 4 CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <!-- Custom styles -->
<style>
    /* Center form on page */
    form {
     
      margin: auto;
      max-width: 600px;
      margin-top: 2rem;
      border-radius: 10px;
      padding: 2rem;
      background-color: #f5f5f5;
    }
    /* Add space between form elements */
    .form-group {
      margin-bottom: 1rem;
    }
    .form-submit {
      text-align: center;
    }
    .success-message {
      
      top: 60%;
      left: 50%;
      
      padding: 1rem;
      background-color: #d4edda;
      border: 1px solid #c3e6cb;
      border-radius: 5px;
      z-index: 999;
    }
    div
    {
      margin-left: 10px;
    }

  </style>
</head>




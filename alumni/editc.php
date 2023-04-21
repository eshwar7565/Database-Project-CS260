<!DOCTYPE html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"/>

 <title>Alumni Details</title>
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

  $compname = $_POST['compname'];
 
  $salary = $_POST['salary'];
    $startdate=$_POST['joinyear'];
    $enddate=$_POST['leftyear'];
    $aow=$_POST['aow'];
    $position=$_POST['position']; 
    $location=$_POST['location'];
    $value = $enddate;// assuming $row is an array containing the database row
    if (($value=="0000-00-00")) {
     $value=" ";
    } 

  // Update the values in the sd table
  $query = "UPDATE alumnic SET compname='$compname',salary='$salary', joinyear='$startdate', leftyear='$enddate', areaofwork='$aow',  position='$position', location='$location' WHERE rollno='$empid'";
  $result = mysqli_query($conn, $query);

  if ($result) {
    echo '<div class="success-message"><p>Records updated successfully.</p>';

  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
}

// Fetch the data for the rollno passed in the URL parameter
$id = $_GET['id'];
$query = "SELECT * FROM alumnic WHERE rollno='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Close the database connection
mysqli_close($conn);
?>
<!-- HTML code for update form -->
<form method="POST">
<div class="form-group row">
    <label for="compname" class="col-sm-2 col-form-label">Company Name:</label>
    <div class="col-sm-10">
      <input type="text" id="compname" name="compname" class="form-control" value="<?php echo $row['compname']; ?>">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="salary" class="col-sm-2 col-form-label">Salary :</label>
    <div class="col-sm-10">
      <input type="text" id="salary" name="salary" class="form-control" value="<?php echo $row['salary']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="startdate" class="col-sm-2 col-form-label">Start Date:</label>
    <div class="col-sm-10">
      <input type="text" id="c12" name="joinyear" class="form-control" value="<?php echo $row['joinyear']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="enddate" class="col-sm-2 col-form-label">Left Year:</label>
    <div class="col-sm-10">
      <input type="text" id="enddate" name="leftyear" class="form-control" value="<?php $enddate=$row['leftyear'];
       $value = $enddate;// assuming $row is an array containing the database row
    if (($value=="0000-00-00")) {
     $value=" ";
    } 
    echo $value; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="aow" class="col-sm-2 col-form-label">AreaofWork:</label>
    <div class="col-sm-10">
      <input type="text" id="aow" name="aow" class="form-control" value="<?php echo $row['areaofwork']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="position" class="col-sm-2 col-form-label">Position:</label>
    <div class="col-sm-10">
      <input type="text" id="position" name="position" class="form-control" value="<?php echo $row['position']; ?>">
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

  </style>
</head>




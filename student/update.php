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
$conn = mysqli_connect("localhost:3308", "username", "", "project");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the values from the form
  $webmail = $_POST['webmail'];
  $c10 = $_POST['c10'];
  $c12 = $_POST['c12'];
  $cpi = $_POST['cpi'];
  $special = $_POST['special'];
  $age = $_POST['age'];
  $aoi = $_POST['aoi'];
  $branch = $_POST['branch'];
  $salary = $_POST['salary'];

  // Update the values in the sd table
  $query = "UPDATE sd SET webmail='$webmail', c10='$c10', c12='$c12', cpi='$cpi', special='$special', age='$age', aoi='$aoi', branch='$branch', salary='$salary' WHERE rollno='$empid'";
  $result = mysqli_query($conn, $query);

  if ($result) {
    echo '<div class="success-message"><p>Records updated successfully.</p>';

  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
}

// Fetch the data for the rollno passed in the URL parameter
$id = $_GET['id'];
$query = "SELECT * FROM sd WHERE rollno='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Close the database connection
mysqli_close($conn);
?>
<!-- HTML code for update form -->
<form method="POST">
  <div class="form-group row">
    <label for="webmail" class="col-sm-2 col-form-label">Webmail:</label>
    <div class="col-sm-10">
      <input type="text" id="webmail" name="webmail" class="form-control" value="<?php echo $row['webmail']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="c10" class="col-sm-2 col-form-label">Class 10:</label>
    <div class="col-sm-10">
      <input type="text" id="c10" name="c10" class="form-control" value="<?php echo $row['c10']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="c12" class="col-sm-2 col-form-label">Class 12:</label>
    <div class="col-sm-10">
      <input type="text" id="c12" name="c12" class="form-control" value="<?php echo $row['c12']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="cpi" class="col-sm-2 col-form-label">CPI:</label>
    <div class="col-sm-10">
      <input type="text" id="cpi" name="cpi" class="form-control" value="<?php echo $row['cpi']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="special" class="col-sm-2 col-form-label">Special:</label>
    <div class="col-sm-10">
      <input type="text" id="special" name="special" class="form-control" value="<?php echo $row['special']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="age" class="col-sm-2 col-form-label">Age:</label>
    <div class="col-sm-10">
      <input type="text" id="age" name="age" class="form-control" value="<?php echo $row['age']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="aoi" class="col-sm-2 col-form-label">Area Of Interest:</label>
    <div class="col-sm-10">
      <input type="text" id="aoi" name="aoi" class="form-control" value="<?php echo $row['aoi']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="branch" class="col-sm-2 col-form-label">Branch:</label>
    <div class="col-sm-10">
      <input type="text" id="branch" name="branch" class="form-control" value="<?php echo $row['branch']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="salary" class="col-sm-2 col-form-label">Salary:</label>
    <div class="col-sm-10">
      <input type="text" id="salary" name="salary" class="form-control" value="<?php echo $row['salary']; ?>">
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




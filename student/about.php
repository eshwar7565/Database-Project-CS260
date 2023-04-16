


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
</html>


<?php
require 'config.php';
include 'config.php';
session_start();
$empid=$_SESSION['sess_user'];
?>

<!-- HTML code for displaying table attributes in cards -->
<!-- HTML code for displaying table attributes in cards with margins and update option-->
<div class="card-container">
  <?php
    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "project");

    // Fetch data from the sd table
    echo $empid;
    $query = "SELECT * FROM sd where rollno='$empid'";
    $result = mysqli_query($conn, $query);

    // Loop through the results and display them in cards
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<div class="card">';
      echo '<p> <strong>Roll No   &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: &nbsp </strong>'. $row['rollno'] . '</p>';
      echo '<p><strong>Email   &nbsp&nbsp&nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: &nbsp</strong> ' . $row['webmail'] . '</p>';
      echo '<p><strong>Class 10   &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp: &nbsp</strong> ' . $row['c10'] . '</p>';
      echo '<p><strong>Class 12   &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp: &nbsp</strong> ' . $row['c12'] . '</p>';
      echo '<p><strong>CPI &nbsp    &nbsp &nbsp &nbsp&nbsp  &nbsp  &nbsp &nbsp &nbsp &nbsp: &nbsp</strong> ' . $row['cpi'] . '</p>';
      echo '<p><strong>Specialization : &nbsp</strong> ' . $row['special'] . '</p>';
      echo '<p><strong>Age &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp  &nbsp &nbsp&nbsp:&nbsp</strong> ' . $row['age'] . '</p>';
      echo '<p><strong>AreaofInterest: &nbsp</strong> ' . $row['aoi'] . '</p>';
      echo '<p><strong>Branch &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: &nbsp</strong> ' . $row['branch'] . '</p>';
      echo '<p><strong>Salary  &nbsp &nbsp&nbsp&nbsp &nbsp &nbsp &nbsp  : &nbsp </strong> ' . $row['salary'] . '</p>';
      echo '<div class="card-buttons">';
      echo '<a href="update.php?id=' . $row['rollno'] . '">Update</a>';
      echo '</div>';
      echo '</div>';
    }

    // Close the database connection
    mysqli_close($conn);
  ?>
</div>

<!-- CSS code for styling the cards with margins and update option -->
<style>
  .card-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
  }

  .card {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    box-shadow: 2px 2px 5px #ccc;
    width: 500px;
    margin-bottom: 20px;
    margin-top: 20px;
  }

  .card h2 {
    font-size: 24px;
    margin-bottom: 10px;
  }

  .card p {
    font-size: 18px;
    margin-bottom: 5px;
  }

  .card p strong {
    font-weight: bold;
  }

  .card-buttons {
    display: flex;
    justify-content: flex-end;
    margin-top: 10px;
  }

  .card-buttons a {
    background-color: #007bff;
    color: #fff;
    padding: 5px 10px;
    border-radius: 3px;
    text-decoration: none;
    margin-left: 10px;
  }
</style>





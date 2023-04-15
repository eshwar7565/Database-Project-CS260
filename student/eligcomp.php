<?php
require 'config.php';
?>

<?php
    session_start();
    $emp_id = $_SESSION['sess_user'];
      
?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"/>

 <title>Companies</title>
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
$sql = "select * from companyregister where compname not in(
  (select compname from reject) union
  (select compname from sd where sd.rollno='$emp_id') union
  (select compname from companyregister where salary<(select salary from sd where rollno='$emp_id'))";
$result = mysqli_query($conn, $sql);

// Display the list of companies on the web page

echo "<table style='border-collapse: collapse; margin: 20px; border: 2px solid #333;'>";
echo "<tr><th style='border: 2px solid #333; padding: 10px; color: #fff; background-color: #333;'>Company Name</th>
<th style='border: 2px solid #333; padding: 10px; color: #fff; background-color: #333;'>Type</th>
<th style='border: 2px solid #333; padding: 10px; color: #fff; background-color: #333;'>Mode</th>
<th style='border: 2px solid #333; padding: 10px; color: #fff; background-color: #333;'>Update</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  
  echo "<td style='border: 2px solid #333; padding: 10px;'>" . $row['compname'] . "</td>";
  echo "<td style='border: 2px solid #333; padding: 10px;'>" . $row['type'] . "</td>";
  echo "<td style='border: 2px solid #333; padding: 10px;'>" . $row['mode'] . "</td>";
  echo "<td style='border: 2px solid #333;style='padding: 10px;'><a href='apply.php?id=" . $row["compname"] . "' style='padding: 5px 10px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 3px;'>Apply Now</a></td>";
  echo "</tr>";
}

echo "</table>";


mysqli_close($conn);
?>
<?php
$message = isset($_GET['message']) ? $_GET['message'] : '';
?>

<script>
if("<?php echo $message; ?>" !== '') {
  alert("<?php echo $message; ?>");
}
</script>

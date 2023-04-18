<?php
// Replace database credentials with your own
include "config.php";

// Get search parameters from URL query string
$role = $_GET["role"];
$min_salary = $_GET["min_salary"];


// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Build SQL query to search for matching companies
$sql = "SELECT * FROM companyregister WHERE role = '" . $role . "' AND salary >= " . $min_salary;
$result = mysqli_query($conn, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
  // Display matching companies
  echo "<table style='border-collapse: collapse; margin: 20px; border: 2px solid #333;'>";
  echo "<tr><th style='border: 2px solid #333; padding: 10px; color: #fff; background-color: #333;'>Company Name</th>
  <th style='border: 2px solid #333; padding: 10px; color: #fff; background-color: #333;'>Type</th>
  <th style='border: 2px solid #333; padding: 10px; color: #fff; background-color: #333;'>Mode</th>
  <th style='border: 2px solid #333; padding: 10px; color: #fff; background-color: #333;'>Salary</th>
  <th style='border: 2px solid #333; padding: 10px; color: #fff; background-color: #333;'>Update</th>
  </tr>";

while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  
  echo "<td style='border: 2px solid #333; padding: 10px;'>" . $row['compname'] . "</td>";
  echo "<td style='border: 2px solid #333; padding: 10px;'>" . $row['type'] . "</td>";
  echo "<td style='border: 2px solid #333; padding: 10px;'>" . $row['mode'] . "</td>";
  echo "<td style='border: 2px solid #333; padding: 10px;'>" . $row['salary'] . "</td>";
  echo "<td style='border: 2px solid #333;style='padding: 10px;'><a href='apply.php?id=" . $row["compname"] . "' style='padding: 5px 10px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 3px;'>Apply </a></td>";
  echo "</tr>";
}

echo "</table>";
} else {
  echo "No matching companies found.";
}

// Close connection
mysqli_close($conn);
?>

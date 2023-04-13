<?php
include 'config.php';
//Find various fields for an  and save them in variables for display purposes 

// Select all rows from table
$query = "select branch";
$result = mysqli_query($conn, $query);
 $mycount = mysqli_num_rows($result);


// Generate HTML table to display data
echo "<br><br>";
echo "<table>";
echo "<h5>List of applied candidates who are eligible</h5>" ;
echo "<br><br>";

echo "No of candidates = ";
echo $mycount;
echo "<br><br>";
echo "<tr><th>ID</th><th>Name</th><th>Webmail</th><th>Action1</th><th>Action2</th><th>Resume</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>" . $row['rollno'] . "</td>";
  echo "<td>" . $row['cpi'] . "</td>";
  echo "<td>" . $row['webmail'] . "</td>";
  echo "<td><a href='accept.php?id=" . $row["rollno"] . "'>Accept</a></td>";
  echo "<td><a href='reject.php?id=" . $row["rollno"] . "'>Reject</a></td>";
  echo "<td><a href='blobdemo.php?id=" . $row["rollno"] . "'>View</a></td>";
  echo "</tr>";
}
?>
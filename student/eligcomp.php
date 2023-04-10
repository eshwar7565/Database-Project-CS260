<?php
require 'config.php';
?>

<?php
    session_start();
    $emp_id = $_SESSION['sess_user'];
      
?>
<?php
$sql = "select * from companyregister where compname not in(
    (select companydetails.compname from sd,companydetails where companydetails.salary<sd.salary and sd.rollno='$emp_id') union 
    (select compname from recruitment natural join sd where sd.rollno='$emp_id') union
    (select compname from reject natural join sd where sd.rollno='$emp_id'))";
$result = mysqli_query($conn, $sql);

// Display the list of companies on the web page
while ($row = mysqli_fetch_assoc($result)) {
    echo "<h2>" . $row["compname"] . "</h2>";
    
    echo "<a href='apply.php?id=" . $row["compname"] . "'>Apply</a>";
}

mysqli_close($conn);
?>
<?php
require 'config.php';
?>

<?php
    session_start();
    $emp_id = $_SESSION['sess_user'];
    echo "Welcome" . "<br>";
    $sql = "SELECT compname FROM companydetails,sd WHERE '$emp_id'=sd.rollno and sd.cpi>=companydetails.mincpi";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        echo $row['compname'] . "<br>";
    }
      
?>
<?php
$sql = "SELECT compname FROM companyregister";
$result = mysqli_query($conn, $sql);

// Display the list of companies on the web page
while ($row = mysqli_fetch_assoc($result)) {
    echo "<h2>" . $row["compname"] . "</h2>";
   
    echo "<a href='apply.php?id=" . $row["compname"] . "'>Apply</a>";
}

mysqli_close($conn);
?>
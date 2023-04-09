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
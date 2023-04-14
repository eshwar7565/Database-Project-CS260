<?php
include 'config.php';

if (!$conn) {
  die('Connection failed: ' . mysqli_connect_error());
}

$year = mysqli_real_escape_string($conn, $_POST['year']);
$compname = mysqli_real_escape_string($conn, $_POST['compname']);

$sql = "INSERT INTO yearwisecomp (year, compname) VALUES ('$year', '$compname')";
if (mysqli_query($conn, $sql)) {
    $_SESSION['message'] = "Record added successfully";

    // Redirect back to the main.php page
    header("Location: main.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

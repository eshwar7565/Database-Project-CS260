<?php
// Establish a connection to the MySQL database
include 'config.php';
// Check if the connection was successful
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
session_start();
   
    
    
    //If there is no session user, then redirect to login page 
    if (!isset($_SESSION['sess_user'])) {
        header("location: login.php");
    }
    $emp_id = $_SESSION['sess_user'];


// Check if the DELETE button was clicked
if (isset($_GET["year"])) {
    // Get the values of the Year and CompName to be deleted
    $year = $_GET["year"];

    // Construct the SQL query to delete the row
    $sql = "DELETE FROM yearwisecomp WHERE year = '$year' AND compname = '$emp_id'";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
        header("Location: main.php");
    }
    else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>

<?php
//Since port has been changed on XAMPP, change MySQL server connections.
$servername = "localhost:3308";
$username = "root";
$password = "";
$database="project";


$conn = mysqli_connect($servername, $username, $password,$database);

if (!$conn) {
	die("<script>alert('Connection Failed.')</script>");
}

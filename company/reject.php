<?php
    //Connect to MySQL server 
    require 'config.php';
    session_start();
   
    
    
    //If there is no session user, then redirect to login page 
    if (!isset($_SESSION['sess_user'])) {
        header("location: login.php");
    }
    $emp_id = $_SESSION['sess_user'];

   
    if (isset($_GET["id"])) {
        $roll = $_GET["id"];
    } else {
        die(" ID not specified.");
    }

    //Find various fields for an  and save them in variables for display purposes 
    
    $query = "insert into reject(rollno,compname) values('$roll','$emp_id')";
    mysqli_query($conn, $query);
   
    $query1 = "delete from apply where rollno='$roll' and compname='$emp_id'";
    mysqli_query($conn,$query1);

    
    ?>

<!DOCTYPE html>
<html>
<head>
<style>
      .centered-button {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }
    </style>
</head>
<body>
<form method="get" action="main.php">
		
        <button class="centered-button">Go back</button>

	</form>
  
	
</body>
</html>
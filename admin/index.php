<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<style>
		body {
			background-color: #f5f5f5;
			font-family: Arial, sans-serif;
		}
		h1 {
			text-align: center;
			margin-top: 50px;
		}
		form {
			width: 400px;
			margin: 50px auto;
			padding: 20px;
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
		}
		input[type="text"], input[type="password"] {
			display: block;
			width: 90%;
			padding: 10px;
			margin-bottom: 20px;
			border: none;
			border-radius: 5px;
			box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
			font-size: 16px;
		}
		button[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			border: none;
			border-radius: 5px;
			padding: 10px 20px;
			cursor: pointer;
			font-size: 16px;
			float: right;
			position: relative;
			overflow: hidden;
		}
		button[type="submit"]:before {
			content: "";
			position: absolute;
			top: 0;
			left: 0;
			width: 0;
			height: 0;
			border-top: 40px solid transparent;
			border-bottom: 40px solid transparent;
			border-right: 30px solid #4CAF50;
			z-index: 1;
		}
		button[type="submit"]:hover:before {
			border-right-color: #3e8e41;
		}
        input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			border: none;
			border-radius: 5px;
			padding: 10px 20px;
			cursor: pointer;
			font-size: 16px;
            float: center;
		}
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
	<?php
    include 'config.php';
		// Check if the username and password have been submitted
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve the user input
            $username = $_POST["username"];
            $password = $_POST["password"];
          
            // Retrieve the admin username and password from the database
            $sql = "SELECT * FROM admin WHERE username='$username'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              $db_password = $row["password"];
          
              // Compare the user input with the database password
              if ($password == $db_password) {
                echo "Login successful";
                header("Location: main.php");
              } else {
                echo "Invalid username or password";
              }
            } else {
              echo "Invalid username or password";
            }
        }
	?>
	
	<h1>Admin Login</h1>
	
	<form method="post">
		<input type="text" name="username" placeholder="Username">
		<input type="password" name="password" placeholder="Password">
		<input type="submit" value="Login">
	</form>
</body>
</html>

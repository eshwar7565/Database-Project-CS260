<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"/>

<title>Companies</title>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
 <a class="navbar-brand" href="#"></a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
 </button>
 <div class="collapse navbar-collapse" id="navbarNav">
   <ul class="navbar-nav">
     <li class="nav-item">
       <a class="nav-link" href="main.php">Home</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="about.php">About</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="eligcomp.php">Apply For Job</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="jobq1.php">Search Job By Role</a>
     </li>
     
   </ul>
   <ul class="navbar-nav ml-auto">
     
     <li class="nav-item">
       <a class="nav-link" href="login.php">Logout</a>
     </li>
   </ul>
 </div>
</nav>
<head>
	<title>Job Search</title>
	<style>
		body {
			background-color: yellow;
		}
		.container {
            max-width: 600px;
			margin: 0 auto;
			padding: 20px;
        }
		.question {
			
			align-items: left;
			margin-bottom: 20px;
			font-size: 20px;
			font-weight: bold;
			text-align: left;
			width: 500px;
			height: 50px;
			background-color: white;
			padding: 0 20px;
			border-radius: 10px;
            display: inline-block;
			color: blue;
		}
		.answer {
			
			align-items: right;
			margin-bottom: 20px;
			font-size: 20px;
			font-weight: bold;
			text-align: left;
			width: 500px;
			height: 50px;
			background-color: #ffcc99;
			padding: 0 20px;
			border-radius: 10px;
            display: inline-block;
			color: red;
            float: right;
		}
		.button-container {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			margin-bottom: 20px;
		}
		.button {
			display: flex;
			align-items: center;
			justify-content: center;
			margin: 5px;
			width: 150px;
			height: 50px;
			background-color: white;
			border-radius: 10px;
			cursor: pointer;
			color: blue;
		}
		.selected {
			background-color: blue;
			color: white;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="question" style="margin-right: 20px;">What type of job role are you looking for?</div>
		<div class="button-container">
			<?php
			// Replace database credentials with your own
			include 'config.php';


			// Check connection
			if (!$conn) {
			  die("Connection failed: " . mysqli_connect_error());
			}

			// Query distinct job roles from companyregister table
			$sql = "SELECT DISTINCT role FROM companyregister";
			$result = mysqli_query($conn, $sql);

			// Check if there are any rows returned
			if (mysqli_num_rows($result) > 0) {
			  // Display options to user
			  while($row = mysqli_fetch_assoc($result)) {
			    echo "<div class='button' onclick='selectRole(\"" . $row["role"] . "\")'>" . $row["role"] . "</div>";
			  }
			} else {
			  echo "No job roles found.";
			}

			// Close connection
			mysqli_close($conn);
			?>
		</div>
		<div class="answer" id="selected-role"></div>
		<div class="question">What is the minimum salary you expect?</div>
		<div>
			<input type="number" id="min-salary" name="min-salary" min="0" step="1000" required>
		</div>
		<div>
			<button type="submit" onclick="submitForm()">Search</button>
		</div>
		<div class="answer" id="matching-companies"></div>
	</div>
	<script>
		function selectRole(role) {
			document.getElementById("selected-role").innerHTML = role;
		}

		function submitForm() {
			var selectedRole = document.getElementById("selected-role").innerHTML;
			var minSalary = document.getElementById("min-salary").value;
			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("matching-companies").innerHTML = this.responseText;
				}
			};
			xhr.open("GET", "search.php?role=" + selectedRole + "&min_salary=" + minSalary, true);
			xhr.send();
		}
	</script>
</body>
</html>

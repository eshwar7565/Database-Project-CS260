<!DOCTYPE html>
<html>
<head>
	<title>Job Finder</title>
	<style>
		body {
			background-color: #ffa500;
			text-align: center;
			font-family: "Architects Daughter", cursive;
			font-size: 20px;
			line-height: 1.5;
		}
		h1 {
			margin-top: 50px;
		}
		.role-button {
			background-color: #fff;
			border: none;
			color: black;
			font-size: 20px;
			font-weight: bold;
			padding: 20px 40px;
			margin: 10px;
			cursor: pointer;
			border-radius: 10px;
		}
		.role-button:hover {
			background-color: #f2f2f2;
		}
		.question {
			margin-top: 50px;
		}
		.chat-log {
			width: 600px;
			height: 400px;
			font-size: 16px;
			font-family: monospace;
			resize: none;
			border: none;
			background-color: #fff;
			margin: auto;
			display: block;
			overflow-y: scroll;
			padding: 10px;
			border-radius: 10px;
			margin-top: 50px;
			margin-bottom: 50px;
		}
		.chat-input {
			width: 400px;
			height: 50px;
			font-size: 16px;
			font-family: monospace;
			resize: none;
			border: none;
			background-color: #fff;
			margin: auto;
			display: block;
			border-radius: 10px;
			padding: 10px;
		}
		.submit-button {
			background-color: #fff;
			border: none;
			color: black;
			font-size: 20px;
			font-weight: bold;
			padding: 20px 40px;
			margin-top: 20px;
			cursor: pointer;
			border-radius: 10px;
		}
		.submit-button:hover {
			background-color: #f2f2f2;
		}
	</style>
	<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
</head>
<body>
	<h1>Job Finder</h1>
	<div id="role-question" class="question">What kind of role are you looking for?</div>
	<?php
		// establish database connection
		$host = "localhost";
		$user = "your_db_username";
		$pass = "your_db_password";
		$dbname = "your_db_name";
		$conn = mysqli_connect($host, $user, $pass, $dbname);
		if (mysqli_connect_errno()) {
			die("Failed to connect to database: " . mysqli_connect_error());
		}

		// query distinct roles from companyregister table
		$sql = "SELECT DISTINCT role FROM companyregister";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			// display role buttons
			echo "<div id='role-buttons'>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<button class='role-button' onclick='roleSelected(\"" . $row["role"] . "\")'>" . $row["role"] . "</button>";
			}
			echo "</div>";
		}
		?>
		<div id="role-question" class="question">
		<p>What kind of role are you looking for?</p>
		</div>
		<div id="salary-question" class="question" style="display:none;">
		<p>What is the minimum salary you are expecting?</p>
		<input id="min-salary-input" type="number" placeholder="Enter minimum salary">
		<input id="selected-role" type="hidden" value="">
		<button class="submit-button" onclick="submit()">Submit</button>
	</div>

	<div id="role-selected"></div>

	<div id="chat-log"></div>

	<div id="chat-input" style="display:none;">
		<input id="chat-message" type="text" placeholder="Type your message here">
		<button id="send-button" onclick="sendMessage()">Send</button>
	</div>

	<script>
		function roleSelected(role) {
			// hide role buttons and display minimum salary question
			document.getElementById("role-question").style.display = "none";
			document.getElementById("role-selected").innerHTML = "Selected Role: " + role;
			document.getElementById("salary-question").style.display = "block";
			document.getElementById("min-salary-input").focus();
			// store selected role for use in submit function
			document.getElementById("selected-role").value = role;
		}

		function submit() {
			// get minimum salary from user input
			var minSalary = document.getElementById("min-salary-input").value;
			// query database for companies with selected role and salary greater than or equal to minimum salary
			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function() {
				if (xhr.readyState === 4 && xhr.status === 200) {
					// display results in chat
					document.getElementById("chat-log").innerHTML += "Companies with role '" + document.getElementById("selected-role").value + "' and salary greater than or equal to " + minSalary + ":\n";
					document.getElementById("chat-log").innerHTML += xhr.responseText;
					document.getElementById("chat-input").style.display = "block";
				}
			}
			xhr.open("GET", "compfind.php?role=" + document.getElementById("selected-role").value + "&min_salary=" + minSalary, true);
			xhr.send();
			// reset UI for new search
			document.getElementById("salary-question").style.display = "none";
			document.getElementById("role-selected").innerHTML = "";
			document.getElementById("min-salary-input").value = "";
			document.getElementById("selected-role").value = "";
			document.getElementById("role-question").style.display = "block";
		}

		function sendMessage() {
			// get user input message
			var message = document.getElementById("chat-message").value;
			// send message via WhatsApp API
			window.open("https://api.whatsapp.com/send?text=" + message);
			// clear input field
			document.getElementById("chat-message").value = "";
		}
	</script>
</body>
</html>

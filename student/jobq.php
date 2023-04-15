<!DOCTYPE html>
<html>
<head>
	<title>Job Search</title>
	<style>
		body {
			background-color: orange;
		}
		.container {
			max-width: 600px;
			margin: 0 auto;
			padding: 20px;
		}
		.question {
			background-color: #fff;
			padding: 10px;
			border-radius: 10px;
			display: inline-block;
			max-width: 80%;
			margin-bottom: 10px;
		}
		.answer {
			background-color: #dcf8c6;
			padding: 10px;
			border-radius: 10px;
			display: inline-block;
			max-width: 80%;
			margin-bottom: 10px;
			float: right;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Job Search</h1>
		<form method="POST" action="">
			<div class="question">What job role are you interested in?</div>
			<div class="answer"><input type="text" name="role"></div>
			<div class="question">What is your minimum expected salary?</div>
			<div class="answer"><input type="text" name="salary"></div>
			<div style="text-align: center;">
				<button type="submit" name="submit">Search Jobs</button>
			</div>
		</form>
		<?php
        include 'config.php';
			if (isset($_POST['submit'])) {
				$role = $_POST['role'];
				$salary = $_POST['salary'];
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}

				// Prepare SQL statement with NLP search
				$sql = "SELECT * FROM companydetails WHERE MATCH(role) AGAINST('$role' IN NATURAL LANGUAGE MODE)";

				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// Output matching companies with salary >= user's minimum expectation
					echo "<div class='question'>Matching companies with salary >= $salary:</div>";
					while($row = $result->fetch_assoc()) {
						if ($row['salary'] >= $salary) {
							echo "<div class='answer'>" . $row['compname'] . "</div>";
						}
					}
				} else {
					echo "<div class='answer'>No matching companies found.</div>";
				}

				$conn->close();
			}
		?>
	</div>
</body>
</html>

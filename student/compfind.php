<!DOCTYPE html>
<html>
<head>
	<title>Company Finder</title>
	<style type="text/css">
		body {
			background-color: #FFA500;
		}
		button {
			background-color: #FFF;
			font-size: 12px;
			width: 100px;
			height: 50px;
			margin-top: 10px;
		}
		input {
			font-size: 12px;
			width: 100px;
			margin-top: 10px;
		}
		.chat-container {
			height: 400px;
			width: 600px;
			padding: 10px;
			margin-top: 10px;
			background-color: #FFF;
			overflow-y: auto;
		}
		.chat-left {
			text-align: left;
		}
		.chat-right {
			text-align: right;
		}
	</style>
</head>
<body>
	<?php
		// establish database connection
		include 'config.php';

		// get distinct job roles from company_register table
		$query = "SELECT DISTINCT role FROM companyregister";
		$result = mysqli_query($conn, $query);
		$roles = mysqli_fetch_all($result, MYSQLI_ASSOC);

		// define functions for button click and chat display
		function role_selected($role) {
			// ask user for minimum salary
			echo "<script>document.getElementById('min-salary-button').style.display = 'none';</script>";
			echo "<input type='text' id='min-salary-entry' placeholder='Minimum Salary'>";
			echo "<button onclick='submit()'>Submit</button>";
			// store selected role for use in submit function
			echo "<script>var selected_role = '$role';</script>";
		}

		function submit() {
			// get minimum salary from user input
			$min_salary = $_POST['min_salary'];
			// query database for companies with selected role and salary greater than or equal to minimum salary
			$query = "SELECT compname FROM companyregister WHERE role='$role' AND salary>=$min_salary";
			$result = mysqli_query($db, $query);
			$companies = mysqli_fetch_all($result, MYSQLI_ASSOC);
			// display results in chat
			echo "<script>document.getElementById('chat-log').innerHTML += 'Companies with role ' + selected_role + ' and salary greater than or equal to ' + $min_salary + ':<br>';</script>";
			foreach ($companies as $company) {
				echo "<script>document.getElementById('chat-log').innerHTML += '&#9658; ' + '" . $company['compname'] . "' + '<br>';</script>";
			}
			// reset UI for new query
			echo "<script>document.getElementById('min-salary-entry').value = '';</script>";
			echo "<script>document.getElementById('min-salary-entry').style.display = 'none';</script>";
			echo "<script>document.getElementById('submit-button').style.display = 'none';</script>";
			foreach ($roles as $role) {
				echo "<script>document.getElementById('role-button-" . $role['role'] . "').style.display = 'block';</script>";
			}
		}
	?>
	<div class="container">
		<?php
			// create buttons for job roles
			foreach ($roles as $role) {
				echo "<button id='role-button-" . $role['role'] . "' onclick='roleSelected("" . $role['role'] . "")' class='role-button'>" . $role['role'] . "</button>";
            }
        ?>
        	<!-- input for minimum salary and submit button -->
	<div id="min-salary-input" style="display: none;">
		<label for="min-salary">What is the minimum salary you are expecting?</label>
		<input type="number" id="min-salary" name="min-salary" required>
		<button type="submit" onclick="submitForm()">Submit</button>
	</div>

	<!-- chat display -->
	<div id="chat-log"></div>

	<script>
		let selectedRole = '';

		function roleSelected(role) {
			selectedRole = role;
			document.getElementById('min-salary-input').style.display = 'block';
			document.querySelectorAll('.role-button').forEach(button => {
				button.style.display = 'none';
			});
		}

		function submitForm() {
			const minSalary = document.getElementById('min-salary').value;
			const xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					const companies = JSON.parse(this.responseText);
					const chatLog = document.getElementById('chat-log');
					chatLog.innerHTML += `<p>Companies with role '${selectedRole}' and salary greater than or equal to ${minSalary}:</p>`;
					companies.forEach(company => {
						chatLog.innerHTML += `<p class='chat-bubble-right'>${company}</p>`;
					});
					document.getElementById('min-salary-input').style.display = 'none';
					document.querySelectorAll('.role-button').forEach(button => {
						button.style.display = 'block';
					});
					document.getElementById('min-salary').value = '';
					selectedRole = '';
				}
			};
			xmlhttp.open("GET", `query.php?role=${selectedRole}&min_salary=${minSalary}`, true);
			xmlhttp.send();
		}
	</script>
</div>

</body>
</html> 
<?php
	// establish database connection
	include 'config.php';

	// get role and minimum salary from GET parameters
	$role = $_GET['role'];
	$minSalary = $_GET['min_salary'];

	// query database for companies with selected role and salary greater than or equal to minimum salary
	$stmt = $conn->prepare("SELECT compname FROM companyregister WHERE role=? AND salary>=?");
	$stmt->bind_param("si", $role, $minSalary);
	$stmt->execute();
	$result = $stmt->get_result();

	// format results as JSON and return to client
	$companies = array();
	while ($row = $result->fetch_assoc()) {
		array_push($companies, $row['compname']);
	}
	echo json_encode($companies);

	// close database connection
	$stmt->close();
	$conn->close();
?>
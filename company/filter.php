<!DOCTYPE html>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"/>

 <title>Student Details</title>
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
        <a class="nav-link" href="ase.php">Recruit</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="filter.php">For Filter Applied Candidates</a>
      </li>
    </ul>
  </div>
</nav>
<html>
<head>
	<title>Filter by Branch and CPI</title>
	<style>
		table, th, td {
		  border: 1px solid black;
		  border-collapse: collapse;
		}
        th {
			background-color: #4CAF50;
			color: white;
		}
		th, td {
		  padding: 10px;
		  text-align: left;
		}
		#filter-form {
			display: inline-block;
			margin-right: 20px;
		}
		#filter-button {
			background-color: #F63E02;
			color: white;
			border: none;
			padding: 10px 20px;
			border-radius: 50px 0px 0px 50px;
			font-size: 16px;
			cursor: pointer;
		}
		#branch-select {
			display: inline-block;
			margin-right: 20px;
		}
	</style>
    <title> Student Data</title>
    <style>
		.container {
			margin: 0 auto;
			width: 80%;
		}
		table {
			width: 80%;
			border-collapse: collapse;
		}
		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		tr:hover {
			background-color: #f5f5f5;
		}
		#filter-form {
			margin-top: 180px;
		}
	</style>
</head>
<body>

	<?php
		// Connect to the database
		include 'config.php';
        session_start();
        $emp_id=$_SESSION['sess_user'];

		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		// Construct the SQL query
		// Build the SQL query
        $sql = "SELECT sd.rollno, sd.branch, sd.cpi
        FROM apply JOIN sd ON apply.rollno = sd.rollno
        WHERE apply.compname = '$emp_id'";

// Check if any branches were selected in the form
        if (isset($_POST['branches'])) {
            $branches = $_POST['branches'];
// If branches were selected, add a WHERE clause to the query to filter by branch
            $sql .= " AND sd.branch IN ('" . implode("', '", $branches) . "')";
        }

// Add an ORDER BY clause to sort by CPI
        $sql .= " ORDER BY sd.cpi DESC";

		// Execute the query and get the results
		$result = mysqli_query($conn, $sql);

		// Display the results in a table
        ?>
        <div class="container my-4">
            <form id="filter-form" method="post" class="mb-3">
                <button type="submit" id="filter-button" class="btn btn-primary">Filter</button>
                <label for="branch-select" class="mx-3">Filter by Branch:</label>
                <select name="branches[]" id="branch-select" multiple class="form-select">
                    <option value="AI">AI</option>
                    <option value="CB">CB</option>
                    <option value="CE">CE</option>
                    <option value="CSE">CSE</option>
                    <option value="EE">EE</option>
                    <option value="EP">EP</option>
                    <option value="ME">ME</option>
                    <option value="MC">MC</option>
                    <option value="MM">MM</option>
                </select>
            </form>
    
            <!-- Student table -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Roll No</th>
                            <th>CPI</th>
                            <th>Branch</th>
                            <th>Action1</th>
                            <th>Action2</th>
                            <th>Resume</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['rollno'] . "</td>";
                            echo "<td>" . $row['cpi'] . "</td>";
                            echo "<td>" . $row['branch'] . "</td>";
                            echo "<td><a href='accept.php?id=" . $row["rollno"] . "'>Accept</a></td>";
                            echo "<td><a href='reject.php?id=" . $row["rollno"] . "'>Reject</a></td>";
                            echo "<td><a href='blobdemo.php?id=" . $row["rollno"] . "'>View</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    
        <!-- Submit form on filter button click -->
        <script>
            document.getElementById("filter-button").addEventListener("click", function() {
                document.getElementById("filter-form").submit();
            });
        </script>
    
    </body>
    
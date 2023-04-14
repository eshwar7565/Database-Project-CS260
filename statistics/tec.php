
<?php
include "databaseconfig.php";
// Establish connection to the database

// Check if form is submitted
if(isset($_POST['submit'])) {

    // Sanitize user input
    $num_of_companies = filter_var($_POST['num_of_companies'], FILTER_SANITIZE_NUMBER_INT);

    // Prepare SQL statement
    $stmt = $pdo->prepare("SELECT compname, salary FROM companydetails ORDER BY salary DESC LIMIT :num_of_companies");

    // Bind parameters
    $stmt->bindParam(':num_of_companies', $num_of_companies, PDO::PARAM_INT);

    // Execute SQL statement
    $stmt->execute();

    // Fetch all rows as an associative array
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<h2>Top $num_of_companies Expensive Companies</h2>";
echo "<ul>";
foreach($results as $key => $row) {
    echo "<li style='margin-bottom: 5px;'>";
    $rank = $key + 1;
    $salary = "₹" . $row['salary'] . " LPA CTC";
    echo "<span class='rank' style='font-weight: bold;'>$rank.</span> <span class='company-name'>".$row['compname']."</span> <span class='salary'>".$salary."</span></li>";
}
echo "</ul>";
}
?>

<!-- HTML form to get input from user -->
<form method="post">
    <label for="num_of_companies">Enter number of companies:</label>
    <input type="number" id="num_of_companies" name="num_of_companies">
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

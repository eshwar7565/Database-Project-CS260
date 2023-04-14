
<head>
    <style>
        h1 {
            font-family: 'Architects Daughter', cursive;
            font-size: 42px;
            text-align: left;
            margin-left: 375px;
        }
    </style>
    <link href="https://fonts.googleapis.com/css?family=Architects+Daughter&display=swap" rel="stylesheet">
</head>
<style>
table {
  border-collapse: collapse;
  width: 80%;
}
th, td {
  text-align: center;
  padding: 10px;
  width: 10%;
}
th {
  background-color: #008080;
  color: white;
  font-size: 18px;
  text-transform: uppercase;
  border-top: 3px solid blue;
  border-bottom: 3px solid blue;
}
tr:nth-child(even) {
  background-color: #f2f2f2;
}
td {
  border: 1px solid #ddd;
}
tr:hover {
  background-color: #ddd;
}
</style>

<?php
include 'config.php';
//Find various fields for an  and save them in variables for display purposes 

// Select all rows from table
$query = "select * from branchwiseyear";
$result = mysqli_query($conn, $query);

echo '<div>';
echo '<h1>Placement Stats</h1>';
// Generate HTML table to display data
echo '<table>';
echo '<tr><th>YEAR</th><th>AI</th><th>CBE</th><th>CE</th><th>CSE</th><th>EE</th><th>EP</th><th>MC</th><th>ME</th><th>MME</th></tr>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . ($row['Year'] ?? 0) . '</td>';
    echo '<td>' . ($row['AI'] ?? 0) . '</td>';
    echo '<td>' . ($row['CBE'] ?? 0) . '</td>';
    echo '<td>' . ($row['CE'] ?? 0) . '</td>';
    echo '<td>' . ($row['CSE'] ?? 0) . '</td>';
    echo '<td>' . ($row['EE'] ?? 0) . '</td>';
    echo '<td>' . ($row['EP'] ?? 0) . '</td>';
    echo '<td>' . ($row['MC'] ?? 0) . '</td>';
    echo '<td>' . ($row['ME'] ?? 0) . '</td>';
    echo '<td>' . ($row['MME'] ?? 0) . '</td>';
    echo '</tr>';
}
echo '</table>';

?>
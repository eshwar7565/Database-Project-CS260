<?php
// Database configuration
include 'config.php';



// Fetch data from the table
$query = "SELECT year, count(distinct(compname)) as no_of_companies FROM yearwisecomp group by year order by year asc";
$result = mysqli_query($conn,$query);



$labels = array();
$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    array_push($labels, $row['year']);
    array_push($data, $row['no_of_companies']);
}

echo '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';
echo '<canvas id="myChart"></canvas>';
echo '<script>';
echo 'var ctx = document.getElementById("myChart").getContext("2d");';
echo 'var myChart = new Chart(ctx, {';
echo 'type: "bar",';
echo 'data: {';
echo 'labels: ' . json_encode($labels) . ',';
echo 'datasets: [{';
echo 'label: "Number of companies",';
echo 'data: ' . json_encode($data) . ',';
echo 'backgroundColor: "rgba(54, 162, 235, 0.5)",';
echo 'borderColor: "rgba(54, 162, 235, 1)",';
echo 'borderWidth: 1';
echo '}]';
echo '},';
echo 'options: {';
echo 'scales: {';
echo 'yAxes: [{';
echo 'ticks: {';
echo 'beginAtZero: true';
echo '}';
echo '}]';
echo '}';
echo '}';
echo '});';
echo '</script>';
?>
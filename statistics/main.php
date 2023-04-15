<!DOCTYPE html>
<html>
<head>
	<title>Placement Stats </title>
	<style>
		body {
			margin: 0;
			padding: 0;
		}

		#navbar {
			height: 100%;
			width: 200px;
			position: fixed;
			z-index: 1;
			top: 0;
			left: 0;
			background-color: #f5f5f5;
			overflow-x: hidden;
			padding-top: 20px;
		}

		#navbar a {
			display: block;
			padding: 10px;
			text-decoration: none;
			color: #000;
			font-size: 16px;
			font-weight: bold;
			transition: 0.3s;
		}

		#navbar a:hover {
			background-color: #555;
			color: #fff;
		}

		#main {
			margin-left: 200px;
			padding: 20px;
			font-size: 28px;
			text-align: center;
		}
	</style>
</head>
<body>
	<div id="navbar">
	<a href="../index.php">Home </a>
		<a href="ywca1.php">Year Wise Companies Appeared</a>
		<a href="tec.php">Top Expensive Companies</a>
		<a href="view.php">Branch wise Placements</a>
        <a href="as.php">Alumni Selections</a>
		<a href="mma.php">Average Minimum Maximum Packages</a>
	</div>

	<div id="main">
		<p> Placement Statistics!</p>
	</div>
</body>
</html>
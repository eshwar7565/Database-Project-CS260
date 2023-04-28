<!DOCTYPE html>
<html>
<head>
	<title>Navigation Bar</title>
	<style>
		body {
			margin: 0;
			padding: 0;
			background-color: #f5f5f5;
			font-family: Arial, sans-serif;
		}
		nav {
			background-color: #333;
			overflow: hidden;
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			z-index: 1;
			border-bottom: 2px solid #4CAF50;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
		}
		nav a {
			float: left;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-size: 18px;
			font-weight: bold;
			transition: background-color 0.3s;
		}
		nav a:hover {
			background-color: #4CAF50;
			color: white;
		}
		nav a.active {
			background-color: #4CAF50;
			color: white;
		}
		.container {
			margin-top: 80px;
			text-align: center;
		}
		h1 {
			margin-top: 0;
			font-size: 36px;
			font-weight: bold;
			color: #333;
			text-shadow: 1px 1px #ccc;
		}
		p {
			font-size: 24px;
			color: #666;
			line-height: 1.5;
			margin-bottom: 30px;
		}
	</style>
</head>
<body>
	<nav>
		<a href="verifystud.php">Verify Students</a>
		<a href="verifyalum.php">Verify Alumni</a>
		<a href="verifycomp.php">Verify Companies</a>
        <a href="logout.php">Logout </a>
	</nav>
	<div class="container">
		<h1>Welcome to the Verification Portal</h1>
		<p>Please select a category to verify:</p>
	</div>
</body>
</html>

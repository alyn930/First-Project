<?php
	session_start();
	if(!isset($_SESSION['id']))
		{
			header("location:login.php");
		}

	$id = $_SESSION['id'];

	include_once 'functions.php';
	include_once 'style.php';
	include 'navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<body>
	<div class="jumbotron jumbotron-fluid container-fluid">
  <div class="container">
    <h1 class="display-4">Greetings&nbsp;<?php echo $_SESSION["Firstname"];?>!</h1>
    <p class="lead">You can now access the dashboard. Try to explore the site even more!</p>
  </div>
</div>
</body>
</html>


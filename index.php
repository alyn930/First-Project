<?php 
	session_start();
	if (isset($_SESSION['id']))
		{
			header("location:home.php");
		}
	include_once 'functions.php';
	include 'style.php';
	$username;
	$pass="";
	$mess="";
	if(isset($_POST['login']))
	{
		$user = trim($_POST["user"]);
		$pass = trim($_POST["pass"]);
		
		if($user != "" && $pass != "")
		{
			$users = login($user, $pass);
			echo $users["manager_username"];
			if($users["manager_username"] == $user && $users["manager_pass"] == $pass)
			{
				$_SESSION['id'] = $users["manager_id"];
				$_SESSION['Username'] = $users["manager_username"];
				$_SESSION['Password'] = $users["manager_pass"];
				$_SESSION['Firstname'] = $users["manager_fname"];
				$_SESSION['Lastname'] = $users["manager_lname"];
				header("location:home.php");
			}

			else
			{
				$mess = "Invalid Credentials!";
			}
		}
		else
		{
			$mess = "Please fill out all required fields!";
		}

	}
 ?>
<html>
<head>
	<title>Home</title>
</head>
<body style = "maergin:0;">
	<div class = "container-fluid">
		<center><div class = "col-lg-4 col-sm-12">
		<img src = "logo.png" style = "display:block;max-width:100%;height:auto">
			<?php if ($mess != "") {?> 
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
					  <?php echo $mess;?>
				</div>
			<?php } ?>

			<form method = "post">
				<div class="form-group">
					<input type="text" class="form-control" name="user" id="exampleInputEmail1" placeholder="Username">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Password">
				</div>
				<button type="submit" name = "login" class="btn btn-primary">Login</button>
			</form><br>
			<p>No account yet?&nbsp;<a href="#" class="card-link">Sign Up</a></p>
		</div></center>
		
		
	</div>
	<?php include 'js.php';?>
</body>

</html>
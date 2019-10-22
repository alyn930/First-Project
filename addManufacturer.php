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

	$compname = "";
	$compowner = "";
	$address = "";
	$telno = "";
	$dateApplied = "";
	$deliverer = "";
	$mess = "";

	if (isset($_POST["addMan"]))
	{
		$compname = trim(htmlentities($_POST["compname"]));
		$compowner = ucwords(trim(htmlentities($_POST["owner"])));
		$address = ucwords(trim(htmlentities($_POST["address"])));
		$telno = htmlentities(trim($_POST["contact"]));
		$dateApplied = htmlentities(trim($_POST["date"]));
		$deliverer = ucwords(htmlentities(trim($_POST["personnel"])));

		if ($compname == "" || $compowner == "" || $address == "" || $telno == "" || $dateApplied == "" || $deliverer== "")
				{
					$mess = "Please fill-out all important fields.";
				}

		else
				{
					create_manufacturer($compname,$compowner,$address,$telno,$dateApplied,$deliverer);
					header("location:manufacturers.php");
				}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<title>Add Manufacturers</title>
</head>
<body style = "margin: 0; background-color: white; !important">
	<div class = "container">

		<center>
			<div class = "col-lg-4 col-sm-12">
			<img src = "logo.png" style = "display:block;max-width:100%;height:auto">
			</div>
		</center>
			<h4 class="display-4">Add Manufacturer</h4>
		<?php if ($mess != "") {?> 
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
					  <?php echo $mess;?>
				</div>
			<?php } ?>
		<form method = "POST">
			<div class="row">
			  	<div class="col-sm-5 col-lg-4 alert alert-light">
			  		<input class = "form-control" type = "text" placeholder = "Company Name" name = "compname" >
			  	</div>
			 	<div class="col-sm-5 col-lg-4 alert alert-light">
			 		<input class = "form-control" type = "text" placeholder = "Company Owner" name = "owner" >
			 	</div>
			 </div>
			 <div class="row">
			  	<div class="col-sm-6 col-lg-6 alert alert-light">
			  		<input class = "form-control" type = "text" placeholder = "Address" name = "address" >
			  	</div>
			  	<br>
			  	<div class="col-sm-4 col-lg-4 alert alert-light">
			  		<input class = "form-control" type = "tel" maxlength = "7" placeholder = "Phone Number" name = "contact" >
			  	</div>
			</div>
			<div class="row">
			  	<div class="col-sm-4 col-lg-3 alert alert-light">
			  		<span>Date Applied</span>
			  		<input class = "form-control" type = "date" placeholder = "Date Applied" name = "date" >
			  	</div>
			  	<div class="col-sm-4 col-lg-6 alert alert-light">
			  	<br>
			  		<input class = "form-control" type = "text" placeholder = "Delivery Personnel" name = "personnel" >
			  	</div>
			</div>
			<div class="row">
				<div class="col-sm-4 col-lg-6 alert alert-light">
					<button class = "btn btn-primary" type = "submit" name = "addMan" >Add</button>
				</div>
			</div>
		</form>

	</div>
</body>
</html>

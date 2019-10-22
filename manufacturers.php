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
	$manufacturers = retrieve_manufacturer();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<title>Manufacturers</title>
</head>
<body style = "margin: 0;">
	<div class="jumbotron jumbotron-fluid container-fluid">
	  <div class="container">
	    <h4 class="display-4">Manufacturers</h4>
	    <p class="lead">Manage your delivery and manufacturer details.</p>
	  </div>
	</div>
	<div class = "container">

      <?php include 'search.php';?>
       &nbsp;<a href="addManufacturer.php" class="card-link">+ Add Manufacturer</a>
    </form>
		<div>
			<table class="table table-hover table-light">
			  <thead>
			    <tr>
			      <th>Company Name</th>
			      <th>Company Owner</th>
			      <th>Address</th>
			      <th></th>
			      <th>Telephone</th>
			      <th>Last Delivery</th>
			      <th>Delivery Personnel</th>
			      <th>Options</th>
			    </tr>
			  </thead>

			  <tbody>
			  <?php foreach($manufacturers as $m){
			  if($m['manstat'] == 1) { ?>
			    <tr>
			      <th><?php echo $m['manu_compname'];?></th>
			      <td><?php echo $m['manu_compowner'];?></td>
			      <td><?php echo $m['manu_address'];?><td>
			      <td><?php echo $m['manu_phonenum'];?></td>
			      <td><?php echo $m['manu_lastdelivery'];?></td>
			      <td><?php echo $m['manu_delpersonel'];?></td>
			      <td>
			      	<a href = "editManufacturer.php?manufacturer_id=<?php echo $m["manu_id"]?>"><button class = "btn btn-info" title = "Edit"><i class="material-icons">edit</i></button></a>
			      	<a href = "deleteMan.php?id=<?php echo $m['manu_id'];?>"><button class = "btn btn-danger"  title = "Delete"><i class="material-icons">delete</i></button></a>
			      </td>

			    </tr>
			  <?php }  
			  else {continue;}}
			  ?>
				
			  </tbody>
			</table>
					</div>
		</div>
</body>
</html>

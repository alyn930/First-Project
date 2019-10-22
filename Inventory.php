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
	$products = retrieve_product();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<title>Inventory</title>
</head>
<body style = "margin: 0;">
	<div class="jumbotron jumbotron-fluid container-fluid">
	  <div class="container">
	    <h4 class="display-4">Inventory</h4>
	    <p class="lead">View all the details of your products here.</p>
	  </div>
	</div>
	<div class = "container-fluid">	
	
      <?php include 'search.php';?>
      &nbsp;<a href="addInventory.php" class="card-link">+ Add Inventory Item</a>
    </form>	
	<div>
			<table class="table table-hover table-light">
			  <thead>
			    <tr>
			      <th>Bar Code</th>
			      <th>Product Name</th>
			      <th>Manufacturer</th>
			      <th></th>
			      <th>Quantity</th>
			      <th>Original Price</th>
			      <th>Retailing Price</th>
			      <th>Order Date</th>
			      <th>Received and Checked</th>
			      <th>Option</th>
			    </tr>
			  </thead>

			  <tbody>
			  <?php foreach($products as $p){ ?>
			    <tr>
			      <th><?php echo $p['prod_no'];?></th>
			      <td><?php echo $p['prod_name'];?></td>
			      <td><?php echo $p['manu_compname'];?><td>
			      <td><?php echo $p['inv_quantity'];?></td>
			      <td>&#8369;&nbsp;<?php echo $p['inv_origprice'];?></td>
			      <td>&#8369;&nbsp;<?php echo $p['inv_markup'];?></td>
			      <td><?php echo $p['prod_ordedate'];?></td>
			      <td><?php echo $p['manager_fname'] . " ". $p['manager_lname'];?></td>
			      <td>
			      		<a href = "editInventory.php?inventory_id=<?php echo $p['inv_code'];?>"><button class = "btn btn-info" title = "Edit"><i class="material-icons">edit</i></button></a>
			      		<a href = "deleteProduct.php?id=<?php echo $p['prod_no'];?>"><button class = "btn btn-danger"  title = "Delete"><i class="material-icons">delete</i></button></a>
			      </td>
			    </tr>
			  <?php } ?>
			  </tbody>
			</table>
					</div>
		</div>
</body>
</html>

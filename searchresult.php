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
	$keyword = $_GET["query"];
	$mnf = search_manufacturer($keyword);
	$products = search_inventory($keyword);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<title>Search Results</title>
</head>
<body style = "margin: 0;">
	<div class="jumbotron jumbotron-fluid container-fluid">
	  <div class="container">
	    <h4 class="display-4">Search Results</h4>
	    <p class="lead">Search results for '<?php echo $keyword;?>'</p>
	  </div>
	</div>	
	<div class = "container-fluid">
	<form class="form-inline">
      <?php include 'search.php';?>
    </form>	
		<div>

		<div class = "alert alert-dark"><span class="lead">Manufacturers</span></div>
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
			  <?php foreach($mnf as $m){
			  if($m['manstat'] == 1) { ?>
			    <tr>
			      <th><?php echo $m['manu_compname'];?></th>
			      <td><?php echo $m['manu_compowner'];?></td>
			      <td><?php echo $m['manu_address'];?><td>
			      <td><?php echo $m['manu_phonenum'];?></td>
			      <td><?php echo $m['manu_lastdelivery'];?></td>
			      <td><?php echo $m['manu_delpersonel'];?></td>
			      <td>
			      	<a href = "editManufacturer.php?manufacturer_id=<?php echo $m["manu_id"];?>"><button class = "btn btn-info" title = "Edit"><i class="material-icons">edit</i></button></a>
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

		<div class = "container-fluid">	
	<div>
	<div class = "alert alert-dark"><span class="lead">Inventories</span></div>
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

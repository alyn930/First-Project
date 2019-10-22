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
	<title>Products</title>
</head>
<body style = "margin: 0;">
	<div class="jumbotron jumbotron-fluid container-fluid">
	  <div class="container">
	    <h4 class="display-4">Products</h4>
	    <p class="lead">Find your products here.</p>
	  </div>
	</div>
	<div class = "container">
	<form class="form-inline" method = "get">
      <input class="form-control mr-sm-2" type="text" placeholder="Type keyword" aria-label="Search" name = "search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Go</button>



    </form>
    <?php if(!isset($_GET["submit"])){ ?>
		<div>
			<table class="table table-hover table-light">
			  <thead>
			    <tr>
			      <th>Bar Code</th>
			      <th>Product Name</th>
			      <th>Manufacturer</th>
			      <th></th>
			      <th>Category</th>
			      <th>Original Price</th>
			      <th>Retailing Price</th>
			    </tr>
			  </thead>

			  <tbody>
			  <?php foreach($products as $p){ ?>
			    <tr>
			      <th><?php echo $p['prod_no'];?></th>
			      <td><?php echo $p['prod_name'];?></td>
			      <td><?php echo $p['manu_compname'];?><td>
			      <td><?php echo $p['cat_desc'];?></td>
			      <td>&#8369;&nbsp;<?php echo $p['inv_origprice'];?></td>
			      <td>&#8369;&nbsp;<?php echo $p['inv_markup'];?></td>

			    </tr>
			  <?php } ?>
			  </tbody>
			</table>
		</div>
	<?php } 

	else {
			$searchtag = htmlentities(trim($_GET["search"]));
			$result = search_inventory($searchtag);

		?>
			<div>
			<table class="table table-hover table-light">
			  <thead>
			    <tr>
			      <th>Bar Code</th>
			      <th>Product Name</th>
			      <th>Manufacturer</th>
			      <th></th>
			      <th>Category</th>
			      <th>Original Price</th>
			      <th>Retailing Price</th>
			    </tr>
			  </thead>

			  <tbody>
			  <?php foreach($result as $r){ ?>
			    <tr>
			      <th><?php echo $r['prod_no'];?></th>
			      <td><?php echo $r['prod_name'];?></td>
			      <td><?php echo $r['manu_compname'];?><td>
			      <td><?php echo $r['cat_desc'];?></td>
			      <td>&#8369;&nbsp;<?php echo $r['inv_origprice'];?></td>
			      <td>&#8369;&nbsp;<?php echo $r['inv_markup'];?></td>

			    </tr>
			  <?php } ?>
			  </tbody>
			</table>
		</div>
	<?php } ?>
		</div>
</body>
</html>

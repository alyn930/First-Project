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
	$inventory_id = $_GET["inventory_id"];

	$category = retrieve_prod_category();
	$manu = retrieve_manufacturer();
	$inv = inventory_id_query($inventory_id);

	$itemcode = 0;
	$itemname = "";
	$itemCategory = "";
	$itemOrig = 0;
	$itemSelling = 0;
	$itemQuant = $inv["inv_quantity"];
	$itemMan = "";
	$manager = $_SESSION["id"];
	$date = "";
	$mess = "";

	if (isset($_POST["addInv"]))
	{
		$itemcode = trim(htmlentities($_POST["barcode"]));
		$itemname = ucwords(trim(htmlentities($_POST["item"])));
		$itemCategory = ucwords(trim(htmlentities($_POST["category"])));
		$itemOrig = htmlentities(trim($_POST["orig"]));
		$itemSelling = htmlentities(trim($_POST["selling"]));
		$itemQuant += ucwords(htmlentities(trim($_POST["quantity"])));
		$itemMan = ucwords(htmlentities(trim($_POST["manufacturer"])));
		$date = ucwords(htmlentities(trim($_POST["date"])));

		if ($itemcode == "" || $itemname == "" || $itemCategory == "" || $itemOrig == "" || $itemSelling == "" || $itemQuant== "" || $itemMan == "")
				{
					$mess = "Please fill-out all important fields.";
				}

		else
				{
					inventory_query_update($inventory_id, $itemcode, $itemname, $date, $itemCategory, $itemQuant, $itemOrig, $itemSelling, $manager, $itemMan);
					header("location:inventory.php");
				}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<title>Edit Inventory Item</title>
</head>
<body style = "margin: 0; background-color: white; !important">
	<div class = "container">
		<center>
			<div class = "col-lg-4 col-sm-12">
				<img src = "logo.png" style = "display:block;max-width:100%;height:auto">
			</div>
		</center>
		
		<h4 class="display-4">Edit Inventory Item</h4>
		
		<?php if ($mess != "") {?> 
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
					  <?php echo $mess;?>
				</div>
			<?php } ?>
		<form method = "POST">
		<div class = "container">
			<div class="row">
			  	<div class="col-sm-5 col-lg-6 col-md-6 alert alert-light">
			  		<input class = "form-control" type = "number" maxlength = "10" placeholder = "Item Barcode" name = "barcode" value = "<?php echo $inv["prod_no"];?>">
			  	</div>
			 	<div class="col-sm-5 col-lg-6 col-md-6 alert alert-light">
			 		<input class = "form-control" type = "text" placeholder = "Item Name" name = "item" value = "<?php echo $inv["prod_name"];?>">
			 	</div>
			 </div>
			 <div class="row">
			  	<div class="col-sm-5 col-lg-6 col-md-6 alert alert-light">
			  		<select name = "category" class = "form-control">
					<?php foreach($category as $c) {?>
						<option value = "<?php echo $c["cat_code"];?>"><?php echo $c["cat_desc"];?></option>
					<?php } ?>
					</select>
			  	</div>
			  	<br>
			  	<div class="input-group col-sm-5 col-lg-3 alert alert-light">
				  <span class="input-group-addon" id="basic-addon1">&#8369;</span>
			  		<input class = "form-control" type = "text" placeholder = "Original Price" name = "orig" value = "<?php echo $inv["inv_origprice"];?>">
			  	</div>
				<div class="input-group col-sm-5 col-lg-3 alert alert-light">
				  <span class="input-group-addon" id="basic-addon1">&#8369;</span>
				  <input class = "form-control" type = "text" placeholder = "Selling Price" name = "selling" value = "<?php echo $inv["inv_markup"];?>">
				 </div>
			</div>
			<div class="row">
				<div class="col-sm-4 col-lg-3 alert alert-light">
			  		<span>Quantity left:&nbsp;<strong><?php echo $inv["inv_quantity"];?></strong></span>
					<input class = "form-control" type = "number" placeholder = "Add Quantity" name = "quantity" value = "0">
			  	</div>
			  	<div class="col-sm-4 col-lg-3 alert alert-light">
			  		<span>Date Ordered</span>
			  		<input class = "form-control" type = "date" placeholder = "Date Ordered" name = "date" value = "<?php echo $inv["prod_ordedate"];?>">
			  	</div>
			  	<div class="col-sm-4 col-lg-6 alert alert-light">
			  	<span>Manufacturer</span>
			  		<select name = "manufacturer" class = "form-control">
					<?php foreach($manu as $m) {?>
						<option value = "<?php echo $m["manu_id"];?>"><?php echo $m["manu_compname"];?></option>
					<?php } ?>
					</select>
			  	</div>
			</div>
			<div class="row">
				<div class="col-sm-4 col-lg-6 alert alert-light">
					<button class = "btn btn-primary" type = "submit" name = "addInv" >Add</button>
				</div>
			</div>
			</div>
		</form>

	</div>
</body>
</html>

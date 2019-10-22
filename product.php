<?php 
	include_once 'func.php';
	$prodname="";
	$prodprice="";
	$description="";
	$orderdate="";
	$recievedby="";
	$Manufacturer="";
	$category="";
	$Manager="";
	$mess="";
	$mlist=manufacturer_list();
	$pclist=prod_category_list();
	$manlist=manager_list();

	if(isset($_POST["submit"]))
	{
		$prodname=trim(htmlentities($_POST["prodname"]));
		$prodprice=trim(htmlentities($_POST["prodprice"]));
		$description=trim(htmlentities($_POST["description"]));
		$orderdate=trim(htmlentities($_POST["orderdate"]));
		$recievedby=trim(htmlentities($_POST["recievedby"]));
		$Manufacturer=trim(htmlentities($_POST["Manufacturer"]));
		$category=trim(htmlentities($_POST["category"]));
		$Manager=trim(htmlentities($_POST["manager"]));
		if($prodname!="" && $prodprice!="" && $description!="" && $orderdate!="" && $recievedby!="" && $Manufacturer!="" && $category!="" && $Manager!="")
		{
		create_inventory($prodname,$prodprice,$description,$orderdate,$recievedby,$Manufacturer,$category,$Manager);
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Product</title>
</head>
<body>
<form method="POST">
	<label>Product Name:</label>
	<input type="text" name="prodname" placeholder="Product Name">
	<label>Product Price:</label>
	<input type="integer" name="prodprice" placeholder="Product Price">
	<label>Description</label>
	<textarea rows="4" cols="50" name="description">
		...Description Here...
	</textarea>
	<label>Order Date:</label>
	<input type="date" name="orderdate" placeholder="Order Date">
	<label>Received By:</label>
	<select name="Manufacturer">
		<option>--Select---</option>
<?php foreach ($mlist as $m ) {?>
		<option value="<?php echo m['manu_id'];?>"><?php echo m['manu_id'];?></option>
<?php	} ?>			
	</select>
	<select name="recievedby">
	<option>--Select---</option>
<?php foreach ($mlist as $m ) {?>
		<option value="<?php echo m['manu_delpersonel'];?>"><?php echo m['manu_delpersonel'];?></option>
<?php	} ?>
	</select>

	<label>Manufacturer</label>
	<label>Category:</label>
	<select name="category">
		<option>--Select---</option>
<?php foreach ($pclist as $pc ) {?>
		<option value="<?php echo pc['cat_code'];?>"><?php echo pc['cat_code'];?></option>
<?php	} ?>
	</select>
	<label>Manager:</label>
	<select name="manager">
		<option>--Select---</option>
<?php foreach ($manlist as $man ) {?>
		<option value="<?php echo man['manager_id'];?>"><?php echo man['manager_id'];?></option>
<?php	} ?>
	</select>
	<input type="submit" name="submit" value="submit">
</form>
</body>
</html>
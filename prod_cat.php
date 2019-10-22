<?php 
	include_once 'func.php';
	$cat_desc="";
	$mess="";
	if(isset($_POST["submit"]))
	{
		$cat_desc=trim(htmlentities($_POST["cat_desc"]));
		if(!($cat_desc==""))
		{
			create_prod_category($cat_desc);
			
		}
		else
		{
			$mess="All Fields are required";
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
</head>
<body>
<form method="post">
<label>Category :</label>
<input type="text" name="cat_desc" placeholder="Product Category">
<input type="submit" name="submit" value="submit">
</form>
</body>
</html>
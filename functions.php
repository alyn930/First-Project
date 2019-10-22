<?php
	
	function db()
	{
		return new PDO("mysql:host=localhost; dbname=inventory_sales;", "root", "");
	}

	function login($username, $password)
	{
		$db = db();
		$sql = "SELECT * FROM manager WHERE manager_username = ? AND manager_pass = ?";
		$s = $db->prepare($sql);
		$s->execute(array($username, $password));
		$user = $s->fetch();
		$db = null;
		return $user;
	}
	function create_manager($fname,$lname,$pass)
	{
		$db = db();
		$sql = "INSERT INTO manager(manager_fname,manager_lname,manager_pass) VALUES(?,?,?)";
		$s = $db->prepare($sql);
		$s->execute(array($fname,$lname,$pass));
		$db = null;
	}
	function retrive_manager()
	{
		$db = db();
		$sql = "SELECT * FROM manager";
		$s = $db->query($sql)->fetchAll();
		$db = null;
		return $s;
	}
	function manager_query_update($id,$fname,$lname, $pass)
	{
		$db = db();
		$sql = "UPDATE manager SET manager_fname = ?,manager_lname = ?, manager_pass = ? WHERE manager_id = ?";		
		$s = $db->prepare($sql);
		$s->execute(array($fname,$lname,$pass,$id));
		$db = null;
	}
	
	function manager_id_query($id)
	{
		$db = db();
		$sql = "SELECT * FROM manager WHERE manager_id = ?";
		$s = $db->prepare($sql);
		$s->execute(array($id));
		$user = $s->fetch();
		$db = null;
		return $user;
	}
	function delete_manager($id)
	{
		$db = db();
		$sql = "DELETE FROM manager WHERE manager_id = ?";
		$s = $db->prepare($sql);
		$s->execute(array($id));
		$db = null;
	}
	function search_manager($keyword){
		$db = db();
		$sql = "SELECT * FROM manager WHERE manager_fname like ? or manager_lname like ? or manager_id like ?";
		$s = $db->prepare($sql);
		$s->execute(array("%".$keyword."%", "%".$keyword."%", "%".$keyword."%"));
		$user = $s->fetch();
		$db = null;
		return $user;
	}
//**********************end of manager**********************************
	function create_prod_category($desc)
	{
		$db = db();
		$sql = "INSERT INTO prod_category(cat_desc) VALUES(?)";
		$s = $db->prepare($sql);
		$s->execute(array($desc));
		$db = null;
	}
	function retrieve_prod_category()
	{
		$db = db();
		$sql = "SELECT * FROM prod_category";
		$s = $db->query($sql)->fetchAll();
		$db = null;
		return $s;
	}
	function prod_category_query_update($id,$desc)
	{
		$db = db();
		$sql = "UPDATE prod_category SET  cat_desc = ? WHERE cat_code = ?";		
		$s = $db->prepare($sql);
		$s->execute(array($desc,$id));
		$db = null;
	}
	
	function prod_category_id_query($id)
	{
		$db = db();
		$sql = "SELECT * FROM prod_category WHERE cat_code = ?";
		$s = $db->prepare($sql);
		$s->execute(array($id));
		$user = $s->fetch();
		$db = null;
		return $user;
	}
	function delete_prod_category($id)
	{
		$db = db();
		$sql = "DELETE FROM prod_category WHERE cat_code = ?";
		$s = $db->prepare($sql);
		$s->execute(array($id));
		$db = null;
	}
	function search_prod($keyword){
		$db = db();
		$sql = "SELECT manager.*, manufacturer.*, prod_category.*, inventory.* FROM inventory 
				INNER JOIN manager ON manager.manager_id = inventory.manager_id
				INNER JOIN manufacturer ON manufacturer.manu_id = inventory.manu_id
				INNER JOIN prod_category ON prod_category.cat_code = inventory.cat_code WHERE 
				inventory.prod_code = ? 
				OR inventory.prod_name = ? 
				OR manufacturer.manu_compname = ? 
				OR prod_category.cat_desc = ?
				OR inventory.inv_origprice = ?
				OR inventory.inv_markup = ?";
		$s = $db->prepare($sql);
		$s->execute(array($keyword, $keyword, $keyword, $keyword, $keyword, $keyword));
		$user = $s->fetchAll();
		$db = null;
		return $user;
	}
//**********************end of prod_catgory**********************************
	function create_manufacturer($compname,$compowner,$address,$phonenum,$lastdelivery,$delpersonel)
	{
		$db = db();
		$sql = "INSERT INTO manufacturer(manu_compname,manu_compowner,manu_address,manu_phonenum,manu_lastdelivery,manu_delpersonel, manstat) VALUES(?,?,?,?,?,?, 1)";
		$s = $db->prepare($sql);
		$s->execute(array($compname,$compowner,$address,$phonenum,$lastdelivery,$delpersonel));
		$db = null;
	}// naay error diri dapita
	function retrieve_manufacturer()
	{
		$db = db();
		$sql = "SELECT * FROM manufacturer";
		$s = $db->query($sql)->fetchAll();
		$db = null;
		return $s;
	}
	function manufacturer_query_update($id,$compname,$compowner,$address,$phonenum,$lastdelivery,$delpersonel)
	{
		$db = db();
		$sql = "UPDATE manufacturer SET  manu_compname = ? ,manu_compowner = ? ,manu_address = ? ,manu_phonenum = ? ,manu_lastdelivery = ? ,manu_delpersonel = ?  WHERE manu_id = ?";		
		$s = $db->prepare($sql);
		$s->execute(array($compname,$compowner,$address,$phonenum,$lastdelivery,$delpersonel,$id));
		$db = null;
	}//////// feel nako naay error diri
	
	function manufacturer_id_query($id)
	{
		$db = db();
		$sql = "SELECT * FROM manufacturer WHERE manu_id = ?";
		$s = $db->prepare($sql);
		$s->execute(array($id));
		$user = $s->fetch();
		$db = null;
		return $user;
	}
	function delete_manufacturer($id)
	{
		$db = db();
		$sql = "UPDATE manufacturer SET manstat = 0 WHERE manu_id = ?";
		$s = $db->prepare($sql);
		$s->execute(array($id));
		$db = null;
	}
	function search_manufacturer($keyword){
		$db = db();
		$sql = "SELECT * FROM manufacturer WHERE manu_compname like ? OR manu_compowner like ? OR manu_address like ? OR manu_phonenum like ? OR manu_lastdelivery like ? OR manu_delpersonel like ? OR manu_id like ?";
		$s = $db->prepare($sql);
		$s->execute(array("%".$keyword."%", "%".$keyword."%", "%".$keyword."%", "%".$keyword."%", "%".$keyword."%", "%".$keyword."%", "%".$keyword."%"));
		$user = $s->fetchAll();
		$db = null;
		return $user;
	}//habwa ni diri
//**********************end of manufacturer**********************************
	function create_inventory($code, $name, $date, $category, $quantity, $orig, $markup, $manager, $manufacturer)
	{
		$db = db();
		$sql = "INSERT INTO inventory(prod_no, prod_name, prod_ordedate, cat_code, inv_quantity, inv_origprice, inv_markup, manager_id, manu_id, status) VALUES(?,?,?,?,?,?,?,?,?,?)";
		$s = $db->prepare($sql);
		$s->execute(array($code, $name, $date, $category, $quantity, $orig, $markup, $manager, $manufacturer, 1));
		$db = null;
	}// naay error diri dapita
	function retrive_inventory()
	{
		$db = db();
		$sql = "SELECT * FROM inventory";
		$s = $db->query($sql)->fetchAll();
		$db = null;
		return $s;
	}
	function inventory_query_update($id, $code, $name, $date, $category, $quantity, $orig, $markup, $manager, $manufacturer)
	{
		$db = db();
		$sql = "UPDATE inventory SET  prod_no = ?, prod_name = ?, prod_ordedate = ?, cat_code = ?, inv_quantity = ?, inv_origprice = ?, inv_markup = ?, manager_id = ?, manu_id = ?, status = 1 WHERE inv_code = ?";		
		$s = $db->prepare($sql);
		$s->execute(array($code, $name, $date, $category, $quantity, $orig, $markup, $manager, $manufacturer, $id));
		$db = null;
	}//////// feel nako naay error diri
	
	function inventory_id_query($id)
	{
		$db = db();
		$sql = "SELECT * FROM inventory WHERE inv_code = ?";
		$s = $db->prepare($sql);
		$s->execute(array($id));
		$user = $s->fetch();
		$db = null;
		return $user;
	}
	function delete_inventory($id)
	{
		$db = db();
		$sql = "UPDATE inventory SET status = 0 WHERE prod_no = ?";
		$s = $db->prepare($sql);
		$s->execute(array($id));
		$db = null;
	}
	function search_inventory($keyword)
	{
		$db = db();
		$sql = "SELECT manager.*, manufacturer.*, prod_category.*, inventory.* FROM inventory 
				INNER JOIN manager ON manager.manager_id = inventory.manager_id
				INNER JOIN manufacturer ON manufacturer.manu_id = inventory.manu_id
				INNER JOIN prod_category ON prod_category.cat_code = inventory.cat_code 
				WHERE (inventory.prod_no like ? 
				OR inventory.prod_name like ? 
				OR inventory.prod_ordedate like ? 
				OR prod_category.cat_desc like ? 
				OR inventory.inv_quantity like ? 
				OR inventory.inv_origprice like ? 
				OR inventory.inv_markup like ? 
				OR manager.manager_lname like ? 
				OR manager.manager_fname like ?
				OR manufacturer.manu_id like ? 
				OR inventory.inv_code like ?) AND inventory.status = 1";
		$s = $db->prepare($sql);
		$s->execute(array("%".$keyword."%", "%".$keyword."%", "%".$keyword."%", "%".$keyword."%", "%".$keyword."%", "%".$keyword."%", "%".$keyword."%", "%".$keyword."%", "%".$keyword."%", "%".$keyword."%", "%".$keyword."%"));
		$user = $s->fetchAll();
		$db = null;
		return $user;
	}
	function retrieve_product()
	{
		$db = db();
		$sql = "SELECT manager.*, manufacturer.*, prod_category.*, inventory.* FROM inventory 
				INNER JOIN manager ON manager.manager_id = inventory.manager_id
				INNER JOIN manufacturer ON manufacturer.manu_id = inventory.manu_id
				INNER JOIN prod_category ON prod_category.cat_code = inventory.cat_code WHERE
				inventory.status = 1";
		$s = $db->query($sql)->fetchAll();
		$db = null;
		return $s;
	}
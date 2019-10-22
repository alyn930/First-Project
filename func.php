<?php
	
	function db()
	{
		return new PDO("mysql:host=localhost; dbname=inventory_sales;", "root", "");
	}

	function create_manager($fname,$lname,$pass)
	{
		$db = db();
		$sql = "INSERT INTO manager(manager_fname,manager_lname,manager_pass) VALUES(?,?,?)";
		$s = $db->prepare($sql);
		$s->execute(array($fname,$lname,$pass));
		$db = null;
	}
	function manager_list()
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
	function prod_category_list()
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
	function search_prod_category($keyword){
		$db = db();
		$sql = "SELECT * FROM prod_category WHERE cat_desc like ?  or cat_code like ?";
		$s = $db->prepare($sql);
		$s->execute(array("%".$keyword."%", "%".$keyword."%"));
		$user = $s->fetch();
		$db = null;
		return $user;
	}
//**********************end of prod_catgory**********************************
	function create_manufacturer($compname,$compowner,$address,$phonenum,$lastdelivery,$delpersonel)
	{
		$db = db();
		$sql = "INSERT INTO manufacturer(manu_compname,manu_compowner,manu_address,manu_phonenum,manu_lastdelivery,manu_delpersonel) VALUES(?,?,?,?,?,?)";
		$s = $db->prepare($sql);
		$s->execute(array($compname,$compowner,$address,$phonenum,$lastdelivery,$delpersonel));
		$db = null;
	}// naay error diri dapita
	function manufacturer_list()
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
		$sql = "DELETE FROM manufacturer WHERE manu_id = ?";
		$s = $db->prepare($sql);
		$s->execute(array($id));
		$db = null;
	}
	function search_manufacturer($keyword){
		$db = db();
		$sql = "SELECT * FROM manufacturer WHERE manu_compname like ? ,manu_compowner like ? ,manu_address like ? ,manu_phonenum like ? ,manu_lastdelivery like ? ,manu_delpersonel like ?  or inv_code like ?";
		$s = $db->prepare($sql);
		$s->execute(array("%".$keyword."%","%".$keyword."%","%".$keyword."%","%".$keyword."%","%".$keyword."%","%".$keyword."%", "%".$keyword."%"));
		$user = $s->fetch();
		$db = null;
		return $user;
	}//habwa ni diri
//**********************end of manufacturer**********************************
	function create_inventory($prod_no,$cat_code,$inv_quantity,$inv_origprice,$inv_markup,$manager_id)
	{
		$db = db();
		$sql = "INSERT INTO inventory(prod_no,cat_code,	inv_quantity,inv_origprice,	inv_markup,	manager_id) VALUES(?,?,?,?,?,?)";
		$s = $db->prepare($sql);
		$s->execute(array($prod_no,$cat_code,$inv_quantity,$inv_origprice,$inv_markup,$manager_id));
		$db = null;
	}// naay error diri dapita
	function inventory_list()
	{
		$db = db();
		$sql = "SELECT * FROM inventory";
		$s = $db->query($sql)->fetchAll();
		$db = null;
		return $s;
	}
	function inventory_query_update($id,$prod_no,$cat_code,$inv_quantity,$inv_origprice,$inv_markup,$manager_id)
	{
		$db = db();
		$sql = "UPDATE inventory SET  prod_no = ? ,cat_code = ? ,inv_quantity = ? ,inv_origprice = ? ,inv_markup = ? ,manager_id = ?  WHERE inv_code = ?";		
		$s = $db->prepare($sql);
		$s->execute(array($prod_no,$cat_code,$inv_quantity,$inv_origprice,$inv_markup,$manager_id,$id));
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
		$sql = "DELETE FROM inventory WHERE inv_code = ?";
		$s = $db->prepare($sql);
		$s->execute(array($id));
		$db = null;
	}
	function search_inventory($keyword){
		$db = db();
		$sql = "SELECT * FROM inventory WHERE prod_no like ? ,cat_code like ? ,inv_quantity like ? ,inv_origprice like ? ,inv_markup like ? ,manager_id like ?  or inv_code like ?";
		$s = $db->prepare($sql);
		$s->execute(array("%".$keyword."%","%".$keyword."%","%".$keyword."%","%".$keyword."%","%".$keyword."%","%".$keyword."%", "%".$keyword."%"));
		$user = $s->fetch();
		$db = null;
		return $user;
	}
//**********************end of inventory**********************************
	function create_product($prod_no,$cat_code,$inv_quantity,$inv_origprice,$inv_markup,$manager_id)
	{
		$db = db();
		$sql = "INSERT INTO inventory(prod_no,cat_code,	inv_quantity,inv_origprice,	inv_markup,	manager_id) VALUES(?,?,?,?,?,?)";
		$s = $db->prepare($sql);
		$s->execute(array($prod_no,$cat_code,$inv_quantity,$inv_origprice,$inv_markup,$manager_id));
		$db = null;
	}// naay error diri dapita
	function product_list()
	{
		$db = db();
		$sql = "SELECT * FROM product";
		$s = $db->query($sql)->fetchAll();
		$db = null;
		return $s;
	}
	function product_query_update($id,$prod_no,$cat_code,$inv_quantity,$inv_origprice,$inv_markup,$manager_id)
	{
		$db = db();
		$sql = "UPDATE inventory SET  prod_no = ? ,cat_code = ? ,inv_quantity = ? ,inv_origprice = ? ,inv_markup = ? ,manager_id = ?  WHERE inv_code = ?";		
		$s = $db->prepare($sql);
		$s->execute(array($prod_no,$cat_code,$inv_quantity,$inv_origprice,$inv_markup,$manager_id,$id));
		$db = null;
	}//////// feel nako naay error diri
	
	function product_id_query($id)
	{
		$db = db();
		$sql = "SELECT * FROM inventory WHERE inv_code = ?";
		$s = $db->prepare($sql);
		$s->execute(array($id));
		$user = $s->fetch();
		$db = null;
		return $user;
	}
	function delete_product($id)
	{
		$db = db();
		$sql = "DELETE FROM inventory WHERE inv_code = ?";
		$s = $db->prepare($sql);
		$s->execute(array($id));
		$db = null;
	}
	function search_product($keyword){
		$db = db();
		$sql = "SELECT * FROM inventory WHERE prod_no like ? ,cat_code like ? ,inv_quantity like ? ,inv_origprice like ? ,inv_markup like ? ,manager_id like ?  or inv_code like ?";
		$s = $db->prepare($sql);
		$s->execute(array("%".$keyword."%","%".$keyword."%","%".$keyword."%","%".$keyword."%","%".$keyword."%","%".$keyword."%", "%".$keyword."%"));
		$user = $s->fetch();
		$db = null;
		return $user;
	}
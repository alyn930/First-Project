<?php
	session_start();
	if(!isset($_SESSION['id']))
		{
			header("location:login.php");
		}
		
	include 'functions.php';
	$id = $_GET['id'];
	delete_inventory($id);
	header("location:inventory.php");
?>
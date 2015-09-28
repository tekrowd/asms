<?php
	require_once ($_SERVER['DOCUMENT_ROOT'] . "/config/config.php");
	require_once ($_SERVER['DOCUMENT_ROOT'] . "/classes/classes.php");
	
	$sql = new Mysql();
	$con = $sql->dbConnect();
	
	$id = '';
	$id = $_POST['id'];
			
	$query = "SELECT * FROM TECHNICIANS WHERE ID = '" . $id . "'";
	
	$confirm = $sql->selectFreeRun($query);
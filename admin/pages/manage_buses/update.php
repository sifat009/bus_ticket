<?php
	include "../../../config/db.php";
	include "../../../functions/print.php";
	$id = $_GET['id'];
	$active = $_GET['active'];
	$active = $active ? 0 : 1;
	if(isset($id)){
		$q = "UPDATE buses SET active = $active WHERE id = $id";
		$s = $db->query($q);
		header("location: view_bus.php");
	}
			
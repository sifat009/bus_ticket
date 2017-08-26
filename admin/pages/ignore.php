<?php
	include "../../config/db.php";
	include "../../functions/print.php";
	$t_id = $_REQUEST['t_id'];
	$p_id = $_REQUEST['p_id'];
	$q = "UPDATE tickets SET action = 0 WHERE id = $t_id AND passenger_id = $p_id";
	$q1 = "UPDATE seats SET available = 1 WHERE  passenger_id = $p_id";
	
	$st = $db->query($q);
	$st1 = $db->query($q1);
	header("location: pending_tickets.php");
<?php
	
	$host = 'localhost';
	$dbName = 'bus_ticket';
	$user = 'root';
	$password = '';
	
	try{
		$db = new PDO("mysql:dbname=$dbName;host=$host", $user,$password);
	} catch(PDOException $e) {
		echo "Connection Error ". $e->getMeaasage();
	}
	


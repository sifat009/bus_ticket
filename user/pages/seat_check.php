<?php

	include "../../functions/print.php";
	session_start();
	$seat_array = json_decode($_REQUEST['store_seats']);
	
	$seats_array = [];
	$seats = [];
	foreach($seat_array as $k => $v){
		@$seats_array[$v]++;
	}
	foreach($seats_array as $k => $v){
		if(($v % 2) != 0)
			$seats[] = $k;
	}
	
	$_SESSION['seats'] = $seats;
	header("location: confirm_ticket.php");
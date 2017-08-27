<?php
	include "../../config/db.php";
	include "../../functions/print.php";	
	session_start();
	
	$bus_id = $_SESSION['bus_id'];
	$q = "SELECT buses.id, routes.direction, CONVERT(buses.date, date) as date, buses.time, buses.total_seats
			FROM buses JOIN routes ON (buses.route_id = routes.id) HAVING (buses.id = $bus_id)";
	$st = $db->prepare($q);
	$st->execute(array( $bus_id )) or die("Connection error");
	$r = $st->fetch(PDO::FETCH_ASSOC);
	if(isset($_REQUEST['submit'])) {
		$_SESSION['passenger_name'] = $_REQUEST['name'];
		$_SESSION['mobile_number'] = $_REQUEST['number'];
		$_SESSION['start_place'] = $_REQUEST['start_place'];
		$_SESSION['end_place'] = $_REQUEST['end_place'];
		header("location: transection_id.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ticket</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/style.css" >

</head>
	
<body>
	<div class="header_area">
		<!-- navbar-->
		<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
					<a class="navbar-brand" href="../../index.php"><small><b>Get </b></small><strong class="text-primary">Ticket</strong></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="../../index.php">Home</a></li>
<!--
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
-->
            <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<?= $_SESSION['user_name'] ?> <span class="caret"></span>
							</a>
              <ul class="dropdown-menu">
                <?php if(isset($_SESSION['mobile_number'])): ?>
                		<li><a href="my_tickets.php">My Tickets</a></li>
                <?php endif; ?>
                <li><a href="../../logout.php">Log-out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	</div>
	<div class="content_area">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h3><strong>Confirm your Ticket</strong></h3>
				</div>
				<div class="details col-md-12">
					<table class="confirm_top_info">
							<tr>
								<td>Bus ID</td>
								<td>:</td>
								<td><?= $r['id'] ?></td>
							</tr>
							<tr>
								<td>Route</td>
								<td>:</td>
								<td><?= $r['direction'] ?></td>
							</tr>
							<tr>
								<td>Date</td>
								<td>:</td>
								<td><?= $r['date'] ?></td>
							</tr>
							<tr>
								<td>Time</td>
								<td>:</td>
								<td><?= $r['time'] ?></td>
							</tr>
							<tr>
								<td>Total Seats</td>
								<td>:</td>
								<td><?= $r['total_seats'] ?></td>
							</tr>
						</table>
				</div>
				<div class="col-md-10 col-md-offset-1 main_content_area">
					<form action="" method="post">
						<div class="form-group">
							<label for="name">Passenger's name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name" required >
						</div>
						<div class="form-group">
							<label for="number">Passenger's Mobile Number</label>
							<input type="text" class="form-control" name="number"  id="number" placeholder="Enter your Number" required >
						</div>
						<div class="form-group">
							<label for="start_place">Start Place</label>
							<input type="text" class="form-control" name="start_place" id="start_place" placeholder="Start Place" required >
						</div>
						<div class="form-group">
							<label for="end_place">Depart Place</label>
							<input type="text" class="form-control" name="end_place"  id="end_place" placeholder="Depart Place" required>
						</div>
						<input type="submit" name="submit" class="btn btn-success btn-block" value="Confirm"  >
					</form>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer_area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p class="text-center"> &copy; All right reserved.</p>
				</div>
			</div>
		</div>
	</footer>
	
	
	
<!-- jQuery 2.2.3 -->
<script src="../js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../js/bootstrap.min.js"></script>
<!--jquery ui -->
<script src="../js/jquery-ui.min.js"></script>
<!--main js-->
<script src="../js/main.js"></script>

</body>
</html>

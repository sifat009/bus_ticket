<?php
	include "../../config/db.php";
	include "../../functions/print.php";	
	//include "check.php";	
	session_start();
//	show($_SESSION);
	$passenger_id = [];
	$store = [];
	$seats;
	$mobile_number = $_SESSION['mobile_number'];
	$q = "SELECT id FROM passengers WHERE mobile_number = $mobile_number";
	$s = $db->query($q);
	foreach($s as $p_id){
		$passenger_id[] = $p_id['id'];
	}

	if($s){
		$q = "SELECT tickets.id as ticket_id, buses.id as bus_id, routes.direction, CONVERT( buses.date, date ) as date, buses.time, tickets.action, passengers.id as passengers_id, buses.price FROM tickets
				JOIN passengers ON (passengers.id = tickets.passenger_id)
				JOIN buses ON ( buses.id = tickets.bus_id )
				JOIN routes ON ( routes.id = buses.route_id )
				HAVING (passengers.id = ? AND tickets.action != 0)";
		$st = $db->prepare($q);
		foreach($passenger_id as $p){
			$st->execute(array( $p )) or die("Connection error");	
			$store[] = $st->fetch(PDO::FETCH_ASSOC);
		}
		
		$qu = "SELECT * FROM seats WHERE passenger_id = ?";
		$s = $db->prepare($qu);
		foreach($passenger_id as $p_id){
			$s->execute(array( $p_id )) or die("Error");
			$result = $s->fetchAll(PDO::FETCH_ASSOC);
			foreach( $result as $r ){
				$seats[$r['passenger_id']][] = $r['seat_number'];
			}
		}
//		for($i = 0; $i < count($store); $i++)
//			show(count($store[$i]));
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
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<?= $_SESSION['user_name'] ?> <span class="caret"></span>
							</a>
              <ul class="dropdown-menu">
                <li><a href="my_tickets.php">My Tickets</a></li>
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
					<h3><strong>Tickets Purchased By you</strong></h3>
				</div>
				<div class="col-md-10 col-md-offset-1 main_content_area">
					<div class="table-responsive">
							<table class="table table-striped table-bordered text-center ">
								<thead>
									<tr>
										<th>Ticket Number</th>
										<th>Route</th>
										<th>Date</th>
										<th>Time</th>
										<th>Seats</th>
										<th>Cost</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php for($i = 0; $i < count($store); $i++ ): ?>
										<?php if($store[$i] != NULL ): ?>
										<tr>
											<td><?= $store[$i]['ticket_id'] ?></td>
											<td><?= $store[$i]['direction'] ?></td>
											<td><?= $store[$i]['date'] ?></td>
											<td><?= $store[$i]['time'] ?></td>
											<td>
												<?php foreach( $seats[$store[$i]['passengers_id']] as $seat ): ?>
													<?= $seat ?>&nbsp;
												<?php endforeach; ?>
											</td>
											<td>
												<?= $store[$i]['price'] * count($seats[$store[$i]['passengers_id']]) ?>
											</td>
											<td>
											<?php if( $store[$i]['action'] == 1 ): ?>
												<a class="btn btn-success">Print Ticket</a>
											<?php else: ?>
												<a class="btn btn-warning">Request Pending</a>
											<?php endif; ?>
											</td>
										</tr>
										<?php endif; ?>
									<?php endfor; ?>
								</tbody>
							</table>
						</div>
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

<?php
	include "../../config/db.php";
	include "../../functions/print.php";	
	session_start();
	$bus_id = $_REQUEST['bus_id'];
	$_SESSION['bus_id'] = $bus_id;

	$q = "SELECT buses.id, routes.direction, CONVERT(buses.date, date) as date, buses.time, buses.total_seats
			FROM buses JOIN routes ON (buses.route_id = routes.id) HAVING (buses.id = $bus_id)";
	$st = $db->prepare($q);
	$st->execute(array( $bus_id )) or die("Connection error");
	$r = $st->fetch(PDO::FETCH_ASSOC);
	if($r){
		$q = "SELECT id, seat_number, available FROM seats WHERE seats.bus_id = $bus_id";
		$st = $db->prepare($q);
		$st->execute(array( $bus_id )) or die("Connection error");
		$seats = $st->fetchAll(PDO::FETCH_ASSOC); 
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
							<?php if(count($_SESSION)): ?>
								<?= $_SESSION['user_name'] ?>
							<?php else: ?>
								Please log-in
							<?php endif; ?>
							 <span class="caret"></span>
							</a>
              <ul class="dropdown-menu">
                <?php if(count($_SESSION)): ?>
                <?php if(isset($_SESSION['mobile_number'])): ?>
                		<li><a href="my_tickets.php">My Tickets</a></li>
                <?php endif; ?>
                <li><a href="../../logout.php">Log-out</a></li>
                <?php endif; ?>
                
                <?php if(!count($_SESSION)): ?>
                <li><a href="../../login.php">Log-in</a></li>
                <li><a href="../../sign_up.php">Register</a></li>
                <?php endif; ?>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	</div>
	<!-- main  content area -->
	<div class="content_area">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h3><strong>Available seats for your selected Bus</strong></h3>
				</div>
<!--				<div class="col-md-12 select_top">-->
					<div class="col-md-8">
						<table class="table table-hover no_border">
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
<!--
					<div class="col-md-4 ">
						<p>Select Seats and press Next</p>
						<a href="confirm_ticket.php" class="btn btn-success btn-lg btn-block">Next</a>
					</div>
-->
<!--				</div>-->
				<!-- select seats -->
				<div class=" col-md-10 col-md-offset-1 seats">
				<form action="seat_check.php" method="post" >
					<table class="table no_border">
						<?php for($i = 0; $i < (count($seats)/3); $i++ ): ?>
						<tr>
							<td>
								<?php if($seats[$i]['available'] == 1): ?>
									<input type="button" class="btn btn-default btn-sm btn-block"
										value = "<?= $seats[$i]['seat_number'] ?>"
									/>
								<?php elseif($seats[$i]['available'] == 0): ?>
									<input type="button" class="btn btn-danger btn-sm btn-block"
										value = "<?= $seats[$i]['seat_number'] ?> SOLD"
									/>
								<?php else: ?>
									<input type="button" class="btn btn-warning btn-sm btn-block"
										value ="<?= $seats[$i]['seat_number'] ?> PENDING"
									/>
								<?php endif; ?>
							</td>
							<td>
								<?php if($seats[$i + 10]['available'] == 1): ?>
									<input type="button" class="btn btn-default btn-sm btn-block"
										value = "<?= $seats[$i + 10]['seat_number'] ?>"
									/>
								<?php elseif($seats[$i + 10]['available'] == 0): ?>
									<input type="button" class="btn btn-danger btn-sm btn-block"
										value = "<?= $seats[$i + 10]['seat_number'] ?> SOLD"
									/>
								<?php else: ?>
									<input type="button" class="btn btn-warning btn-sm btn-block"
										value ="<?= $seats[$i + 10]['seat_number'] ?> PENDING"
									/>
								<?php endif; ?>
							</td>
							<td>
								<?php if($seats[$i + 20]['available'] == 1): ?>
									<input type="button" class="btn btn-default btn-sm btn-block"
										value = "<?= $seats[$i + 20]['seat_number'] ?>"
									/>
								<?php elseif($seats[$i + 20]['available'] == 0): ?>
									<input type="button" class="btn btn-danger btn-sm btn-block"
										value = "<?= $seats[$i + 20]['seat_number'] ?> SOLD"
									/>
								<?php else: ?>
									<input type="button" class="btn btn-warning btn-sm btn-block"
										value ="<?= $seats[$i + 20]['seat_number'] ?> PENDING"
									/>
								<?php endif; ?>
							</td>
						</tr>
						<?php endfor; ?>
					</table>
					<input id="store_seats" type="hidden" name="store_seats" value="" />
					<input type="submit" value="NEXT" name="submit" class="btn btn-success btn-lg btn-block" >
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
<!--main js-->
<!--<script src="../js/main.js"></script>-->
<script>
$('document').ready(function() {
	var storSeats = $("#store_seats");
	var seats = $(".seats table input");
	var array = [];
	seats.click(function(){
		$(this).toggleClass("btn-success");
		var value = $(this).val();
		array.push(value);
		storSeats.val(JSON.stringify(array));
	});
});
</script>
</body>
</html>

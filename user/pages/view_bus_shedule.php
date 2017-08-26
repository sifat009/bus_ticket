<?php
	include "../../config/db.php";
	include "../../functions/print.php";	
	//include "check.php";	
	session_start();
	
	$choosed_date = $_REQUEST['date'];
	$direction = $_REQUEST['route'];
	$current_date = date("m/d/Y");
	if( $choosed_date >= $current_date ){
		$q = "SELECT buses.id, routes.direction, CONVERT(date, date) as date, buses.time, buses.total_seats, buses.active,
			  SUM( CASE seats.available WHEN 1 THEN 1 ELSE null END )
			  as available_seats FROM buses
			  JOIN routes ON (buses.route_id = routes.id) 
			  JOIN seats ON (buses.id = seats.bus_id) GROUP BY buses.id
			  HAVING ((routes.direction = '$direction') AND (buses.active = 1)) ";
		$stmt = $db->query($q);	
		
	} else{
		$msg = "Not Available buses for choosed date";
		header("location: select_date.php?msg=$msg");
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
								please log-in
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
	<div class="content_area">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h3><strong>Available Buses for you</strong></h3>
				</div>
				<div class="col-md-10 col-md-offset-1 main_content_area">
					<div class="table-responsive">
							<table class="table table-striped table-bordered text-center ">
								<thead>
									<tr>
										<th>Bus#</th>
										<th>Route</th>
										<th>Date</th>
										<th>Time</th>
										<th>Total Seats</th>
										<th>booked Seats</th>
										<th>Available Seats</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php if($stmt): ?>
										<?php foreach($stmt as $row): ?>
										<tr>
											<td><?= $row['id'] ?></td>
											<td><?= $row['direction'] ?></td>
											<td><?= $row['date'] ?></td>
											<td><?= $row['time'] ?></td>
											<td><?= $row['total_seats'] ?></td>
											<td><?= $row['total_seats'] - $row['available_seats'] ?></td>
											<td><?= $row['available_seats'] ?></td>
											
											<td>
												<?php if(!count($_SESSION)): ?>
													<a href="../../login.php" class="btn btn-warning">Log-in to reserve seats</a>
												<?php else: ?>	
													<a  href="reserve_seats.php?bus_id=<?= $row['id'] ?>" class="btn btn-success">Reserve Seats</a>
												<?php endif; ?>
											</td>
											
										</tr>
										<?php endforeach; ?>
									<?php endif; ?>
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
<!--main js-->
<script src="../js/main.js"></script>
</body>
</html>

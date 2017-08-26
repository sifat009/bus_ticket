<?php
	include "../../config/db.php";
	include "../../functions/print.php";	
	session_start();
	$name = $_SESSION['passenger_name'];
	$mobile_number = $_SESSION['mobile_number'];
	$start_place = $_SESSION['start_place'];
	$end_place = $_SESSION['end_place'];
	$bus_id = $_SESSION['bus_id'];
	$seats = $_SESSION['seats'];

	$q = "SELECT price FROM buses WHERE id = $bus_id";
	$st = $db->query($q);
	$res = $st->fetch(PDO::FETCH_ASSOC);

	if(isset($_REQUEST['submit'])){
		$tr_id = $_REQUEST['transection_id'];
			
		$q = "INSERT INTO passengers ( name, mobile_number, start_place, depart_place, transection_id, bus_id ) VALUES (?,?,?,?,?,?)";
		$st = $db->prepare($q);
		$r = $st->execute(array( $name, $mobile_number, $start_place, $end_place, $tr_id, $bus_id )) or die("Error in Insertion");
		
		if($r) {
			$qu = "SELECT * FROM passengers WHERE mobile_number = $mobile_number ORDER BY id DESC LIMIT 1;";
			$s = $db->query($qu);
			$result = $s->fetch(PDO::FETCH_ASSOC);
			$passenger_id = $result[id];
			$_SESSION['passenger_id'] = $passenger_id;
			
			$q = "INSERT INTO tickets ( bus_id, passenger_id ) VALUES ( ?,? )";
			$stm = $db->prepare($q);
			$stm->execute(array( $bus_id, $passenger_id )) or die("Could not insert");
			
			header("location: print_ticket.php");
		}
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
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $_SESSION['user_name'] ?> <span class="caret"></span>
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
					<h3><strong>Confirm your Ticket through Transection ID</strong></h3>
				</div>
				<div class="details col-md-10 col-md-offset-1">
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<p>Your Seats 
							<?php 
								foreach($seats as $seat) echo "<b> $seat ,</b>";
							?>
							Booked Successfully. Please Make Payment of <?php echo "<b><u>". $res['price'] * count($seats)." TK</b></u>" ?>   BDT through Paypal, Neteller, Payoneer and Enter your Transection ID to Confirm your Seats within 1 hour</p>
					</div>
				</div>
				<div class="col-md-10 col-md-offset-1 main_content_area">
					<form action="" method="post">
						<div class="form-group">
							<input type="text" class="form-control" name="transection_id"  id="transection_id" placeholder="Transection ID" required >
						</div>
						<input type="submit" name="submit"  class="btn btn-success btn-block" value="Confirm Payment" >
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

<?php
	include "../../../config/db.php";
	include "../../../functions/print.php";
	session_start();
	// collecting all the routes name
	$query = "SELECT * FROM routes";
	$stmt = $db->query($query);

	$booked_seats = $available_seats = 0;
	$total_seats = 30;
	$seats = [
		['A1','A2','A3','A4','A5','A6','A7','A8','A9','A10'],
		['B1','B2','B3','B4','B5','B6','B7','B8','B9','B10'],
		['C1','C2','C3','C4','C5','C6','C7','C8','C9','C10']
	];
	if(isset($_REQUEST['submit'])) {
		foreach($stmt as $row) {
			if($row['direction'] == $_REQUEST['selectRoute'])
				$route_id = $row['id'];
		}
		// collecting the time for bus and inserting
		$time  = $_REQUEST['time'];
		$price = $_REQUEST['price'];
		$query = "INSERT INTO buses( route_id, time, price ) VALUES (?,?,?)";
		$st = $db->prepare($query);
		$result = $st->execute(array( $route_id, $time, $price )) or die("Couldn't insert");
		if($result){
			$q = "SELECT id FROM buses ORDER BY id DESC LIMIT 1";
			$st = $db->query($q);
			$r = $st->fetch(PDO::FETCH_ASSOC);
			$bus_id = $r['id'];
//			$total_seats = 30;
			if($bus_id){
				// inserting into seats table
				$q = "INSERT INTO seats (seat_number, bus_id) VALUES (?,?)";
				$s = $db->prepare($q);
				foreach($seats as $v){
					foreach($v as $seat){
						$s->execute(array( $seat, $bus_id )) or die("Problem in insertion");
					}
				}
//				
//				$query1 = "SELECT COUNT(*) as booked_seats FROM seats WHERE bus_id = $bus_id AND (available = 0 OR available = 2)";
//				$st = $db->query($query1);
//				$result = $st->fetch(PDO::FETCH_ASSOC);
//				$booked_seats = $result['booked_seats'];
//				$available_seats = $total_seats - $booked_seats;
//				if($result){
//					$q = "SELECT ";
//				}
//				

			}
		}
		header("location: view_shedule.php");
	}
	
	
	
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../css/_all-skins.min.css">
	<!-- bootstrap time picker -->
	<link rel="stylesheet" href="../../css/bootstrap-timepicker.min.css">
	<!-- bootstrap selectpicker -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="../../css/style.css">

  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b class="glyphicon glyphicon-user"></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
    			<!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $_SESSION['admin_name'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?= $_SESSION['admin_name'] ?> - Web Developer
                  
                </p>
              </li>
				
              <!-- Menu Footer-->
              <li class="user-footer">
<!--
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
-->
                <div class="pull-right">
                  <a href="../../../logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $_SESSION['admin_name'] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class=" treeview">
          <a href="../../index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
		</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Manage Route</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../manage_routes/add_new.php"><i class="fa fa-circle-o"></i> Add new</a></li>
            <li><a href="../manage_routes/view.php"><i class="fa fa-circle-o"></i> View / Edit</a></li>
          </ul>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-bus"></i> <span>Manage Buses</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Add new Bus Shedule</a></li>
            <li><a href="view_shedule.php"><i class="fa fa-circle-o"></i> View shedule</a></li>
            <li><a href="view_bus.php"><i class="fa fa-circle-o"></i> View / Edit Bus</a></li>
          </ul>
        </li>
        <li>
          <a href="../../pages/pending_tickets.php">
            <i class="fa fa-ticket"></i> <span>Pending Tickets</span>
            <span class="pull-right-container">
				<small class="label pull-right bg-green">20</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="../../pages/add_admin.php">
            <i class="fa fa-info"></i> <span>Add New Admin</span>
          </a>
        </li>
				<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../charts/chartjs.php"><i class="fa fa-circle-o"></i> ChartJS</a></li>
          </ul>
        </li>  
				<li>
          <a href="../../pages/calender.php">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
			<!--heading of content-->
    	<div class="row">
				<div class="col-md-10 content-heading">
					<h3 class="text-center">Add New Bus shedule</h3>		
				</div>
				<div class="col-md-6 col-md-offset-2">
					<form method="post" action="" >
						<!-- select place -->
							<div class="form-group">
								<label > Select Route  </label>
								<select name="selectRoute" class="selectpicker">
<!--
									<button class="btn btn-default btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Please Select a Route <span class="caret"></span>
									</button>
-->
									<?php foreach($stmt as $row): ?>
										<option value="<?= $row['direction'] ?>"> <?= $row['direction'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						<!-- timepicker-->
							<div class="form-group">
								<label for="timepicker">Select Time</label>
								<div class="input-group bootstrap-timepicker timepicker">
									<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
									<input name="time" id="timepicker" type="text" class="form-control input-small">
								</div>
							</div>
						<!-- select price -->
		 					<div class="form-group">
								<label for="ticket_price" >Ticket Price</label>
								<input name="price" type="text" class="form-control ticket_price" id="ticket_price" placeholder="Ticket Price">
							</div>
							<div class="form-group">
								<input name="submit" type="submit" value="ADD" class="btn btn-primary btn-block">
							</div> 
		 			</form>	
				</div>
      	 
      	</div>
		</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer text-center">
    <strong>Copyright &copy; 2017-2018 <a href="#">Sifat</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../../js/app.min.js"></script>
<!--bootstrap time picker-->
<script src="../../js/bootstrap-timepicker.min.js" ></script>
<!-- select picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script src="../../js/main.js"></script>
</body>
</html>

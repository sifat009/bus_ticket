<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
	<link rel="stylesheet" href="../css/style.css">

  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../index.php" class="logo">
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
              <img src="../img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Sifat Haque</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Sifat Haque - Web Developer
                  
                </p>
              </li>
				
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../../login.php" class="btn btn-default btn-flat">Sign out</a>
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
          <img src="../img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Sifat Haque</p>
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
          <a href="../index.php">
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
            <li><a href="manage_routes/add_new.php"><i class="fa fa-circle-o"></i> Add new</a></li>
            <li><a href="manage_routes/view.php"><i class="fa fa-circle-o"></i> View / Edit</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bus"></i> <span>Manage Buses</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="manage_buses/add_new.php"><i class="fa fa-circle-o"></i> Add new</a></li>
            <li><a href="manage_buses/view_shedule.php"><i class="fa fa-circle-o"></i> View shedule</a></li>
            <li><a href="manage_buses/view_bus.php"><i class="fa fa-circle-o"></i> View / Edit Bus</a></li>
          </ul>
        </li>
        <li class="">
          <a href="pending_tickets.php">
            <i class="fa fa-ticket"></i> <span>Pending Tickets</span>
            <span class="pull-right-container">
				<small class="label pull-right bg-green">20</small>
            </span>
          </a>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-info"></i> <span>Bus Ticket Info</span>
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
            <li><a href="charts/chartjs.php"><i class="fa fa-circle-o"></i> ChartJS</a></li>
          </ul>
        </li>  
				<li>
          <a href="calender.php">
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
        <li class="active">Bus Ticket Info</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container">
	  		<div class="row">
				<!-- heading of the content -->
					<div class="col-md-10 content-heading">
						<h3 class="text-center">Buses  Information</h3>		
					</div>
				<!-- table start -->
					<div class="col-md-10 col-md-offset-1">
						<div class="table-responsive">
							<table class="table table-striped table-hover">
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
									<tr>
										<td>1</td>
										<td>place(A) to place(B)</td>
										<td>04/03/2017</td>
										<td>1.30 P.M.</td>
										<td>40</td>
										<td>5</td>
										<td>35</td>
										<td>
											<a class="btn btn-info" >Seat Info</a>
											<a class="btn btn-success">Print Copy</a>
										</td>
									</tr>
									<tr>
										<td>2</td>
										<td>place(A) to place(B)</td>
										<td>04/03/2017</td>
										<td>1.30 P.M.</td>
										<td>40</td>
										<td>5</td>
										<td>35</td>
										<td>
											<a class="btn btn-info" >Seat Info</a>
											<a class="btn btn-success">Print Copy</a>
										</td>
									</tr>
									<tr>
										<td>3</td>
										<td>place(A) to place(B)</td>
										<td>04/03/2017</td>
										<td>1.30 P.M.</td>
										<td>40</td>
										<td>5</td>
										<td>35</td>
										<td>
											<a class="btn btn-info" >Seat Info</a>
											<a class="btn btn-success">Print Copy</a>
										</td>
									</tr>
									<tr>
										<td>4</td>
										<td>place(A) to place(B)</td>
										<td>04/03/2017</td>
										<td>1.30 P.M.</td>
										<td>40</td>
										<td>5</td>
										<td>35</td>
										<td>
											<a class="btn btn-info" >Seat Info</a>
											<a class="btn btn-success">Print Copy</a>
										</td>
									</tr>
									<tr>
										<td>5</td>
										<td>place(A) to place(B)</td>
										<td>04/03/2017</td>
										<td>1.30 P.M.</td>
										<td>40</td>
										<td>5</td>
										<td>35</td>
										<td>
											<a class="btn btn-info" >Seat Info</a>
											<a class="btn btn-success">Print Copy</a>
										</td>
									</tr>
									<tr>
										<td>6</td>
										<td>place(A) to place(B)</td>
										<td>04/03/2017</td>
										<td>1.30 P.M.</td>
										<td>40</td>
										<td>5</td>
										<td>35</td>
										<td>
											<a class="btn btn-info" >Seat Info</a>
											<a class="btn btn-success">Print Copy</a>
										</td>
									</tr>
									<tr>
										<td>7</td>
										<td>place(A) to place(B)</td>
										<td>04/03/2017</td>
										<td>1.30 P.M.</td>
										<td>40</td>
										<td>5</td>
										<td>35</td>
										<td>
											<a class="btn btn-info" >Seat Info</a>
											<a class="btn btn-success">Print Copy</a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
      	 <!-- table end -->
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
<script src="../js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/app.min.js"></script>

</body>
</html>

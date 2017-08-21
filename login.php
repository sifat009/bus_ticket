<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ticket</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="user/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="user/css/font-awesome.min.css">
  <link rel="stylesheet" href="user/css/login.css" >
</head>
	
<body>
	<div class="container">
   <div class="omb_login">
    	<h3 class="omb_authTitle">Login or <a href="sign_up.php">Sign up</a></h3>
			<div class="row omb_row-sm-offset-3 omb_socialButtons">
						<div class="col-xs-4 col-sm-2">
							<a href="#" class="btn btn-lg btn-block omb_btn-facebook">
								<i class="fa fa-facebook visible-xs"></i>
								<span class="hidden-xs">Facebook</span>
							</a>
						</div>
						<div class="col-xs-4 col-sm-2">
							<a href="#" class="btn btn-lg btn-block omb_btn-twitter">
								<i class="fa fa-twitter visible-xs"></i>
								<span class="hidden-xs">Twitter</span>
							</a>
						</div>	
						<div class="col-xs-4 col-sm-2">
							<a href="#" class="btn btn-lg btn-block omb_btn-google">
								<i class="fa fa-google-plus visible-xs"></i>
								<span class="hidden-xs">Google+</span>
							</a>
						</div>	
			</div>

			<div class="row omb_row-sm-offset-3 omb_loginOr">
				<div class="col-xs-12 col-sm-6">
					<hr class="omb_hrOr">
					<span class="omb_spanOr">or</span>
				</div>
			</div>

			<div class="row omb_row-sm-offset-3">
				<div class="col-xs-12 col-sm-6">	
						<form class="omb_loginForm" >
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input type="email" class="form-control"  name="email" placeholder="email address" required>
							</div>
							<span class="help-block"></span>

							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input  type="password" class="form-control" name="password" placeholder="Password" required>
							</div>
												<span class="help-block">Password error</span>

							<input type="submit" class="btn btn-primary form-control" value="Login" >
						</form>
				</div>
    	</div>
		<div class="row omb_row-sm-offset-3">
			<div class="col-xs-12 col-sm-3">
				<label class="checkbox">
					<input type="checkbox" value="remember-me" required >Remember Me
				</label>
			</div>
			<div class="col-xs-12 col-sm-3">
				<p class="omb_forgotPwd">
					<a href="#">Forgot password?</a>
				</p>
			</div>
		</div>
		<div class="col-md-12 text-center  bottom-text">
			<p class="bg-info">To log-in as admin use password : <strong>admin</strong></p>
			<p class="bg-warning">To log-in as user use password : <strong>user</strong></p>
		</div>
	</div>
 </div>
	
	
	
<!-- jQuery 2.2.3 -->
<script src="user/js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="user/js/bootstrap.min.js"></script>
<!--main js-->
<script src="user/js/main.js"></script>
<script>
	var form = document.getElementsByTagName('form');
	var pass = document.getElementsByName('password');
	form[0].onsubmit = function(){
		if(pass[0].value == 'admin') {
			form[0].action = "admin/index.php";
		} else if( pass[0].value == 'user') {
				form[0].action = "index.php";	
			} else {
					alert("Wrong Password");
					return false;
				}	
	}
	
</script>
</body>
</html>

<?php
//	include "config/db.php";
//	include "functions/print.php";	
//	//include "check.php";	
//	session_start();
//	
	
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
<!--
  <link rel="stylesheet" href="user/css/bootstrap.min.css">
   Font Awesome 
  <link rel="stylesheet" href="user/css/font-awesome.min.css">
  <link rel="stylesheet" href="user/css/style.css" >
-->
  <style>
		body {
  margin: 0;
  background: #000; 
}
video { 
    position: fixed;
    top: 50%;
    left: 50%;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    z-index: -100;
    transform: translateX(-50%) translateY(-50%);
 background: url('bling_blink.jpg') no-repeat;
  background-size: cover;
  transition: 1s opacity;
}
.stopfade { 
   opacity: .5;
}

#polina { 
  font-family: Agenda-Light, Agenda Light, Agenda, Arial Narrow, sans-serif;
  font-weight:100; 
  background: rgba(0,0,0,0.3);
  color: white;
  padding: 2rem;
  width: 33%;
  margin:2rem;
/*  float: right;*/
	margin: 0 auto;
	margin-top: 15%;
  font-size: 1.2rem;
}
h1 {
  font-size: 3rem;
  text-transform: uppercase;
  margin-top: 0;
  letter-spacing: .3rem;
}
#polina button { 
  display: block;
  width: 80%;
  padding: .4rem;
  border: none; 
  margin: 1rem auto; 
  font-size: 1.3rem;
  background: rgba(255,255,255,0.23);
  color: #fff;
  border-radius: 3px; 
  cursor: pointer;
  transition: .3s background;
}
#polina button:hover { 
   background: rgba(0,0,0,0.5);
}

a {
/*  display: inline-block;*/
  color: #fff;
  text-decoration: none;
/*  background:rgba(0,0,0,0.5);*/
/*  padding: .5rem;*/
  transition: .6s background; 
}
a:hover{
  background:rgba(0,0,0,0.9);
}
@media screen and (max-width: 500px) { 
  div{width:70%;} 
}
@media screen and (max-device-width: 800px) {
  html { background: url(bling_blink.jpg) #000 no-repeat center center fixed; }
  #bgvid { display: none; }
}
.bus{
	
	font-weight: 900;

	
}
.ticket{
	color: cornflowerblue;
	font-weight: 600;
}
	</style>

</head>
	
<body>
	
	<video poster="bling_blink.jpg" id="bgvid" playsinline autoplay muted loop>
  <!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->
<source src="bling_blink.webm" type="video/webm">
<source src="bling_blink.mp4" type="video/mp4">
<source src="bling_blink.ogv" type="video/ogv">
</video>
<div id="polina">
<!--	<h1>Polina</h1>-->
<!--
	<p>filmed by Alexander Wagner 2011
	<p><a href="http://thenewcode.com/777/Create-Fullscreen-HTML5-Page-Background-Video">original article</a>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur porta dictum turpis, eu mollis justo gravida ac. Proin non eros blandit, rutrum est a, cursus quam. Nam ultricies, velit ac suscipit vehicula, turpis eros sollicitudin lacus, at convallis mauris magna non justo. Etiam et suscipit elit. Morbi eu ornare nulla, sit amet ornare est. Sed vehicula ipsum a mattis dapibus. Etiam volutpat vel enim at auctor.</p>
-->
	<p><u><span class="bus">Bus</span><span class="ticket">Ticket</span> </u>is an online ticket booking platform, it'll help you to get tickets easily and safely. So, Hurry !!!</p>
	<h3><a href="user/pages/select_date.php" ><button> Book Your Ticket Today</button></a></h3>
	<button class="pause">Pause video</button>
</div>
<!--
	<div class="content_area">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1>Coming Soon !!</h1>
					<a href="user/pages/select_date.php" class="btn btn-primary btn-lg">Book Your Ticket Today</a>
				</div>
			</div>
		</div>
	</div>
-->
<!--
	<footer class="footer_area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p class="text-center"> &copy; All right reserved.</p>
				</div>
			</div>
		</div>
	</footer>
-->
	
	
	
<!-- jQuery 2.2.3 -->
<!--<script src="user/js/jquery-2.2.3.min.js"></script>-->
<!-- Bootstrap 3.3.6 -->
<!--<script src="user/js/bootstrap.min.js"></script>-->
<!--main js-->
<!--<script src="user/js/main.js"></script>-->

<script>
	
	var vid = document.getElementById("bgvid");
var pauseButton = document.querySelector("#polina  .pause");

if (window.matchMedia('(prefers-reduced-motion)').matches) {
    vid.removeAttribute("autoplay");
    vid.pause();
    pauseButton.innerHTML = "Paused";
}

function vidFade() {
  vid.classList.add("stopfade");
}

vid.addEventListener('ended', function()
{
// only functional if "loop" is removed 
vid.pause();
// to capture IE10
vidFade();
}); 


pauseButton.addEventListener("click", function() {
  vid.classList.toggle("stopfade");
  if (vid.paused) {
    vid.play();
    pauseButton.innerHTML = "Pause";
  } else {
    vid.pause();
    pauseButton.innerHTML = "Paused";
  }
})


	
	
</script>
</body>
</html>

<?php
session_start();
include_once("db_connect.php");
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Carpool Iasi </title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="source/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="source/font-awesome-4.5.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="style/slider.css">
	<link rel="stylesheet" type="text/css" href="style/mystyle.css">
</head>
<body>
<!-- Header -->
<div class="allcontain">
	<div class="header">
			<ul class="socialicon">
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
				<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
			</ul>
			<ul class="givusacall">
				<li>Give us a call: 0756783706.      <?php if(!isset($_SESSION['user_name'])) {echo "Intra in cont si bucura-te de carpooling";}?></li>
			</ul>
			<ul class="logreg">
				<li><a href="login.php">Login </a> </li>
				<li><a href="register.php"><span class="register">Register</span></a></li>
				<li><a href="logout.php"><span class="register"><?php if(isset($_SESSION['user_name'])) {echo "Log Out";}?></span></a></li>
				<li><?php if(isset($_SESSION['user_name'])) {
					echo "<span>";
					echo $_SESSION['user_name'];
					echo "</span>";
					}?>						
				</li> 
			</ul>
			</ul>
	</div>
	<!-- Navbar Up -->
	<nav class="topnavbar navbar-default topnav">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed toggle-costume" data-toggle="collapse" data-target="#upmenu" aria-expanded="false">
					<span class="sr-only"> Toggle navigaion</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand logo" href="#"><img src="image/logo3.jpg" alt="logo"></a>
			</div>	 
		</div>
		<div class="collapse navbar-collapse" id="upmenu">
			<ul class="nav navbar-nav" id="navbarontop">
				<li class="active"><a href="#">HOME</a> </li>
				<li>
					<a href="contact.php">CONTACT</a>
				</li>
				<li>
					<a href="cautacursa.php"><?php if(isset($_SESSION['user_name'])) {echo "Cauta o cursa";}?></a>
				</li>
				<li>
					<a href="oferacursa.php"><?php if(isset($_SESSION['user_name'])) {echo "Ofera o cursa";}?></a>
				</li>
				<li>
					<a href="profilulmeu.php"><?php if(isset($_SESSION['user_name'])) {echo "Profilul meu";}?></a>
				</li>
			</ul>
		</div>
	</nav>
</div>
<!--_______________________________________ Carousel__________________________________ -->
<div class="allcontain">
	<div id="carousel-up" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner " role="listbox">
			<div class="item active">
				<img src="image/carpoolcar1.jpg" alt="oldcar">
				<div class="carousel-caption">
					<h2> &emsp; &emsp; &emsp; &emsp; &emsp; Carpooling, calatoreste placut si usor</h2>
				</div>
			</div>
	</div>
</div>

	<!-- ______________________________________________________Bottom Menu ______________________________-->
	<div class="bottommenu">
		<ul class="nav nav-tabs bottomlinks">
			<li role="presentation" ><a href="#/" role="button">Informatii practice</a></li>
			<li role="presentation"><a href="#/">Mentiuni legale</a></li>
		</ul>
			<div class="footer">
				<div class="atisda">
					 Owner: <a>Dominte Stefan </a> 
				</div>
			</div>
	</div>
</div>
</body>
</html>
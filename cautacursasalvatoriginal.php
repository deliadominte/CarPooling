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
				<li>Give us a call: +0232 --- --- </li>
			</ul>
			<ul class="logreg">

				<li><a href="logout.php"><?php if(isset($_SESSION['user_name'])) {echo "Log Out";}?></a></li>
				<li><?php if(isset($_SESSION['user_name'])) {
					echo "<s-pan>";
					echo $_SESSION['user_name'];
					echo "</span>";
					}?>	</li>
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
				<li class="active"><a href="index.php">HOME</a> </li>
				<li>
					<a href="contact.php">CONTACT</a>
				</li>
				<li>
					<a href="cautacursa.php">Cauta o cursa</a>
				</li>
				<li>
					<a href="oferacursa.php">Ofera o cursa</a>
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
		<nav class="navbar navbar-default midle-nav">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed textcostume" data-toggle="collapse" data-target="#navbarmidle" aria-expanded="false">
						<h1>SEARCH TEXT</h1>
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="navbarmidle">
				<div class="searchtxt">
					<h1>Gaseste o cursa</h1>
				</div>
				<form class="navbar-form navbar-left searchformmargin" role="search">
					<div class="form-group">
						<input type="text" class="form-control searchform" placeholder="Plecare">
					</div>
					<div class="form-group">
						<input type="text" class="form-control searchform" placeholder="Destinatie">
					</div>
					<div class="form-group">
							<input class="form-control searchform" id="date" type="date" placeholder="Alege o data:">
					</div>	
					<li class="form-group"> <button class="searchbutton"><span class="glyphicon glyphicon-search "></span></button></li>
				</form>
 
			</div>
		</nav>
	</div>
</div>

	<!-- ______________________________________________________Bottom Menu ______________________________-->
	<div class="bottommenu">
			<div class="footer">
				<div class="atisda">
					 Owner: <a>Dominte Stefan </a> 
				</div>
			</div>
	</div>
</div>


</body>
</html>
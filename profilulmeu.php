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
				<li>Give us a call: 0756783706 </li>
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
				<li>
					<a href="profilulmeu.php">Profilul meu</a>
				</li>
			</ul>
		</div>
	</nav>
</div>
<!--_______________________________________ Carousel__________________________________ -->
<div class="allcontain">
	<div id="carousel-up" class="carousel slide" data-ride="carousel">
		
	</div>
</div>
<table border="1" cellspacing="5" cellpadding="5" width="100%">
	<thead>
		<tr>
			<th>Data</th>
			<th>Locuri disponibile</th>
			<th>ora</th>
			<th>Arata punctul de start</th>
			<th>Destinatia</th>
			<th>Numar telefon pasageri</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$db_server = "localhost";
		$db_username = "root";
		$db_password = "";
		$db_database = "carpooling";
 
	$conn = new PDO("mysql:host=$db_server;dbname=$db_database", $db_username, $db_password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$id_owner = $_SESSION['user_id'];
		$result = $conn->prepare("SELECT s.data , s.locuridisponibile, s.ora, b.x, b.y
from calatorie s, punct b, drumdepuncte c
where id_utilizator = '$id_owner' and c.id_calatorie = s.id and b.id = c.id_punct and b.id = s.start");
		$result1 = $conn->prepare("SELECT s.data , s.locuridisponibile, s.ora, b.x, b.y
from calatorie s, punct b, drumdepuncte c
where id_utilizator = '$id_owner' and c.id_calatorie = s.id and b.id = c.id_punct and b.id = s.finish");
		$result->execute();
		$result1->execute();
		for($i=0; $row = $result->fetch() , $row1 = $result1->fetch() ; $i++){
	?>
		<tr>
			<td><label><?php echo $row['data']; ?></label></td>
			<td><label><?php echo $row['locuridisponibile']; ?></label></td>
			<td><label><?php
			if( intval($row['ora'])>=1000)
			{
				$x =intval($row['ora']);
				$z = intval($x%100);
				$y = intval($x/100);
				if($z == 0)
				{
					echo $y . ":00";
				}
				else
				{
					echo $y . ":" . $z;
				}
			}
			elseif(intval($row['ora'])<1000)
			{
				$x =intval($row['ora']);
				$z = intval($x%100);
				$y = intval($x/100);
				if($z == 0)
				{
					echo $y . ":00";
				}
				else
				{
					echo $y . ":" . $z;
				}

			}
			 ?></label></td>
			<td><label><form action="search2.php" method="post">
lat: <input type="text" name="name" value="<?php echo doubleval($row['x']); ?>"><br>
lng: <input type="text" name="email" value="<?php echo doubleval($row['y']); ?>">
<input type="submit" value = "Arata start">
</form></label></td>
			<td><label><form action="search2.php" method="post">
lat: <input type="text" name="name" value="<?php echo doubleval($row1['x']); ?>"><br>
lng: <input type="text" name="email" value="<?php echo doubleval($row1['y']); ?>">
<input type="submit" value = "Arata destinatia">
</form></label></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<style type="text/css">
body {
	width:1200px;
	border:red 1px solid;
	border-style:dashed;
	margin:auto;
	padding:10px;
}
td {
	text-align:center;
	padding:10px;
}
table {
	margin:auto;
	border:blue 1px solids}
label {
	font-size:18px;
	color:blue;
    font-weight: bold;
    font-family: cursive;
}
h2 {
	color:red;
	text-align:center;
}
th {
	color:red;
	font-size:20px;
    font-family: cursive;
}
</style>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


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
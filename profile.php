<?php
session_start();
if(!isset($_SESSION['id_u'])){
	header("Location: login.php");
}
require ('management.php');
$mgn = new Manager();


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/css.css">
</head>
<body>
	<?php include('header.php');?>
	<div id="profil">
		<H1 id="hacko">Profile</H1>
		<div id="informace">
			<H1>Udaje</H1>
			<div class='spanator'><span>Jmeno:</span><span><?php echo $_SESSION['jmeno'] ?></span></br></div>
			<div class='spanator'><span >Prijmeni:</span><span><?php echo $_SESSION['prijmeni'] ?></span></br></div>
			<div class='spanator'><span >Username:</span><span><?php echo $_SESSION['username'] ?></span></br></div>
			<div class='spanator'><span>Poznamka:</span><span><?php echo $_SESSION['poznamka'] ?></span></div>
		</div>
	</div>
	<div id="profil">
		<H1 id="hacko">Výsledky testů</H1>
		<?php 
		 $mgn->Vysledky();
		?>

	</div>
</body>
</html>
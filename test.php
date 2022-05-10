<?php 
if(isset($_SESSION['id_u'])){
		header("Location: index.php");
	}
	require ('management.php');
	$mng = new Manager();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
</head>
<body>
	<?php include('header.php');?>
	<div id="testikk">
		<?php 
			$mng->NactiTest($_GET['id_t']);
		?>
		<div class="otazecka" style="display: none" id="vysledovac"></div>
		<div class="otazecka">
			<input type="submit" name="Tlacitko" value="Oukej" placeholder="Potvrdit" id="tlacenico" onclick="Funguuuj(<?php echo $_GET['id_t']?>)">

		</div>
	</div>
</body>
</html>
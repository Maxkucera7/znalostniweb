<?php 
session_start();
error_reporting(1);
if(!isset($_SESSION['id_u'])){
	header("Location: login.php");
}
require ('management.php');
$mng = new Manager();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<script type="text/javascript" src="js/js.js"></script>
	<title></title>
</head>
<body>
	<?php include('header.php');
	?>
	<div id="testy">
		<?php
			$mng->Testy();
		?>
	</div>

</body>
</html>
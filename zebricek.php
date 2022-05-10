<?php
session_start();
if(!isset($_SESSION['id_u'])){
	header("Location: login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<script type="text/javascript" src="js/js.js"></script>
</head>
<body>
	<?php include('header.php');?>
	<div id="zebrik">
		
	</div>

</body>
</html>
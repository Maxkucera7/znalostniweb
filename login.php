<?php
if(isset($_SESSION['id_u'])){
	header("Location: index.php");
}
require ('management.php');
$mng = new Manager();
if(isset($_POST['email'])){
	$mng->Login($_POST['email'],$_POST['heslo']);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/css.css">
</head>
<body>
		<div id="login">
			<form method="post">
				<H1>Login</H1>
				<span>Email</span><input type="email" name="email" placeholder="Email" required></br>
				<span>Password</span><input type="password" name="heslo" placeholder="password" required></br>
				<input type="submit" name="oka" value="Login" id="tlacitko">
				<a href="register.php">Registrace</a>
			</form>
		</div>
</body>
</html>
<?php
	if(isset($_SESSION['id_u'])){
		header("Location: index.php");
	}
	require ('management.php');
	$mng = new Manager();
	if(isset($_POST['email'])){
		$mng->Register($_POST['email'],$_POST['heslo'],$_POST['hesloA'],$_POST['username'],$_POST['jmeno'],$_POST['prijmeni'],$_POST['poznamka']);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/css.css">
</head>
<body>
		<div id="register">
			<form method="post">
				<H1>Register</H1>
				<span>Email</span><input type="email" name="email" placeholder="Email" required></br>
				<span>Password</span><input type="password" name="heslo" placeholder="password" required></br>
				<span>Password Again</span><input type="password" name="hesloA" placeholder="password" required></br>
				<span>Username</span><input type="text" name="username" placeholder="username" required></br>
				<span>Jmeno</span><input type="text" name="jmeno" placeholder="jmeno" required></br>
				<span>Prijmeni</span><input type="text" name="prijmeni" placeholder="prijmeni" required></br>
				<span>Poznamka</span><input type="text" name="poznamka" placeholder="poznamka"></br>
				<input type="submit" name="oka" value="Register" id="tlacitkoR">
			</form>
		</div>


</body>
</html>
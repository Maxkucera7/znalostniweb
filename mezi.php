<?php
require ('management.php');
$mng = new Manager();
session_start();
if(isset($_GET['cisloOtazky'])){
	$sql = "SELECT count(o.id_o) AS pocet FROM otazka AS o WHERE o.test='".$_GET['cisloOtazky']."'";
	$result = $mng->Select($sql);
	$fef= $result->fetch_assoc();
	echo $fef['pocet'];
}
if(isset($_GET['vysledek'])){
	$sql = "INSERT INTO vysledky (id_u,id_t,procenta) VALUES (".$_SESSION['id_u'].",".$_GET['cisloOt'].",".$_GET['vysledek'].")";
	$result = $mng->Execute($sql);
	if($result){
		echo true;
	}else{
		echo false;
	}
}
?>
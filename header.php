<div id="header">
<span class="plz"><a href="zebricek.php">Zebricek</a></span>
<span class="plz"><a href="index.php">Testy</a></span>
<span class="plz"><a href="profile.php">Profil</a></span>
<H1 id="nazev">Znalostni web</H1>
<?php if(!isset($_SESSION['id_u'])){?>
<span class="pls"><a href="register.php">Register</a></span>
<span class="pls"><a href="login.php">Login</a></span>
<?php }else{?>
	<span class="pls"><?php
	echo $_SESSION['username'];
	?></span>
	<span class="pls"><a href="logout.php">Logout</a></span>
	<?php
	}
	?>
</div>
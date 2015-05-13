<?php
	require 'head_foot.php';
	headerHTML();
?>

<h1 class="Tpage">Mon Compte</h1>
<form action="post_inscription.php" method="post" enctype="multipart/form-data">
<div class ="droite1_3">
	<img src="photo_profil.jpg"  width="150" height="150" border=3>
	<br><input type="submit" class="bouton_inscr" value="Modifier"></br>
	</div>
	<div class="gauche2_3">
	</h2><b>Infomations personnelles</b></h2>
	<p>BANQUET</p>
	<p>Charles</p>
	<p>Masculin</p>
	<p>1992-06-12</p>
	<div class="center">
	<input type="submit" class="bouton_inscr" value="Modifier"></p>
	</div>
	</h2><b>Infomations du compte</b></h2>
	<p>charles.banquet@live.com</p>
	<p>123456</p>
	<div class="center">
	<input type="submit" class="bouton_inscr" value="Modifier"></p>
	</div>
	</h2><b>Coordonnées</b></h2>
	<p>5 boulevard deltour appartement 6<br>31500 Toulouse</br></p>
	<p>0642240716</p>
	<div class="center">
	<input type="submit" class="bouton_inscr" value="Modifier"></p>
	</div>
	</div>
	

<?php
	//require 'headfoot.php';
	footerHTML();
?>
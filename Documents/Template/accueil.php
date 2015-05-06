<?php
	require 'head_foot.php';
	headerHTML();
?>

<h1 class="Tpage">Accueil</h1>
		
	<h2 class="Tdesc">Titre de texte descriptif</h2>
	<h3 class="Tobj">Nom Objet</h3>
		
	<p>Tout type de texte : </p>
	<ul>
		<li style="list-style-type:none">- descriptions d'objets</li>
		<li style="list-style-type:none">- textes explicatifs</li>
		<li style="list-style-type:none">- champs de <a href="connexion.html">connexion</a> ou d'<a href="inscription.html">inscription</a></li>
		<li style="list-style-type:none">- onglets</li>
		<li style="list-style-type:none">- </li>
	</ul>
		
	<p class=prix>prix : 50 €<br><br><br><br><br></p>
	<p class=fin>Attention, enchère bientôt terminée</p>
	<a class="bouton_encherir" href="index.html">Enchérir</a>
	<a class="bouton_depos" href="index.html">Déposer</a>
	<a class="bouton_payer" href="index.html"><span class="paye">Payer</span></a>
	<a class="bouton_noter" href="index.html"><span class="note">Noter</span></a>

<?php
	//require 'headfoot.php';
	footerHTML();
?>
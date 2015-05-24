<?php
	require 'head_foot.php';
	headerHTML();
	$error = isset($_GET['error']) ? $_GET['error'] : '';
?>
<link href="javascriptv2/jquery-ui.css" rel="stylesheet">
<script src="javascriptv2/external/jquery/jquery.js"></script>
<script src="javascriptv2/jquery-ui.js"></script>
<script type="text/javascript" src="http://jqueryui.com/ui/i18n/jquery.ui.datepicker-fr.js">
</script>

<h1 class="Tpage">Inscription</h1>
	
	
	<div class="gauche2_3">
		<div class="center"><h2 class="Tdesc">Commencez à utiliser BidBay</h2></div><br><br>
	    <form id="inscr" action="post_inscription.php" method="post" enctype="multipart/form-data">
		<div class="gauche">
		    <p>Prénom</p>
		    <input type="text" name="prenom">
			<?php
				switch ($error){
				case 1:
					echo "<B>merci de saisir votre date de naissance</B>";
					break;
				}
			?>
		    <script type="text/javascript">
				function Compter(champ1, champ2)
				{
					// Nombre de caractères max (2 pour jour et mois)
					var max = 2;
					// Longueur actuelle du champ1
					var taille = champ1.value.length
					// Si le nombre de caractères est >= au nombre max autorisé, on passe au champ suivant
					if (taille >= max)
					{
						champ2.focus();
					}
				}
				function Compter2(champ1, champ2)
				{
					// Nombre de caractères max (2 pour jour et mois)
					var max = 4;
					// Longueur actuelle du champ1
					var taille = champ1.value.length
					// Si le nombre de caractères est >= au nombre max autorisé, on passe au champ suivant
					if (taille >= max)
					{
						champ2.focus();
					}
				}
				function EffaceChamp(champ1)
				{
					champ1.value = "";
					champ1.focus();
				}
			</script>
			<p>Date de naissance</p>
			<input type="text" name="jour" class="fdate" onkeyup="Compter(this,document.forms['inscr'].mois)" onselect="EffaceChamp(this)" value="" />
			<input type="text" name="mois" class="fdate" onkeyup="Compter(this,document.forms['inscr'].annee)" onselect="EffaceChamp(this)" value="" />
			<input type="text" name="annee" class="fdate" value="" onkeyup="Compter2(this,document.forms['inscr'].pass1)" onselect="EffaceChamp(this)"/>
			<span class="legende">(jj/mm/aaaa)</span>
		    <p>Mot de passe</p>
		    <input type="password" name="pass1">
		    <p>Confirmez le mot de passe</p>
		    <input type="password" name="pass2">
		</div>
		<div class="droite">
		    <p>Nom</p>
		    <input type="text" name="nom">
			<p>Adresse e-mail</p>
		    <input type="mail" name="mail">
		    <div class="center">
			<p><br>En cliquant sur Soumettre, je reconnais que : <br>
			<ul>
			   <li>J'ai lu et j'accepte les Conditions d'Utilisation</li>
			   <li>Je donne mon accord au traitement de mes données personelles,</li>
			   <li>Je suis âgé de plus de 18 ans.</li>
			</ul><br>
			<input type="submit" class="bouton_inscr" value="Soumettre"></p>
		    </div>
		</div>
	    </form>
	</div>
	<div class="droite1_3">
		<p><br><br><br><br>Vous avez déjà un compte ?<br><br><br>
		<a class="bouton_co" href="connexion.php">Connexion</a><br><br><br><br><br><br><br><br><br></p>
	</div>

<?php
	//require 'headfoot.php';
	footerHTML();
?>

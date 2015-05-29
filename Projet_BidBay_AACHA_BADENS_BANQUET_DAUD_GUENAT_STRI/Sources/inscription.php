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
		<div class="center"><h2 class="Tdesc">Commencez à utiliser BidBay</h2></div><br>
		<form id="inscr" action="post_inscription.php" method="post" onsubmit="return validation(this)">
		<script type="text/javascript">
		/*function is_valide_date($date, $sep='/')
		{
			if(!list($day, $month, $year) = explode($sep, $date))
				return false;
			if($day > 31 OR $day < 1 OR $month > 12 OR $month < 1 OR $year > 32767 OR $year < 1)
				return false;
			return checkdate($month, $day, $year);
		}*/
			function validation(f) {
				if (f.prenom.value == '' || f.nom.value == '' || f.mail.value == '' || f.jour.value == '' || f.mois.value == '' || f.annee.value == '' || f.pass1.value == '' || f.pass2.value == '') {
					alert('Tous les champs ne sont pas remplis');
					return false;
				}
				else if (f.pass1.value != f.pass2.value) {
					alert('Les mots de passe ne sont pas identique');
					f.pass1.focus();
					return false;
				}
				else if (f.pass1.value == f.pass2.value || f.prenom.value != '' || f.nom.value != '' || f.mail.value != '' || f.jour.value != '' || f.mois.value != '' || f.annee.value != '') {
					var j=(f.jour.value);
					var m=(f.mois.value);
					var a=(f.annee.value);
					if ( ((isNaN(j))||(j<1)||(j>31))) {
						alert("Le jour n'est pas correct.");
						return false;
					}
					else if ( ((isNaN(m))||(m<1)||(m>12))) {
						alert("Le mois n'est pas correct.");
						return false;
					}
					else if ( ((isNaN(a))||(a<1850)||(a>1997))) {
						if (a<1850){
							alert("A moins que vous soyez immortel, votre année de naissance n'est pas correcte."); 
							return false;
						}
						else if (a>1997){
							alert("Vous avez moins de 18 ans, vous ne pouvez pas vous inscrire."); 
							return false;
						}
						else{
							alert("L'année n'est pas correcte."); 
							return false;
						}
					}
					else{
						var d2=new Date(a,m-1,j);
						j2=d2.getDate();
						m2=d2.getMonth()+1;
						a2=d2.getFullYear();
						if (a2<=100) {
							a2=1900+a2
						}
						if ( (j!=j2)||(m!=m2)||(a!=a2) ) {
							alert("La date "+d+" n'existe pas !");
							return false;
						}
						else
							return true;
					}
				}
				else {
					alert('autre erreur');
					return false;
				}
			}
		</script>
		<div class="gauche">
			<?php
				switch ($error){
				case 1:
					echo "<p class=\"error\">Vous avez oublié de remplir un champ</p>";
					break;
				}
			?><br>
			<p>Prénom</p>
		    <input type="text" name="prenom">
			<?php
				switch ($error){
				case 2:
					echo "<p class=\"error\">Votre date de naissance est invalide</p>";
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
			<?php
				switch ($error){
				case 3:
					echo "<p class=\"error\">Un compte existe déjà avec ce mail</p>";
					break;
				}
			?>
			<p>Adresse e-mail</p>
		    <input type="text" name="mail">
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
	footerHTML();
?>

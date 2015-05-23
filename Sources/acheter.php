<?php
	require 'head_foot.php';
	headerHTML();
	session_start();
	$idobj = $_SESSION['idobj'];
	$login = $_SESSION['login'];
	$nomobj = $_SESSION['nomobj'];
	$prix = $_SESSION['prix'];
	$pasobj = $_SESSION['pasobj'];
	$mailutilisateuracheteur = $_SESSION['mailutilisateuracheteur'];
?>
<?php
		/*si l'utilisateur donne une mise inférieur au pas alors message d'erreur*/
		$error = isset($_GET['error']) ? $_GET['error'] : '';
?>

<!--si l'utilisateur ne souhaite finalement pas miser il peut retourner à la page de l'objet-->
<div class= "droite1_3">
				<?php
					echo "<a class=\"Connexion\" href=\"objet.php?id=".$idobj."\">Retour à la page de l'objet</a>";
				?>
</div>
<form action="post_acheter.php" method="post" enctype="multipart/form-data">
<div class ="gauche2_3">
	<h1> Vous vous appretez à miser sur un objet</h1>
		<h3><u>L'objet sur lequel vous allez miser est :</u></h3>
			<?php
				echo "<h1>$nomobj</h1>";
			?>
		<h3><u>Le prix de cet objet et son pas : </u></h3>
			<?php
				echo "<h1 class=\"error\">le prix est : $prix €</h1>";
				echo "<h1>le pas de l'objet est de $pasobj €</h1>";
			?>
		<h3><u>De combien voulez-vous miser ? </u></h3>
			<?php
				/*si l'utilisateur n'as pas mit un pas supérieur ou égal*/
				switch ($error){
					case 1:
					echo "<B class=\"error\">merci de saisir une mise supérieure ou égale à $pasobj €</B>";
					break;
					case 2:
					echo "<B class=\"error\">Vous devez être connecté pour pouvoir miser sur cet objet</B>";
					break;
					case 3:
					echo "<B class=\"error\">Vous devez saisir une mise</B>";
					break;
				}
				echo"<br />\n";
				echo "<input type=\"mail\" name=\"miser\">";
				echo"<br />\n";
			?>
			<!--quand l'utilisateur a poser sa mise alors il valide sa mise-->
			<div class ="center">
				<input type="submit" class="bouton_encherir" value="Valider"></p>
			</div>
</div>
</form>

<?php
	
	footerHTML();
?>
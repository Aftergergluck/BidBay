<?php
	require 'head_foot.php';
	headerHTML();
	session_start();
	$login = $_SESSION['login'];

?>
<?php
	$error = isset($_GET['error']) ? $_GET['error'] : '';
?>
<?php
		//connexion à la base de données
		$db = "postgres";
		$user = "postgres";
		$pass = "postgres";
		$connect = pg_connect("dbname=$db user=$user password=$pass");
		$donnees = pg_exec($connect,"SELECT * FROM utilisateur");
		$var = 0;
		while ($row = pg_fetch_row($donnees)){
			if ( $row[0]==$login){
				//récupération des informations de l'utilisateur
				$var = 1;
				$_SESSION['passwd'] = $row[1];
				$_SESSION['nom'] = $row[2];
				$_SESSION['prenom'] = $row[3];
				$_SESSION['typeuser'] = $row[4];
				$_SESSION['adresseuser'] = $row[5];
				$_SESSION['telephone'] = $row[6];
				$_SESSION['datenaissanceuser'] = $row[7];
				$_SESSION['dateinscription'] = $row[8];
				$_SESSION['nbobjvendu'] = $row[9];
				$_SESSION['nbobjach'] = $row[10];
			}
		}
	$login = $_SESSION['login'];
	$passwd = $_SESSION['passwd'];
	$nom = $_SESSION['nom'];
	$prenom =$_SESSION['prenom'];
	$adresseuser = $_SESSION['adresseuser'];
	$telephone = $_SESSION['telephone'];
	$datenaissanceuser = $_SESSION['datenaissanceuser'];
	$dateinscription = $_SESSION['dateinscription'];
	$nbobjvendu = $_SESSION['nbobjvendu'];
	$nbobjach = $_SESSION['nbobjach'];
?>
<!--on affiche les differentes parti de notre compte qui sont la photo les infos perso, les infos du compte 
et les coordonnées, on insère du code php pour récupérer et afficher la valeur des variables qui contiennent les information  de l'utilisateur-->
<h1 class="Tpage">Mon Compte</h1>
	<form action="post_photo.php" method="post" enctype="multipart/form-data">
		<div class ="droite1_3">
			<?php
				$lienimage = "uploads/photouser/user".$login.".jpg";
				$lienimage2 = "uploads/photouser/user".$login.".jpeg";
				$lienimage3 = "uploads/photouser/user".$login.".gif";
				$lienimage4 = "uploads/photouser/user".$login.".png";
				if(!file_exists($lienimage)){
					$lienimage="photo_profil.jpg";
				}
				if(file_exists($lienimage2)){
					$lienimage=$lienimage2;
				}else if(file_exists($lienimage3)){
					$lienimage=$lienimage3;
				}else if(file_exists($lienimage4)){
					$lienimage=$lienimage4;
				}
				echo "<img src=\"".$lienimage."\"  width=\"150\" height=\"150\" border=3>";
			?>
			<br><input type="submit" class="bouton_inscr" value="Modifier"></br>
		</div>
	</form>
	<div class="gauche2_3">
		<form action="form_infoperso.php" method="post" enctype="multipart/form-data">
			<h2><b>Infomations personnelles</b></h2>
				<?php
					echo "<br />\n";
					echo "Votre Nom : $nom";
					echo "<br />\n";
					echo "Votre Prénom : $prenom";
					echo "<br />\n";
					echo "Votre date de naissance : $datenaissanceuser";
					echo "<br />\n";
				?>
			<div class="center">
				<input type="submit" class="bouton_inscr" value="Modifier"></p>
			</div>
		</form>
		<form action="post_infocompte.php" method="post" enctype="multipart/form-data">
			<h2><b>Infomations du compte</b></h2>
				<?php
					echo "<br />\n";
					echo "Votre mail est : $login , elle n'est pas modifiable";
					echo "<br />\n";
					switch ($error){
						case 1:
							echo "<B class=\"error\">merci de saisir deux fois le même mot de passe</B>";
							break;
					}
					echo "<br />\n";
					echo "Modifiez votre mot de passe :";
					echo "<br />\n";
					echo "<input type=\"password\" name=\"passwd1\">";
					echo "<br />\n";
					echo "Confirmez votre nouveau mot de passe : ";
					echo "<br />\n";
					echo "<input type=\"password\" name=\"passwd2\">";
					echo "<br />\n";
				?>
			<div class="center">
			<!--on peut appyer sur un bouton modifier pour changer certaines de nos informations-->
				<input type="submit" class="bouton_co" value="Valider"></p>
			</div>
		</form>
		<form action="form_coordonnees.php" method="post" enctype="multipart/form-data">
			<h2><b>Coordonnées</b></h2>
				<?php
					echo "<br />\n";
					echo "Votre Adresse : $adresseuser";
					echo "<br />\n";
					echo "Votre Telephone : +33$telephone";
					echo "<br />\n";
					echo "Votre Date d'inscription : $dateinscription";
					echo "<br />\n";
				?>
			<div class="center">
				<input type="submit" class="bouton_inscr" value="Modifier"></p>
			</div>
			<h2><b>Statistiques sur BidBay</b></h2>
				<?php
					echo "<br />\n";
					echo "Votre nombre d'objet vendu : $nbobjvendu";
					echo "<br />\n";
					echo "Votre nombre d'objet acheté : $nbobjach";
					echo "<br />\n";
				?>
		</form>
	</div>

<?php
	//require 'headfoot.php';
	footerHTML();
?>
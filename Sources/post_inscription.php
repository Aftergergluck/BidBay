<?php
	session_start();
	// Variables des différents champs à insérer dans la BDD et vérification champs non vide
	$jour = isset($_POST['jour']) ? $_POST['jour'] : '';
	$mois = isset($_POST['mois']) ? $_POST['mois'] : '';
	$annee = isset($_POST['annee']) ? $_POST['annee'] : '';
	if ($jour=='' || $mois=='' || $annee=='') {
		header('Location: inscription.php?error=1');
		break;
	}
	$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
	if ($prenom=='') {
		header('Location: inscription.php?error=1');
		break;
	}
	$nom = isset($_POST['nom']) ? $_POST['nom'] : '';
	if ($nom=='') {
		header('Location: inscription.php?error=1');
		break;
	}
	$mail = isset($_POST['mail']) ? $_POST['mail'] : '';
	if ($mail=='') {
		header('Location: inscription.php?error=1');
		break;
	}
	$mdp = isset($_POST['pass1']) ? $_POST['pass1'] : '';
	$pass2 = isset($_POST['pass2']) ? $_POST['pass2'] : '';
	if ($mdp=='' || $pass2=='') {
		header('Location: inscription.php?error=1');
		break;
	}
	// Vérification de la validité de la date de naissance
	$date=$jour."/".$mois."/".$annee;
	function is_valide_date($date, $sep='/')
	{
		if(!list($day, $month, $year) = explode($sep, $date))
			return false;
		if($day > 31 OR $day < 1 OR $month > 12 OR $month < 1 OR $year > 32767 OR $year < 1)
			return false;
		return checkdate($month, $day, $year);
	}
	if(is_valide_date($date))
		echo 'Date valide';
	else{
		header('Location: inscription.php?error=2');
		break;
    }
	// Infos de connexion
	$db = "postgres";
	$user = "postgres";
	$pass = "postgres";

	// Connexion
	$connect = pg_connect("dbname=$db user=$user password=$pass")
	or die("Erreur de connexion");
    
	// Vérification adresse mail pas déjà utilisée pour un autre compte
	if ($mail != '')
	{
		$query = "SELECT COUNT(*) FROM utilisateur WHERE mailutilisateur='$mail'";
		$result = pg_exec($connect, $query);
		$row=pg_fetch_array($result);
		if ($row[0] == 0){	// le mail renseigné n'est pas déjà utilisé pour un autre compte
			// Insertion dans la BDD                        
			$insert = "INSERT INTO utilisateur VALUES('$mail','$mdp','$nom','$prenom','USER',' ',NULL,'$date',now());"; 
			$resultat = pg_query($insert);	
			// Connexion du nouvel utilisateur à son compte
			$_SESSION['login']=$mail;
			require 'head_foot.php';
			headerHTML();
			echo "<p><br><br>Bienvenue sur Bidbay $prenom $nom. <br><br><br> Votre compte à bien été créé.<br><br><br></p>";
		}
		else{	// le mail est déjà utilisé pour un compte utilisateur
			header('Location: inscription.php?error=3');
			break;
		} 
	}		
	footerHTML();
?>

<?php
session_start();
	/*on récupère les informations que l'utilisateur à taper pour modifier les champs*/
	$mail=$_SESSION['login'];
	$adresseuser = isset($_POST['adresse']) ? $_POST['adresse'] : '';
	$telephone = isset($_POST['telephone']) ? $_POST['telephone'] : '';
	/*s'il les deux champs sont vide alors on retourne sur mon compte*/
	if ($adresseuser=='' && $telephone=='') {
		header('Location: moncompte.php');
	}
	/*sinon on se connecte à la base de données*/
	else{
		$db = "postgres";
		$user = "postgres";
		$pass = "postgres";
		$connect = pg_connect("dbname=$db user=$user password=$pass");
		/*si un ou plusieurs variables sont vides alors on va modifier la valeurs dans la base de données là où les variable ne sont pas vides*/
		if ($adresseuser!='' && $telephone==''){
			$donnees = pg_exec($connect,"UPDATE utilisateur SET adresseuser='$adresseuser' WHERE mailutilisateur='$mail'");
		}
		elseif ($adresseuser=='' && $telephone!=''){
			$sql = "UPDATE utilisateur SET telephone='$telephone' WHERE mailutilisateur='$mail'";
			$donnees = pg_exec($connect,$sql);
		}
		elseif ($adresseuser=='' && $telephone==''){
			$sql = "UPDATE utilisateur SET 	adresseuser='$adresseuser', telephone='$telephone' WHERE mailutilisateur='$mail'";
			$donnees = pg_exec($connect,$sql);
		}
		header('Location: moncompte.php');
	}
?>
<?php
session_start();
/*on récupère les informations que l'utilisateur à taper pour modifier les champs*/
	$mail=$_SESSION['login'];
	$nom1 = isset($_POST['nom1']) ? $_POST['nom1'] : '';
	$prenom1 = isset($_POST['prenom1']) ? $_POST['prenom1'] : '';
	/*s'il les deux champs sont vides alors on retourne sur mon compte*/
	if ($nom1=='' && $prenom1=='') {
		header('Location: moncompte.php');
	}
	/*sinon on se connecte à la base de données*/
	else{
		$db = "postgres";
		$user = "postgres";
		$pass = "postgres";
		$connect = pg_connect("dbname=$db user=$user password=$pass");
		/*si un ou plusieurs variables sont vides alors on va modifier la valeurs dans la base de données là où les variable ne sont pas vides*/
		if ($nom1!='' && $prenom1==''){
			$donnees = pg_exec($connect,"UPDATE utilisateur SET nom='$nom1' WHERE mailutilisateur='$mail'");
		}
		elseif ($nom1=='' && $prenom1!=''){
			$sql = "UPDATE utilisateur SET prenom='$prenom1' WHERE mailutilisateur='$mail'";
			$donnees = pg_exec($connect,$sql);
		}
		elseif ($nom1!='' && $prenom1!=''){
			$sql = "UPDATE utilisateur SET nom='$nom1', prenom='$prenom1' WHERE mailutilisateur='$mail'";
			$donnees = pg_exec($connect,$sql);
		}
		header('Location: moncompte.php');
	}
?>
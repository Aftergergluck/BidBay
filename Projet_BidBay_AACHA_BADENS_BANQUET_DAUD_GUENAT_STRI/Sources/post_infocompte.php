<?php
session_start();
/*on récupère les informations que l'utilisateur à taper pour modifier les champs*/
	$mail=$_SESSION['login'];
	$passwd1 = isset($_POST['passwd1']) ? $_POST['passwd1'] : '';
	$passwd2 = isset($_POST['passwd2']) ? $_POST['passwd2'] : '';
	/*s'il les deux champs sont vides alors on retourne sur mon compte*/
	if ($passwd1=='' && $passwd2=='') {
		header('Location: moncompte.php');
	}
	/*sinon on se connecte à la base de données*/
	else{
		$db = "postgres";
		$user = "postgres";
		$pass = "postgres";
		$connect = pg_connect("dbname=$db user=$user password=$pass");
		/*si les deux mots de passe celui sont pareil alors on modifie dans la base*/
		if ($passwd1 == $passwd2){
			$donnees = pg_exec($connect,"UPDATE utilisateur SET mdp='$passwd1' WHERE mailutilisateur='$mail'");
			header('Location: moncompte.php');
		}
		/*sinon on retourne sur la page avec un message d'erreur*/
		else{
			header('Location: form_infocompte.php?error=1');
		}
	}
?>
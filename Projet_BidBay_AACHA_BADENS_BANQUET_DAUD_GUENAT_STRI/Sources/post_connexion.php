
<?php
session_start();

	/*on récupère les infos que l'utilisateur a écrit dans les champs login et mot de passe*/
	$login = isset($_POST['mail']) ? $_POST['mail'] : '';
	$passwd = isset($_POST['pass1']) ? $_POST['pass1'] : '';
	/* si c'est vide on met un message d'erreur*/
	if ($login=='' || $passwd=='') {
		header('Location: connexion.php?error=1');
	}
	/*sinon on se connnecte à la base de données pour vérifier si les infos sont bonnes et que l'utilisateur est bien inscrit dans la base*/
	else{
		$db = "postgres";
		$user = "postgres";
		$pass = "postgres";
		$connect = pg_connect("dbname=$db user=$user password=$pass");
		$donnees = pg_exec($connect,"SELECT mailutilisateur,mdp FROM utilisateur");
		$var = 0;
		/*s'il est bien inscrit et que le mot de passe est correct alors il est connecté et redirigé vers la page moncompte
		sinon il sera renvoyer à la page de connexion et affichera un message d'erreur*/
		while ($row = pg_fetch_row($donnees)){
			if ( $row[0]==$login && $row[1]==$passwd){
				$var = 1;
			}
		}
		if ($var == 1){
		$_SESSION['login'] = $_POST['mail'];
		header('Location: moncompte.php');
		}
		else{
		header('Location: connexion.php?error=2');
		}
	}
?>
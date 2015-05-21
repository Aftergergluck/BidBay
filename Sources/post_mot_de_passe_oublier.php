<?php
	session_start();

	$login = isset($_POST['mail']) ? $_POST['mail'] : '';
	if ($login=='') {
		header('Location: mot_de_passe_oublier.php?value=1');
	}
	else{
		$db = "postgres";
		$user = "postgres";
		$pass = "postgres";
		$connect = pg_connect("dbname=$db user=$user password=$pass");
		$donnees = pg_exec($connect,"SELECT mailutilisateur,mdp FROM utilisateur");
		$var = 0;
		while ($row = pg_fetch_row($donnees)){
			if ( $row[0]==$login){
				$var = 1;
				$_SESSION['passwd'] = $row[1];
			}
		}
		if ($var == 1){
			$passwd = $_SESSION['passwd'];
			$destinataire = $login; // adresse mail du destinataire
			$sujet = "Recuperation de votre mot de passe BidBay"; // sujet du mail
			$message = "$passwd"; // message qui dira que le destinataire a bien lu votre mail
			mail ($destinataire, $sujet, $message); // on envois le mail
			header('Location: mot_de_passe_oublier.php?value=2&login'.$login);
		}
		else{
			header('Location: mot_de_passe_oublier.php?value=3&login'.$login);
		}
	}
?>
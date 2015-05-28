<?php
	session_start();

	$login = isset($_POST['mail']) ? $_POST['mail'] : '';
	if ($login=='') {
		header('Location: mot_de_passe_oublier.php?value=1');
	}
	/*si le champs login est vide on renvoit un message d'erreur*/
	else{
		/*on se connecte à la base de données*/
		$db = "postgres";
		$user = "postgres";
		$pass = "postgres";
		$connect = pg_connect("dbname=$db user=$user password=$pass");
		$donnees = pg_exec($connect,"SELECT mailutilisateur,mdp FROM utilisateur");
		/*on récupère les informations et on vérifie si elles sont bonnes*/
		$var = 0;
		while ($row = pg_fetch_row($donnees)){
			if ( $row[0]==$login){
				$var = 1;
				$_SESSION['login'] = $row[0];
				$_SESSION['passwd'] = $row[1];
				/*si c'est bon on récupère le mot de passe*/
			}
		}
		/*on envoit alors un mail à l'utilisateur*/
		if ($var == 1){
			/*on rempli les champs pour l'envoi du mail et on redirige vers la page de mot de passe oublié en indiquant qu'un mail a bien été envoyé */
			$passwd = $_SESSION['passwd'];
			$destinataire = $_SESSION['login']; // adresse mail du destinataire
			$expediteur = $_SESSION['login']; //addresse mail expediteur
			$objet = "Recuperation de votre mot de passe BidBay"; // sujet du mail
			$headers  = 'MIME-Version: 1.0' . "\n"; //Version MIME
			$headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n"; //en-tête content type format HTML
			$headers .= 'Reply-to: '.$expediteur."\n"; //mail de reponse
			$headers .= 'From: "Nom_de_expediteur"<'.$expediteur.'>'."\n"; // Expediteur
			$headers .= 'Delivred-to: '.$destinataire."\n"; //destinataire
			$message = '<div style="width: 100%; text-align: center; font-weight: bold"> Bonjour de BidBay !</div>'; // message qui dira que le destinataire a bien lu votre mail
			mail ($destinataire, $objet, $message, $headers); // on envois le mail
			header('Location: mot_de_passe_oublier.php?value=2&login'.$login);
		}
		/*si le mail n'est pas la base alors on renvoit un message d'erreur*/
		else{
			header('Location: mot_de_passe_oublier.php?value=3&login'.$login);
		}
	}
?>
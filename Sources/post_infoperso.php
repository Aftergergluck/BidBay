<?php
session_start();
	$mail=$_SESSION['login'];
	$nom1 = isset($_POST['nom1']) ? $_POST['nom1'] : '';
	$prenom1 = isset($_POST['prenom1']) ? $_POST['prenom1'] : '';
	if ($nom1=='' && $prenom1=='') {
		header('Location: moncompte.php');
	}
	else{
		$db = "postgres";
		$user = "postgres";
		$pass = "postgres";
		$connect = pg_connect("dbname=$db user=$user password=$pass");
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
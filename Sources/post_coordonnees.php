<?php
session_start();
	$mail=$_SESSION['login'];
	$adresseuser = isset($_POST['adresse']) ? $_POST['adresse'] : '';
	$telephone = isset($_POST['telephone']) ? $_POST['telephone'] : '';
	if ($adresseuser=='' && $telephone=='') {
		header('Location: moncompte.php');
	}
	else{
		$db = "postgres";
		$user = "postgres";
		$pass = "postgres";
		$connect = pg_connect("dbname=$db user=$user password=$pass");
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
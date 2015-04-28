<?php

	ini_set('display_errors','On');
	error_reporting(E_ALL);

	require 'exercice13-14.php';
	EnteteHTML("Login","");
	
	// Infos de connexion
	$db = "postgres";
	$user = "postgres";
	$pass = "postgres";

	// Connexion
	$connect = pg_connect("dbname=$db user=$user password=$pass");
	if ($connect)
	{
		echo "Connexion établie avec la base de données.<br/>";
	}
	else
	{
		die("Erreur de connexion");
	}
	
	// Requête : construction et exécution
	$username = $_POST['login'];
	$ajoute = false;
	$query = "SELECT login FROM id_users WHERE login ~ '^$username.*'";
	$result = pg_exec($connect,$query);
	echo "Requête exécutée.";
	
	// Traitement de la requête
	$num=pg_num_rows($result);
	
	for ($i=0;$i<=$num;$i++)
	{
		echo $result[$i];
	}
	
	if ($num)
	{
		for ($i=0; $i<=$num; $i++)
		{
			$row=pg_fetch_array($result);
			// Si (le login.numéro n'est pas déjà là) et (que nous n'avons pas encore ajouté de pseudo) et (que le login.0 n'est pas compté)
			if (($username.$i <> $row['login']) && !$ajoute && !(($i == 0) && ($row['login'] == $username)))
			{
				// Ajout du pseudo à la base de données.
				$query = "INSERT INTO id_users (login) VALUES ('".$username.$i."')";
				pg_exec($connect,$query) or die("Erreur dans l'ajout à la BDD.");
				$ajoute = true;
			}
		}
	}
	else
	{
		// Ajout du pseudo à la base de données.
		$query = "INSERT INTO id_users (login) VALUES ('$username')";
		pg_exec($connect,$query);
	}
?>
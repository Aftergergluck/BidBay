<?php

	ini_set('display_errors','On');
	error_reporting(E_ALL);

	require 'head_foot.php';
	headerHTML();
	
	// Infos de connexion
	$db = "Bidbay";
	$user = "postgres";
	$pass = "postgres";

	// Connexion
  
	$connect = pg_connect("dbname=$db user=$user password=$pass")
   or die("Erreur de connexion");
	
	// Requête : construction et exécution
	//$username = $_POST['login'];
  /*
  $nomobj = $_POST['nomobj'];
  $catego = $_POST['catego'];
  $montench = $_POST['montench'];
  $pasmin = $_POST['pasmin'];
  $lot = $_POST['lot'];
  $desc = $_POST['desc'];
  $datefin = $_POST['datefin'];
  
	$query = "SELECT COUNT (*) FROM objet;" ;
	$result = pg_exec($connect, $query);
	echo "Requete exécutee. ";
  // Recuperation nombre objets dans BDD
	 $idobj = pg_affected_rows($result) + 1;  
                                
  $insert = "INSERT INTO objet VALUES( 
        idobjet = "+$idobj+",
        prix = "+$montench+",
        nomobjet = "+$nomobj+",
        descriptionobj = "+$desc+",
        imageobj = "false",
        pasobjet = "+$pasmin+",
        quantiteobj = "+$lot+",
        datelimitevente = "+$datefin+",
        idcategorie = "+$catego+",
        montantvente =  "+$montench+",
        mailutilisateur = "manu@aacha.fr",
        mailutilisateur_1 = "victim@express.fr"
        );";                     
  echo $insert;
  $resultat = pg_query($connect, $insert);      
                
  $insert = "INSERT INTO test VALUES("garga3", "5") ;";
  
  $resultat = pg_query($connect, $insert);      
  echo "Requete effectuee";     */ 
	footerHTML();
?>
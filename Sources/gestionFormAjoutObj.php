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
	
  // Variables des différents champs à insérer dans la BDD
  $nomobj = $_POST['nomobj'];
  $catego = $_POST['catego'];
  $montench = $_POST['montench'];
  $pasmin = $_POST['pasmin'];
  $lot = $_POST['lot'];
  $desc = $_POST['desc'];
  $datefin = $_POST['datefin'];
  
  // Recuperation nombre objets dans BDD
  // Affectation l'idobjet
  
	$query = "SELECT COUNT (*) FROM objet;" ;
	$result = pg_exec($connect, $query);
	$row=pg_fetch_array($result);
  $idobj = $row[0] + 1 ;
  
  // Insertion dans la BDD                        
  $insert = "INSERT INTO objet VALUES( 
          '$idobj',
          '$montench',
          '$nomobj',
          '$desc',
          'false',
          '$pasmin',
          '$lot',
          '15/05/2015',
          '4',
          '$montench',
          'manu@aacha.fr',
          'victim@express.fr'
        );";                     

  $resultat = pg_query($insert);      
  echo "Requete effectuee";     
	footerHTML();
?>
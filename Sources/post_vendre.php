<?php

  ini_set('display_errors','On');
  error_reporting(E_ALL);

  require 'head_foot.php';
  headerHTML();
  
  // Infos de connexion
  $db = "postgres";
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
  $duree = $_POST['duree'];

  // Recuperation nombre objets dans BDD
  // Affectation l'idobjet
  
  $query = "SELECT COUNT (*) FROM objet;" ;
  $result = pg_exec($connect, $query);
  $row=pg_fetch_array($result);
  $idobj = $row[0] + 1 ;

   $query1 = "SELECT idcategorie FROM categorie WHERE typecategorie='$catego'";
   $result1 = pg_exec($connect, $query1);
   $row1 = pg_fetch_array($result1);
   $idCategorie = $row1[0] ;

   $mail = $_SESSION['login'];
  
  // Insertion dans la BDD                        
  $insert = "INSERT INTO objet VALUES( 
          '$idobj',
          '$nomobj',
          '$montench',
          '$pasmin',
          '$lot',
          '$desc',  
          now(),
          now() + interval '$duree days',
          '$idCategorie',
          '$mail'
          
        );";                      
         
         
  $resultat = pg_query($insert);      
  echo "Requete effectuee";     
  footerHTML();
?>
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
          '$mail',
          NULL,
          NULL
        );";                      
         
         
  pg_query($insert); 
  echo $idCategorie;  
  echo "Requete effectuee";     



//Traitement de l'image  
    if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0)
      {
        // Test de la taille du fichier < 3Mo
        if ($_FILES['image']['size'] <= 3000000)
        {
                // Test extension
                $infosfichier = pathinfo($_FILES['image']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // Validation et stockage
                        // Sous le nom objeti  i étant l'idobjet
                        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads\photoobjet\objet' .$idobj);
                        echo "L'envoi a bien été effectué !";
                }
        }
      }


  
  footerHTML();
?>
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
      
      //Traitement de l'image et stocke dans fichier uploads
      if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0)
      {
        // Test de la taille du fichier < 3Mo
        if ($_FILES['image']['size'] <= 3000000)
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['image']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' .
basename($_FILES['image']['name']));
                        echo "L'envoi a bien été effectué !";
                }
        }
      }

  
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
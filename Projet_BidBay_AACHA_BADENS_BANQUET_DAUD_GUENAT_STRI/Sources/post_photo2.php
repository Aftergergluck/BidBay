<?php

  ini_set('display_errors','On');
  error_reporting(E_ALL);

  require 'head_foot.php';
  headerHTML();
  


   $mail = $_SESSION['login'];

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
                        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads\photouser\user'.$mail.".".$extension_upload);
                        echo "L'envoi a bien été effectué !";
                }
        }
      }


  
  footerHTML();
?>
<?php
	require 'head_foot.php';
	headerHTML();
  
?>
      <!-- Fichiers necessaires pour javascript --> 
      <link href="javascriptv2/jquery-ui.css" rel="stylesheet">
      <script src="javascriptv2/external/jquery/jquery.js"></script>
      <script src="javascriptv2/jquery-ui.js"></script>
      <script type="text/javascript"
        src="http://jqueryui.com/ui/i18n/jquery.ui.datepicker-fr.js">
      </script>
	   <form method="POST" action="post_photo2.php" id="ajoutobj" enctype="multipart/form-data">
			<fieldset>
	   <div class="pageobj" style="text-align: center" >
	  
 <!--gestion des images  -->   
        Choisir votre nouvelle Image :  <br> <input type="file" name="image"/>                            
        <br><br>
        
        <input type="submit" name="submit" value="Deposer"/> 
      
      <?php
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
                        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads\photouser' .basename($_FILES['image']['name']));
                        echo "L'envoi a bien été effectué !";
                }
        }
      }

      ?>
	</fieldset>
		</form>
<?php
	//require 'headfoot.php';
	footerHTML();
?>
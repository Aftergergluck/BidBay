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
      
      <!-- Formulaire d'ajout d'objet -->
  	<form method="POST" action="post_vendre.php" id="ajoutobj" enctype="multipart/form-data">
			<fieldset>
        <div class="pageobj" style="text-align: center" >
				<h2 class="Tdesc"> Ajouter un objet en ligne <br><br> </h2>
			 	Nom de cet objet : <br><input type="text" name="nomobj" class="nomobj" value="<?php if(isset($_POST['nomobj'])) echo $_POST['nomobj']; ?>" required  >
        <br><br>
        
         <!--Selectmenu de javascript/HTML avec groupes/sous-groupes -->
        Categories :  <br>
        <select type="select" id="selectmenu" name="catego" value="<?php if(isset($_POST['catego'])) echo $_POST['catego']; ?>" required="">
          <option></option>  
          <optgroup label="-VEHICULES-">
            <option>Auto</option>
            <option>Moto</option>
            <option>Caravaning</option>
            <option>Pieces</option>
          <optgroup label="-IMMOBILIER-">
            <option>Ventes</option>
            <option>Locations</option>
            <option>Colocations</option>
          <optgroup label ="-MULTIMEDIA-">
            <option>Informatique</option>
            <option>Consoles & Jeux</option>
            <option>Image / Son</option>
            <option>Telephonie</option>
          <optgroup label="-LOISIR">
            <option>DVD / Films </option>
            <option>CD / Musique</option>
            <option>Instruments de musique</option>
            <option>Sports / Hobbies</option>
            <option>Jeux & Jouets</option>
          <optgroup label="-MAISON-">
            <option>Vêtements</option>
            <option>Ameublement</option>
            <option>Electromenager</option>
            <option>Jardinage</option>
            <option>Decoration</option>
            
          </optgroup> 
        </select>
        <br> <br>
        
         <!--Champ de type Spinner JQuery--> 
        Montant enchere : <br><input class="spinner" name="montench" required/>  
        <br><br>
        Pas minimal : <br><input class="spinner" name="pasmin" required/>  
        <br><br>
        Lot de :  <br>  <input class="spinner" value="1" name="lot" required/>
        <br><br>
        
         <!--Texte descriptif  -->
        Entrez une description :  <br>
        <Textarea name="desc" rows=3 cols=50 required ></textarea>
        <br><br>
        <!--Champ de type Spinner JQuery -->
        Durée de l'enchère :<br> <br>  <input class="spinner" value="1" name="duree" required /> (En jours)
        <br><br> 
         <!--gestion des images  -->   
        Image :  <br> <input type="file" name="image"/>                            
        <br><br>
        
        <input type="submit" name="submit" value="Deposer"/>
      </div>   

      
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
                        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads\photoobjet' .basename($_FILES['image']['name']));
                        echo "L'envoi a bien été effectué !";
                }
        }
      }

      ?>


        
       <!--Code fonctions javascript  -->
      <script> 
      
          //L'autocomplete sur le nom d'objet
          $( ".nomobj" ).autocomplete();
          

           
           //Element spinner, pas 5                                                           
          $( ".spinner" ).spinner({
             min: 1
          });
                              

           //Selectmenu, épaisseur 200      
          $( "#selectmenu" ).selectmenu({
             width: 200
          });

          $("#ajoutobj").validate();
           
                 

      </script>
			</fieldset>
		</form>
	</body>
</html>
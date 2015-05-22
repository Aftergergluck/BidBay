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
  	<form method="POST" action="gestionFormAjoutObj.php" enctype="multipart/form-data">
			<fieldset>
        <div class="pageobj" >
				<h2 class="Tdesc"> Ajouter un objet en ligne <br><br> </h2>
			 	Nom de cet objet : <br><input type="text" name="nomobj" class="nomobj" onblur="verifNomobj(this)"  >
        <br><br>
        
         <!--Selectmenu de javascript/HTML avec groupes/sous-groupes -->
        Categories :  <br>
        <select id="selectmenu" name="catego">
        	<option></option>
        	<option>Electromenager</option>
        	<option>Ameublement</option>
        	<option>Exterieur</option>
        	<option>Habits</option>
          <optgroup label="Informatique">
            <option>Claviers</option>
            <option>Souris</option>
            <option>Ecran</option>
            <option>Pieces</option>
          </optgroup> 
        </select>
        <br> <br>
        
         <!--Champ de type Spinner JQuery--> 
        Montant enchere : <br><input class="spinner" name="montench"/>  
        <br><br>
        Pas minimal : <br><input class="spinner" name="pasmin" />  
        <br><br>
        Lot de :  <br>  <input class="spinner" value="1" name="lot"/>
        <br><br>
        
         <!--Texte descriptif  -->
        Entrez une description :  <br>
        <Textarea name="desc" rows=3 cols=50 ></textarea>
        <br><br>
         <!--Element datepicker de Javascript -->
        Date Fin :<br> <input type="date" id="datepicker" name="datefin"/>
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
                        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . basename($_FILES['image']['name']));
                        echo "L'envoi a bien été effectué !";
                }
        }
      }

      ?>


        
       <!--Code fonctions javascript  -->
      <script> 
      
          //L'autocomplete sur le nom d'objet
          $( ".nomobj" ).autocomplete();
          
          //Datepicker, impossible de faire fonctionner le regional["fr"]
          $(function() {
             var date = new Date;
             $("#datepicker").datepicker({
                   beforeShowDay: function(date1){
                      return [date < date1, ""];
                   }      
             })
          }); 
          

           /*
          $( "#datepicker").datepicker.setDefaults({
            $.datepicker.regional[ "fr" ]
          }); */

           
           //Element spinner, pas 5                                                           
          $( ".spinner" ).spinner({
             step: 5
          });
                              

           //Selectmenu, épaisseur 200      
          $( "#selectmenu" ).selectmenu({
             width: 200
          });

          
          //Nom d'objet compris entre 4 et 25 caractères  
          function verifNomobj(champ)
          {
           if(champ.value.length < 4 || champ.value.length > 25)
           {
              surligne(champ, true);
              return false;
           }
           else
           {
              surligne(champ, false);
              return true;
           }
          }

          function verifSelectmenu(champ)
          {
           if(champ.value < 4 || champ.value.length > 25)
           {
              surligne(champ, true);
              return false;
           }
           else
           {
              surligne(champ, false);
              return true;
           }
          }
           
                 

      </script>
			</fieldset>
		</form>
	</body>
</html>
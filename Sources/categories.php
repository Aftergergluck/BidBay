<?php
	require 'head_foot.php';
	headerHTML();
?>

<form name="Categorie" method="POST" action="categories.php">
<label for="Manufacturer"> Choisissez la catégorie de votre choix : </label>
  <select id="cmbMake" name="Make"     onchange="document.getElementById('selected_text').value=this.options[this.selectedIndex].text">
     <option value="0">Selectionner une catégorie</option>
     <option value="1">Auto</option>
     <option value="2">Moto</option>
     <option value="3">Caravannes</option>
     <option value="4">Pièces</option>
     <option value="5">Ventes</option>
     <option value="6">Location</option>
     <option value="7">Colocations</option>
     <option value="8">Informatique</option>
     <option value="9">Consoles et jeux</option>
     <option value="10">Images / Son</option>
     <option value="11">Telephonie</option>
     <option value="12">DVD / Films</option>
     <option value="13">CD / Musique</option>
     <option value="14">Instrument de musique</option>
     <option value="15">Sport / Hobbies</option>
     <option value="16">Jeux et Jouets</option>
     <option value="17">Vêtements</option>
     <option value="18">Aumeublement</option>
     <option value="19">Electroménager</option>
     <option value="20">Jardinage</option>
</select>
<input type="hidden" name="selected_text" id="selected_text" value="" />
<input type="submit" name="rechercher" value="Rechercher"/>
</form>

 <?php
	function dateFormat($date)
	{
		$d = $date;
		$d = explode('-', $d);
		$chaine = $d[2] ." ".$d[1]." ".$d[0];
		return $chaine;
	}
	 

	 echo "<br> <br>";



if(isset($_POST['Make']))
{
	$idcat = $_POST['Make'];
	$db = "postgres";
	$user = "postgres";
	$pass = "postgres";
	$connect = pg_connect("dbname=$db user=$user password=$pass");
	$donnees = pg_exec($connect,"SELECT * FROM objet WHERE idcategorie=".$idcat);
	$cat = pg_exec($connect,"SELECT * FROM categorie WHERE idcategorie=".$idcat);
	$nomcat = pg_fetch_row($cat);
 	echo "<h1 class=\"Tpage\"> Objet(s) dans la categorie \"".$nomcat[1]."\" :</h1>";
		$i = 0;
		$nbObj = 0;
		while($row = pg_fetch_row($donnees)){
			
			if($i != 0){ //Affichage d'un séparateur
				echo " <hr width=\"50%\" color=\"black\" size=\"1\" align=\"center\"> ";
			}

			//Initialisation variable date
			$date = dateFormat(substr($row[7],0, 10));

			$req_vendeur = pg_exec($connect, "SELECT * FROM Utilisateur WHERE mailutilisateur = '".$row[9]."'");
			$vendeur = pg_fetch_row($req_vendeur);
			$lienimage = "uploads/photoobjet/objet".$row[0].".jpg";
			if(!file_exists($lienimage)){
				$lienimage="photo_objet_defaut.png";
			}
			echo "<table><tr><td rowspan=\"2\" align=\"center\">Fin le :<br>".$date."<td rowspan=\"2\"><a href=\"objet.php?id=".$row[0]."\"> <img src=\"".$lienimage."\" width=\"150px\" height=\"150px\"></a></td><td height =\"30\"><a href=\"objet.php?id=".$row[0]."\">".$row[1]."</a> Vendu par <a href=\"compteother.php?mail=".$row[9]."\">".$vendeur[3]." ".$vendeur[2]."</a></td></tr><tr><td align=\"left\" width=\"300px\">".$row[5]."</td><td rowspan=\"2\" align=\"center\" > Prix : ".$row[2]." € </td></tr></table>";
			$nbObj++;
			$i++;
		}
		if($nbObj == 0){
			echo "Aucun résultat trouvé...";
		}


}
?>
<?php
	//require 'headfoot.php';
	footerHTML();
?>
<?php
	require 'head_foot.php';
	headerHTML();
?>
<link href="jquery-ui.css" rel="stylesheet">
<script src="external/jquery/jquery.js"></script>
<script src="jquery-ui.js"></script>

<h1 class="Tpage">Bienvenu sur BidBay ! </h1>
	<p>Fromage</p>
	<input id="datepicker" type="date" name="date">
	<script type="text/javascript">
   
		$( "#datepicker" ).datepicker({
		inline: true
		});

		
	</script>


	<div class="Dernobjaj"> 
		<h2 class="Tdesc">Derniers objets ajoutés : </h2>
		<h3 class="Tobj">Nom Objet</h3>
			
		<p>Tout type de texte : </p>
		<ul>
			<li style="list-style-type:none">- descriptions d'objets</li>
			<li style="list-style-type:none">- textes explicatifs</li>
			<li style="list-style-type:none">- champs de <a href="connexion.html">connexion</a> ou d'<a href="inscription.html">inscription</a></li>
			<li style="list-style-type:none">- onglets</li>
			<li style="list-style-type:none">- </li>
		</ul>
			
		<p class=prix>prix : 50 €<br><br><br><br><br></p>
		<p class=fin>Attention, enchère bientôt terminée</p>
		<a class="bouton_encherir" href="index.html">Enchérir</a>
		<a class="bouton_depos" href="index.html">Déposer</a>
		<a class="bouton_payer" href="index.html"><span class="paye">Payer</span></a>
		<a class="bouton_noter" href="index.html"><span class="note">Noter</span></a>

	</div>
	
<?php
	
	footerHTML();
?>
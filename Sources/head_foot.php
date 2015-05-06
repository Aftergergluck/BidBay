<?php
   function headerHTML()
   {
		session_cache_expire();		// peut être fonction session
		session_start();			// peut être fonction session
		echo "<!doctype html>";
		echo "<html>";
		echo "<head>";
		echo "<link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"images/favicon.png\" />";
		echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />";
		echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"styles/template.css\">";
		echo "<title>BidBay</title>";
		echo "<div class=\"entete\"><img class=\"logo\" src=\"images/logo.png\" alt=\"logo du site web\"/>";
		if(isset($_SESSION) && (!isset($_SESSION['login']) || ($_SESSION['login']=="Deco") || ($_SESSION['login']=="erreur") || ($_SESSION['login']=="manque"))) //Déconnecté
		{
			echo "<a class=\"bouton_inscr\" href=\"inscription.php\">Inscription</a>";
			echo "<a class=\"bouton_co\" href=\"connexion.php\">Connexion</a>";
		}
		else
		{
			echo "<a class=\"deco\" href=\"deconnexion.php\">Déconnexion</a>";
			echo "<p class=\"mail\">test-stri@projet_web.com</p>";
		}
		echo "<p class=\"rech\"><a class=\"bouton_rech\" href=\"index2.html\"><img class=\"img_rech\" src=\"images/trouver-recherche.png\" alt=\"rech\"></a>Recherche : <input type=\"text\" name=\"recherche\" placeholder=\"Votre recherche...\"></p></div>";
		echo "<nav style=\"text-align:center\">";
		echo "<a href=\"accueil.php\">Accueil</a>";
		echo "<a href=\"categories.php\">Catégories</a>";
		echo "<a href=\"encheres.php\">Enchères</a>";
		echo "<a href=\"moncompte.php\">Mon Compte</a>";
		echo "<a href=\"faq.php\">FAQ/Aide</a>";
		echo "</nav>";
		echo "</head>";
		echo "<body><section>";
   }
   
   function footerHTML()
   {
		echo "</section></body>";
		echo "<footer>";
		echo "<p>Projet Web BidBay © Copyright ~ Contact : administrateur@bidbay.fr<br>Aacha ~ Badens ~ Banquet ~ Daud ~ Guenat</p>";
		echo "</footer>";
		echo "</html>";
   }
   
?>		
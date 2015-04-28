<?php

	function EnteteHTML($titre,$texte)
	{
		echo"<!DOCTYPE html>";
		echo"<html>";
		echo"<head>";
		echo"<title>$titre</title>";
		echo"<meta charset=\"utf-8\"/>";
		echo"</head>";
		echo"<body>";
		echo"<p style=\"text-align : center\">$texte</p>";
		
		echo"</body></html>";
	}
	
	function checkAdrMail($mail)
	{
		$add=explode('@',$mail);
		if(count($add) < 2)
		{
			echo "<p>Adresse mail incorrecte !</p>";
		}
		else
		{
			echo "<p>Le nom est : $add[0].<br />Le domaine est : $add[1].</p>";
		}
	}
?>
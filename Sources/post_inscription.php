<?php
# Vérifie la validité d'une date
session_start();
$jour = isset($_POST['jour']) ? $_POST['jour'] : '';
$mois = isset($_POST['mois']) ? $_POST['mois'] : '';
$annee = isset($_POST['annee']) ? $_POST['annee'] : '';
if ($jour=='' || $mois=='' || $annee=='') {
	header('Location: inscription.php?error=1');
}
$date=$jour."/".$mois."/".$annee;
function is_valide_date($date, $sep='/')
{
	if(!list($day, $month, $year) = explode($sep, $date))
		return false;
 
	if($day > 31 OR $day < 1 OR $month > 12 OR $month < 1 OR $year > 32767 OR $year < 1)
		return false;
 
	return checkdate($month, $day, $year);
}
if(is_valide_date($date)) // Affiche "Ok"
	echo 'Ok';
else
	echo 'non !!!';
?>

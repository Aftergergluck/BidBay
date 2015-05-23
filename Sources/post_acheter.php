<?php
	require 'head_foot.php';
	headerHTML();
	session_start();
	$idobj = $_SESSION['idobj'];
	$nomobj = $_SESSION['nomobj'];
	$login = $_SESSION['login'];
	$pas = $_SESSION['pasobj'];
	$ancienprix = $_SESSION['prix'];
?>

<?php
		/*on récupère les infos que l'utilisateur a écrit dans les champs login et mot de passe*/
		$mise = isset($_POST['miser']) ? $_POST['miser'] : '';
		/*on vérifie si l'utilisateur est connecté*/
		if($login== ''){
			header('Location: acheter.php?error=2');
		}
		/*on vérifie si l'utilisateur a saisi un prix*/
		elseif($mise ==''){
			header ('Location: acheter.php?error=3');
		}
		/*on vérifie si l'utilisateur a saisi un prix supérieur au pas*/
		elseif($mise < $pas){
			header ('Location: acheter.php?error=1');
		}
		else{
			$nouveauprix = $mise + $ancienprix;
			/*connexion à la base de donnée*/
			$db = "postgres";
			$user = "postgres";
			$pass = "postgres";
			$connect = pg_connect("dbname=$db user=$user password=$pass");
			/*on change dans la base de données on met à jour le prix et le dernier utilisateur qui a miser sur l'objet*/
			pg_exec($connect,"UPDATE objet SET mailacheteur='$login', prixinit='$nouveauprix' WHERE nomobj='$nomobj'");
			header("Location: objet.php?id='$idobj'");
		}
?>

<?php
	//require 'headfoot.php';
	footerHTML();
?>
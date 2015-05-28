<?php
	require 'exercice13-14.php';
	EnteteHTML("Exercice 15","");
?>
		<form method="POST" action="login.php">
			<fieldset>
				<legend>Entrez vos identifiants pour le royaume des pommes</legend>
			
				<label for="login">Login : </label>
				<input type="text" name="login" placeholder="Aftergergluck" /><br />
				<input type="submit" name="submit" value="Submit"/>
			</fieldset>
		</form>
	</body>
</html>
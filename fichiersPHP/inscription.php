<?PHP
require_once("entete_footer.php");//inclus le fichier entete
entete('inscription');
$error=
?>

<h2 style="background:blue"> Inscription </h2>

<form action="verification_creation_compte.php" method="POST">
	<fieldset>
	<legend>Informations de connexion</legend>
	Indiquez une adresse email valide: <input type="email" name="email"  required><br/>
	Choisissez un nom d'utilisateur: <input type="text" name="login" required><br/>
	Choisissez un mot de passe: <input type="password" name="psswd" required><br/>
	Confirmez mot de passe: <input type="password" name="psswdBis" required><br/>
	</fieldset>
	<br/>
	<fieldset>
	<legend>Informations Personnelles</legend>
	Nom: <input type="text" name="nom" required> 
	Téléphone: <input type="tel" name="telephone"> <br/>
	Prénom: <input type="text" name="prenom" required> 
	Date de naissance: <input type="date" name="date" required> <br/>
	Adresse: <textarea name="adresse" required></textarea><br/>
	Code postal: <input type="text" name="codePostal" required><br/>
	Ville: <input type="text" name="ville" required><br/>
	</fieldset>
	<input type="checkbox" name="validerCondGeneral" value="validerCondGeneral" required> En cochant cette case, je certifie être étudiant et j'accepte 
	<a href="condGeneralEcovoiture.php">les conditions générales d'utilisation d'Ecovoiture</a> <br/><br/>
	<input type="submit" value="Je m'inscris!"></input>
</form>
<br/>

<?php footer(); ?>

<?PHP
include("entete.php");//inclus le fichier entete
?>

<h2 style="background:blue"> Inscription </h2>

<form action="verification_creation_compte.php" method="POST">
	<fieldset>
	<legend>Informations de connexion</legend>
	Indiquez une adresse email valide: <input type="email" name="email"><br/>
	Choisissez un nom d'utilisateur: <input type="email" name="email"><br/>
	Choisissez un mot de passe: <input type="password" name="psswd"><br/>
	confirmer mot de passe: <input type="password" name="psswdBis"><br/>
	</fieldset>
	<br/>
	<fieldset>
	<legend>Informations Personnelles</legend>
	Nom: <input type="text" name="nom"> Téléphone: <input type="tel" name="telephone"> <br/>
	Prénom: <input type="text" name="prenom"> Date de naissance: <input type="date" name="date"> <br/>
	Adresse: <input type="field" name="adresse"><br/>
	Code postal: <input type="number" name="codePostal"><br/>
	Ville: <input type="text" name="ville"><br/>
	</fieldset>
	<button type="button">Je m'inscris!'</button>
</form>

<?PHP
include("entete.php?titre=Inscription");//inclus le fichier entete
?>

<h2 style="background:blue"> Inscription </h2>

<form>
<fieldset>
<legend>Personal information:</legend>
First name:<br>
<input type="text" name="firstname" value="Mickey">
<br>
Last name:<br>
<input type="text" name="lastname" value="Mouse">
<br><br>
<input type="submit" value="Submit">
</fieldset>
</form>

<form action="verification_creation_compte.php" method="POST">
	<fieldset>
	<legend>Informations de connexion</legend>
	Indiquez une adresse email valide: <input type="email" name="email"><br/>
	Choisissez un nom d'utilisateur: <input type="email" name="email"><br/>
	Choisissez un mot de passe: <input type="password" name="psswd"><br/>
	confirmer mot de passe: <input type="password" name="psswdBis"><br/>
	</fieldset>
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

<?PHP
include("entete.php?titre=Inscription");//inclus le fichier entete
?>

<h2> Inscription </h2>

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
	Indiquez une adresse email valide: <input type="email" name="email" value="">
	Choisissez un nom d'utilisateur: <input type="email" name="email" value="">
	Choisissez un mot de passe: <input type="password"
	</fieldset>
</form>

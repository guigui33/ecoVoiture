<?PHP
require_once("entete_footer.php");//inclus le fichier entete
entete('contact_admin');
?>

<h2 style="background:#46bcde"> Contacter un administrateur </h2>

<form action="contacter_admin.php" method="POST" >
	<fieldset>
	<legend align="center">Formulaire de contact</legend>
	
	<p><label for="objet">Objet :</label><input type="text" name="objet" id="login" maxlength="30" size="20" required/><br /></p>
	<p><label for="message">Message :</label> <textarea name="message" required /></textarea><br/>
	<p><label for="email">Adresse Mail :</label><input  type="email"   id="email"name="email" maxlength="320" size="50" required  /><br /></p>
	<p><label for="telephone">Téléphone :</label> <input type="text" name="telephone" id="telephone" size="10" required /><br /></p>
	</fieldset>
	
	<input class="btn btn-default" type="submit" value="Envoyer ma demande !" /></input></center>
	

</form>
<?php footer(); ?>
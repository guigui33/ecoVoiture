<?PHP
require_once("entete_footer.php");//inclus le fichier entete
entete('contact_admin');
?>

<h2 style="background:#46bcde"> Contacter un administrateur </h2>

<form action="contacter_admin.php" method="POST" >
	<fieldset>
	<legend align="center">Formulaire de contact</legend>
	<center><div>
		Avez vous pensé à consulter la FAQ avant de nous contacter ?
		<br>La réponse a votre question s'y trouve peut-être !
		<br><input type="button" name="lien1" value="Accéder à la FAQ" onclick="self.location.href='faq.php'" style="background-color:#BLUE" style="color:white; font-weight:bold"onclick>
		<br><br><br>
	</div></center>
	
	<p><label for="sujet">Sujet</label> 
	<select name="sujet" id="sujet">
		<option  value="Fonctionnement du site">J'ai une question sur le fonctionnement du site
		<option  value="Reservations de trajets">J'ai une question sur les réservations de trajet
		<option  value="Propositions de trajet">J'ai une question sur les propositions de trajet
		<option  value="Supprimer mon compte">Je veux supprimer mon compte
		<option  value="Victime de propos inapproprie">J'ai été victime de propos inapproprié (insultes, discriminations, ...) 
		<option  value="Probleme technique">J'ai un problème technique
		<option  value="Autre">Autre
	</select>
	</p>
	
	<p><label for="objet">Objet :</label><input type="text" name="objet" id="login" maxlength="30" size="20" required/><br /></p>
	<p><label for="message">Message :</label> <textarea name="message" required /></textarea><br/>
	<p><label for="email">Adresse Mail :</label><input  type="email"   id="email"name="email" maxlength="320" size="50" required  /><br /></p>
	<p><label for="telephone">Téléphone :</label> <input type="text" name="telephone" id="telephone" size="10" required /><br /></p>
	</fieldset>
	
	<center><input class="btn btn-default" type="submit" value="Envoyer ma demande !" /></input></center>

</form>
<?php footer(); ?>
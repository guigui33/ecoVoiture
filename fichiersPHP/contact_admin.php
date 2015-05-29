<!--
page pour contacter un administrateur
-->

<?PHP
require_once("entete_footer.php");//inclus le fichier entete
entete('contact_admin');
?>

<!--Fonction de vérification du champs "téléphone" soit uniquement des nombres -->
<script type="text/javascript">
function verif_formulaire()
{
 var chkZ = 1;
 for(i=0;i<document.formulaire.telephone.value.length;++i)
   if(document.formulaire.telephone.value.charAt(i) < "0"
   || document.formulaire.telephone.value.charAt(i) > "9")
     chkZ = -1;
 if(chkZ == -1) {
   alert("Le numéro de téléphone saisi n'est pas valide");
   document.formulaire.telephone.focus();
   return false;
  }
}
</script>

<!-- Alignement du titre et couleur bleu de la banière du titre -->
<h2 class="alerte alert-info"> Contacter un administrateur </h2>

<!--Formulaire avec une vérification de données -->
<form name="formulaire" action="contacter_admin.php" method="POST" onSubmit="return verif_formulaire()">
	<fieldset>
	<legend align="center">Formulaire de contact</legend>
	<center><div>
		Avez vous pensé à consulter la FAQ avant de nous contacter ?
		<br>La réponse a votre question s'y trouve peut-être !
		
		<!-- Bouton de redirection vers la page "faq.php" -->
		<br><input class="btn btn-default"  type="button" name="lien1" value="Accéder à la FAQ" onclick="self.location.href='faq.php'">
		<br><br><br>
	</div></center>
	
	<!-- Liste déroulante dont l'utilisateur doit choisir sont sujet -->
	<p><label for="sujet">Sujet de votre question : </label> 
	<select name="sujet" id="sujet">
		<option  value="Fonctionnement du site">Le fonctionnement du site
		<option  value="Reservations de trajets">Les réservations de trajets
		<option  value="Propositions de trajet">Les propositions de trajets
		<option  value="Supprimer mon compte">Supprimer mon compte
		<option  value="Signaler un abus">Signaler un abus 
		<option  value="Probleme technique">Problème technique
		<option  value="Autre probleme">Autre problème
	</select>
	</p>
	
	<!-- Différents champs à renseigner par l'utilisateur -->
	<p><label for="objet">Objet :</label><input type="text" name="objet" id="login" maxlength="30" size="20" required/><br /></p>
	<p><label for="message">Message :</label> <textarea name="message" required /></textarea><br/>
	<p><label for="email">Adresse Mail :</label><input  type="email"   id="email"name="email" maxlength="320" size="50" required  /><br /></p>
	<p><label for="telephone">Téléphone :</label> <input type="text" name="telephone" id="telephone" size="10" required /><br /></p>
	</fieldset>
	
	<!-- Bouton d'envoi du formulaire -->
	<center><input class="btn btn-default" type="submit" value="Envoyer ma demande !" /></input></center>
</form>

<!-- Inclus le fichier footer -->
<?php footer(); ?>

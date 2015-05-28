<?PHP
require_once("entete_footer.php");//inclus le fichier entete
entete('inscription');
?>
   <?php if ( (isset($_GET ['mdp']))  &&  ($_GET ['mdp']))
	{
		echo ('Mdp Erreur'); 
	}
	?>

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
  
 var chkZ = 1;
 for(i=0;i<document.formulaire.codePostal.value.length;++i)
   if(document.formulaire.codePostal.value.charAt(i) < "0"
   || document.formulaire.codePostal.value.charAt(i) > "9")
     chkZ = -1;
 if(chkZ == -1) {
   alert("Le code postal saisi n'est pas valide");
   document.formulaire.codePostal.focus();
   return false;
  }
}
</script>

<h2 class="alerte alert-info" align="center"> Inscription </h2>

<form name="formulaire" action="verification_creation_compte.php" method="POST" onSubmit="return verif_formulaire()">
	<fieldset>
	<legend align="center">Informations de connexion</legend>
	<p><label for="email">Adresse Mail :</label><input  type="email"   id="email"name="email" maxlength="320" size="50" required  /><br /></p>
	<p><label for="login">Nom d'utilisateur :</label><input type="text" name="login" id="login" maxlength="30" size="20" required/><br /></p>
	<p><label for="psswd">Mot de passe :</label> <input type="password"  id="psswd" name="psswd" required /><br/></p>
	<p><label for="psswdBis">Confirmer mot de passe :</label><input  type="password"  id="psswdBis" name="psswdBis" required /><br/></p>
	</fieldset>
	<fieldset >
	<legend align="center">Informations Personnelles</legend>
	<p><label for="nom">Nom :</label> <input type="text" name="nom" required /> 
	<p><label for="prenom">Prénom :</label> <input type="text" name="prenom" required /> 
	<p><label for="telephone">Téléphone :</label> <input type="tel" name="telephone" /> <br/>
	<p><label for="date">Date de naissance : </label><input type="date" name="date" required /> <br/>
	<!--<p><label for="sexe">Sexe :</label><input type="radio" name="sexe" id="sexe" />Homme <input type="radio" name="sexe" />Femme<br /></p>-->
	<p><label for="adresse">Adresse :</label> <textarea name="adresse" required /></textarea><br/>
	<p><label for="codePostall">Code postal :</label> <input type="text" name="codePostal" required /><br/>
	<p><label for="ville">Ville :</label><input type="text" name="ville" required /> <br/>
	</fieldset>
    <center>
	<input  type="checkbox" name="validerCondGeneral" value="validerCondGeneral"  required /> En cochant cette case, je certifie être étudiant et j'accepte 
	<a href="condGeneralEcovoiture.php">les conditions générales d'utilisation d'Ecovoiture</a> <br/><br/>
	<input class="btn btn-default" type="submit" value="Je m'inscris!"/></input></center>
</form>
<?php

footer();

 ?>

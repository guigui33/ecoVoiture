<?PHP
require_once("entete_footer.php");//inclus le fichier entete
entete('Modification du profil');
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
 for(i=0;i<document.formulaire.psswd.value.length;++i)
   if(document.formulaire.psswd.value.charAt(i) != document.formulaire.psswdBis.value.charAt(i) )
     chkZ = -1;
 if(chkZ == -1) {
   alert("Les mots de passe sont differents");
   document.formulaire.psswd.focus();
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

<h2 class="alerte alert-info" align="center"> Modification de votre profil </h2>

<body>
<ul class="menu">
    <li class="current"><a href="modification_profil.php"><b>Informations générales</b></a></li>
    <li class="current"><a href="modification_profil_voiture.php"><b>Voitures</b></a></li>
</ul>

<form name="formulaire" action="modifier_profil.php" method="POST" onSubmit="return verif_formulaire()">
<br><br>
	
	<p><label for="email">Adresse Mail :</label><input  type="email"   id="email"name="email" maxlength="320" size="50" required  /><br /></p>
	<p><label for="telephone">Téléphone :</label> <input type="tel" name="telephone" /> <br/>
	<p><label for="nom">Nom :</label> <input type="text" name="nom" required /> 
	<p><label for="prenom">Prénom :</label> <input type="text" name="prenom" required /> 
	<p><label for="adresse">Adresse :</label> <textarea name="adresse" required /></textarea><br/>	
	<p><label for="codePostall">Code postal :</label> <input type="text" name="codePostal" required /><br/>
	<p><label for="ville">Ville :</label><input type="text" name="ville" required /> <br/>

    <center>
	<input class="modif_profil_checkbox" type="checkbox" name="validerCondGeneral" value="validerCondGeneral" required /> Je souhaite modifier mon mot de passe 
	<input class="modif_profil_psswd" type="password"  id="newPsswd" name="newPsswd" required /><br/> <br/><br/><br/>
	<p>Pour plus de sécurité, merci d'indiquer votre mot de passe pour confirmer votre identité.</p>
	</center>
	
	<p><label for="psswdBis">Mot de passe actuel :</label><input  type="password"  id="psswd" name="psswd" required /><br/></p>
	<center>
	<input class="btn btn-default" type="submit" value="Valider mes modifications"/></input>
	</center>
	
	
</form>
</body>

<?php footer(); ?>
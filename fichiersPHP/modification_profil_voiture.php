<?PHP
require_once("entete_footer.php");//inclus le fichier entete
entete('Modification du profil (voiture)');
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


<div class="legend">Voitures enregistrées</div>
	<fieldset class="fieldset1"><br>
	
		<p>Voiture peugot</p>
		
	</fieldset>

<br>
	<div class="legend">Ajouter une voiture</div>
		<fieldset class="fieldset1"><br>
		
			<p><label for="marque">Marque :</label> <input type="text" name="marque" /> </p>
			<p><label for="modele">Modèle :</label> <input type="text" name="modele" required /> </p> 
			<p><label for="couleur">Couleur :</label> <input type="text" name="couleur" required /> </p>
			
			<p><label for="confort">Confort : </label> 
			<select name="confort" id="confort">
				<option  value="basique">Basique
				<option  value="normal">Normal
				<option  value="confort">Confort
				<option  value="luxe">Luxe
			</select>
			</p>
			
			<label for="fumeur">Fumeurs autorisés :</label><input class="modif_profil_checkbox" type="checkbox" name="cocherFumeurs" value="cocherFumeurs" required /></p>
			<label for="animal">Animaux autorisés :</label><input class="modif_profil_checkbox" type="checkbox" name="cocherAnimaux" value="cocherAnimaux" required /></p>
			<label for="musique">Musique pendant le trajet :</label><input class="modif_profil_checkbox" type="checkbox" name="cocherMusiques" value="cocherMusiques" required /></p>
			
			<br><br><br><center>
			<p>Pour plus de sécurité, merci d'indiquer votre mot de passe pour confirmer votre identité.</p>
			</center>
			
			<p><label for="psswdBis">Mot de passe actuel :</label><input  type="password"  id="psswd" name="psswd" required /><br/></p>
			<center>
			<input class="btn btn-default" type="submit" value="Valider mes modifications"/></input>
			</center><br>
			
		</fieldset>

	
</form>
</body>

<?php footer(); ?>
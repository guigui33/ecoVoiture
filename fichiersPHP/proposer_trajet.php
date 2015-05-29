<?php
include('entete_footer.php'); 
entete('home');
$depart=$_POST['depart'] ;
$destination=$_POST['destination'];
$date = isset($_POST['date'])?$_POST['date']:'';
?>

<script type="text/javascript">
function verif_formulaire()
{
 if(document.formulaire.heure.value.indexOf(':') == -1) {
   alert("Ce n'est pas une heure valide. Format = HH:mm");
   document.formulaire.heure.focus();
   return false;
  }
}
</script>

<h2 style="background:#46bcde" align="center"> Proposer un trajet </h2>

<form name="formulaire" action="ajout_trajet.php" method="POST" onSubmit="return verif_formulaire()">
	<fieldset>
	<legend align="center">Itinéraire</legend>
	<p><label for="depart">Ville de départ:</label><input  type="text"   id="depart" name="depart"  value="<?php echo $depart?>" required  /><br /></p>
	<p><label for="destination">Ville d'arrivée :</label><input type="text" name="destination" id="destination"  value="<?php echo $destination?>"required /><br /></p>
	</fieldset>
	<fieldset >
	<legend align="center">Horaires et Disponibilités</legend>
	<p><label for="date">Date: </label><input type="date" name="date" required  value="<?php echo $date;?>"/> <br/>
	<p><label for="heure">Heure de départ:</label> <input type="text" name="heure" required /> 
	<p><label for="place">Nombre de places:</label> <input type="text" name="place" /> <br/>
	<!--<p><label for="voiture">Voiture utilisée: </label><select name="voiture" size="1">
<option>Pas de bagage
<option>Petit
<option>Moyen
<option>Grand
</select>
<br/>--> <br/>
	<p><label for="bagages">Taille des Bagages</label> 
	<select name="bagage" id="bagage">
		<option  value="aucun">Pas de bagages
		<option  value="petit">Petit
		<option  value="moyen">Moyen
		<option  value="grand">Grand
	</select>
<br/>
	<p><label for="information">Autres informations</label> <textarea name="information" required /></textarea><br/>
	</fieldset>
    <center>
	<input  type="checkbox" name="validerCondGeneral" value="validerCondGeneral"  required /> En cochant cette case, je certifie être étudiant et j'accepte 
	<a href="condGeneralEcovoiture.php">les conditions générales d'utilisation d'Ecovoiture</a> <br/><br/>
	<input class="btn btn-default" type="submit" value="Valider Trajet" /></input></center>
</form>

<?php 
footer();
?> 	
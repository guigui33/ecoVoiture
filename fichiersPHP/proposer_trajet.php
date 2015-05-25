<?php
include('entete_footer.php'); 
entete('home');

?>
<h2 class="alerte alert-info" align="center"> Proposer un trajet </h2>

<form action="ajout_trajet.php" method="POST" >
	<fieldset>
	<legend align="center">Itinéraire</legend>
	<p><label for="depart">Ville de depart:</label><input  type="text"   id="depart"name="depart"  required  /><br /></p>
	<p><label for="destination">Ville d'arrivée :</label><input type="text" name="destination" id="destination" required/><br /></p>
	<label for="detour">Detour:</label><input type="radio" name="detour" id="detour" />Oui <input type="radio" name="detour" />Non<br /></p>
	</fieldset>
	<fieldset >
	<legend align="center">Informations Supplementaire</legend>
	<p><label for="date">Date: </label><input type="date" name="date" required  value="<?php echo date('Y-m-d', strtotime(date('Y-m-d')));?>"/> <br/>
	<p><label for="heure">Heure de depart:</label> <input type="text" name="heure" required /> 
	<p><label for="place">Nombre de place:</label> <input type="text" name="place" /> <br/>
	<!--<p><label for="voiture">Voiture utilisée: </label><select name="voiture" size="1">
<option>Pas de bagage
<option>Petit
<option>Moyen
<option>Grand
</select>
<br/>--> <br/>
	<p><label for="bagages">Taille des bagages:</label> 
	<select name="bagages" id="bagages">
		<option  value="aucun">Pas de bagage
		<option  value="petit">Petit
		<option  value="moyen">Moyen
		<option  value="grand">Grand
	</select>
<br/>
	<p><label for="information">Autre information:</label> <textarea name="information" required /></textarea><br/>
	</fieldset>
    <center>
	<input  type="checkbox" name="validerCondGeneral" value="validerCondGeneral"  required /> En cochant cette case, je certifie être étudiant et j'accepte 
	<a href="condGeneralEcovoiture.php">les conditions générales d'utilisation d'Ecovoiture</a> <br/><br/>
	<input class="btn btn-default" type="submit" value="Valider Trajet" /></input></center>
</form>

<?php 
footer();
?> 	
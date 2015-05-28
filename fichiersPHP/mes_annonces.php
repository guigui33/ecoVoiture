<?php
include('entete_footer.php'); 
entete('Mes Annonces');
require('connexion.php');
session_start();
if(isset)
$queryIdTrajetProposer=pg_query($connexion,"SELECT * FROM proposer WHERE idchauffeur='$_SESSION['iduser']'");
if(pg_num_rows ($queryIdTrajetProposer) === 0 ) {
	//afficher Erreur
}

?>

<h2 class="alerte alert-info" align="center"> Mes annonces </h2>
<fieldset>
 <h4> Voici les annonces que vous avez déposées sur Ecovoiture </h4>
	<fielset>
		<legend> En cours</legend>
		
	</fielset>
	<fielset>
		<legend> Passées</legend>
	
	</fielset>
</fieldset>
<?php
footer();
?>


<?php		
				
				while ($row = pg_fetch_assoc($queryidvilledepart)) {
							$IdDepart=$row['idlieu'];
							}
				while ($row = pg_fetch_assoc($queryidvilledest)) {
							$IdDest=$row['idlieu'];
							}	
						
					$query = "SELECT datedepart, heuredepart, iddepart, idarrivee, placesdispo, infostrajet FROM Trajets WHERE idarrivee=$IdDepart AND iddepart=$IdDest";
					$result = pg_query($connexion,$query) or die("Query failed : ".pg_error($connexion));
					
					while ($donnees = pg_fetch_array($result)) 
					{
?>
<div class="col-lg-6">
			
				<h4><?php echo $depart; ?> - <?php echo $destination; ?></h4>
					<ul >
						<li class="list-unstyled">Conducteur : Pierre</li>
						<li class="list-unstyled">Ville de Départ : <?php echo $donnees['iddepart']; ?></li>
						<li class="list-unstyled">Ville d'Arrivée : <?php echo $donnees['idarrivee']; ?></li>
						<li class="list-unstyled">Date : <?php echo $donnees['datedepart']; ?></li>
						<li class="list-unstyled">Heure de Départ : <?php echo $donnees['heuredepart']; ?> &nbsp; Nombres de places disponibles : <?php echo $donnees['placesdispo']; ?></li>
						<li class="list-unstyled">Informations : <?php echo $donnees['infostrajet']; ?>  </br><a class="btn btn-lg btn-success bouton" href="fiche_annonce.php" role="button">Details Trajet</a></li>
					</ul>
			
</div>
<?php 
}
?>

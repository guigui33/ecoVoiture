
<?php include('entete_footer.php'); 
entete('Trajet Disponible');
?>

<?php
				require('connexion.php');
					$destination=$_POST['destination'];
					$destination=strtok($destination , ',');
					$depart=$_POST['depart'];
					$depart=strtok($depart, ',');
					$cbn=0;			

				$queryidvilledest=pg_query($connexion,"SELECT idlieu FROM lieux WHERE LOWER (ville) LIKE LOWER('$destination') ");
				$queryidvilledepart=pg_query($connexion,"SELECT idlieu FROM lieux WHERE LOWER (ville) LIKE LOWER('$depart') ");
				
				
				if(pg_num_rows ($queryidvilledepart) === 0 ) {
				?><script> alert("La ville de depart est inconnue. (Il ce peut qu'elle ne soit pas dans la BDD si c'est le cas faire une requete a l'administrateur)");
				document.location.href = 'http://ecovoiture.alwaysdata.net/fichiersPHP/home.php';
				</script>
				<?php
				}				
				else {
					if(pg_num_rows($queryidvilledest) === 0) {
						?>
						<script> alert("La ville de destination est inconnue. (Il ce peut qu'elle ne soit pas dans la BDD si c'est le cas faire une requete a l'administrateur)");
					 	document.location.href = 'http://ecovoiture.alwaysdata.net/fichiersPHP/home.php';
					 	</script>
						<?php
						exit;
					}
				}
				while ($row = pg_fetch_assoc($queryidvilledepart)) {
							$IdDepart=$row['idlieu'];
							}
				while ($row = pg_fetch_assoc($queryidvilledest)) {
							$IdDest=$row['idlieu'];
							}	
					$trajet = pg_query($connexion,"SELECT idtrajet FROM trajets WHERE iddepart=$IdDepart AND idarrivee=$IdDest ");
					while($row=pg_fetch_array($trajet) ){
						$idtrajet=$row['idtrajet'];
					}
					
					$query = "SELECT * FROM trajets , utilisateurs u  WHERE iddepart=$IdDepart AND idarrivee=$IdDest AND u.iduser=(SELECT idchauffeur FROM proposer WHERE idroute=$idtrajet) ";
					$result = pg_query($connexion,$query);
					
					$query=pg_query($connexion,"SELECT ville FROM lieux WHERE idlieu=$IdDepart ");
						while($row=pg_fetch_assoc($query)){
							$nomdepart=$row['ville'];
						}
						
						$query=pg_query($connexion,"SELECT ville FROM lieux WHERE idlieu=$IdDest ");
						while($row=pg_fetch_assoc($query)){
							$nomdest=$row['ville'];
						}
					
					while ($donnees = pg_fetch_array($result)) 
					{			
?>
<div class="col-lg-6">
			
				<h4><?php echo $depart; ?> - <?php echo $destination; ?></h4>
					<ul >
						<li class="list-unstyled">Conducteur :<?php echo $donnees['login']; ?></li>
						<li class="list-unstyled">Ville de Départ : <?php echo $depart; ?></li>
						<li class="list-unstyled">Ville d'Arrivée : <?php echo $destination ?></li>
						<li class="list-unstyled">Date : <?php echo $donnees['datedepart']; ?></li>
						<li class="list-unstyled">Heure de Départ : <?php echo $donnees['heuredepart']; ?> &nbsp; Nombres de places disponibles : <?php echo $donnees['placesdispo']; ?></li>
						<li class="list-unstyled">Informations : <?php echo $donnees['infostrajet']; ?>  </br><a class="btn btn-lg btn-success bouton" href="fiche_annonce.php?idtrajet=<?=$donnees['idtrajet']?>" role="button" >Details Trajet</a></li>
					</ul>
			
</div>
<?php 
}
?>

<?php 
footer(); 
?>

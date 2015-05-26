
<?php include('entete_footer.php'); 
entete('Trajet Disponible');
?>

<?php

				require('connexion.php');


					$destination=$_POST['destination'];
					$depart=$_POST['depart'];
					$cbn=0;			

				$queryidvilledest=pg_query($connexion,"SELECT idlieu FROM lieux WHERE LOWER (ville) LIKE LOWER('$destination') ");
				$queryidvilledepart=pg_query($connexion,"SELECT idlieu FROM lieux WHERE LOWER (ville) LIKE LOWER('$depart') ");
				
				
				if(pg_num_rows ($queryidvilledepart) === 0 ) {
				?><script> alert("La ville de depart est inconnue. (Il ce peut qu'elle ne soit pas dans la BDD si c'est le cas faire une requete a l'administrateur)");
				document.location.href = 'http://localhost/ecoVoiture/fichiersPHP/home.php';
				<?php
				}				
				
				if(pg_num_rows($queryidvilledest) === 0) {
					?>
					<script> alert("La ville de destination est inconnue. (Il ce peut qu'elle ne soit pas dans la BDD si c'est le cas faire une requete a l'administrateur)");
					 document.location.href = 'http://localhost/ecoVoiture/fichiersPHP/home.php';
					 </script>
					<?php
					exit;
				}
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
						<li class="list-unstyled">Heure de Départ : <?php echo $donnees['heuredepart']; ?> &nbsp; Nombres de place disponible : <?php echo $donnees['placesdispo']; ?></li>
						<li class="list-unstyled">Information : <?php echo $donnees['infostrajet']; ?>  </br><a class="btn btn-lg btn-success bouton" href="fiche_annonce.php" role="button">Details Trajet</a></li>
					</ul>
			
</div>
<?php 
}
?>
</tbody>
	</table>
</form> 

<?php 
footer(); 
?>

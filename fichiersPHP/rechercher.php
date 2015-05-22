
<?php include('entete_footer.php'); 
entete('Trajet Disponible');
?>

<?php
<<<<<<< HEAD
				$mydb = mysqli_connect('localhost','root','','ecoVoiture2');
=======
				require('connexion.php');
>>>>>>> f4c23c56294673db92363ed64e1364d7f67ff4df

					$destination=$_POST['destination'];
					$depart=$_POST['depart'];
					$cbn=0;
										
					$query = "SELECT DateDepart, HeureDepart, IdDepart, IdArrivee, PlacesDispo, InfosTrajet FROM Trajets WHERE IdArrivee='$destination' AND IdDepart='$depart' ";
					$result = pg_query($connexion,$query) or die("Query failed : ".pg_error($connexion));
					
					while ($donnees = pg_fetch_array($result)) 
					{
?>
<div class="col-lg-4">
			
				<h4><?php echo $donnees['IdDepart']; ?> - <?php echo $donnees['IdArrivee']; ?></h4>
					<ul >
						<li class="list-unstyled">Conducteur : Pierre</li>
						<li class="list-unstyled">Ville de Départ : <?php echo $donnees['IdDepart']; ?></li>
						<li class="list-unstyled">Ville d'Arrivée : <?php echo $donnees['IdArrivee']; ?></li>
						<li class="list-unstyled">Date : <?php echo $donnees['DateDepart']; ?></li>
						<li class="list-unstyled">Heure de Départ : <?php echo $donnees['HeureDepart']; ?> &nbsp; Nombres de place disponible : <?php echo $donnees['PlacesDispo']; ?></li>
						<li class="list-unstyled">Information : <?php echo $donnees['InfosTrajet']; ?>  </br><a class="btn btn-lg btn-success bouton" href="detail.html" role="button">Details Trajet</a></li>
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

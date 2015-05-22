
<?php include('entete_footer.php'); 
entete('Trajet Disponible');
?>

<?php
				$mydb = mysqli_connect('localhost','root','','ecoVoiture2');

					$destination=$_POST['destination'];
					$depart=$_POST['depart'];
					$cbn=0;
										
					$query = "SELECT DateDepart, HeureDepart, IdDepart, IdArrivee, PlacesDispo, InfosTrajet FROM Trajets WHERE IdArrivee='$destination' AND IdDepart='$depart' ";
					$result = mysqli_query($mydb,$query) or die("Query failed : ".mysqli_error($mydb));
					
					while ($donnees = mysqli_fetch_array($result)) 
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

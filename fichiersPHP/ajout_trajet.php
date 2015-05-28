

<?php
require('connexion.php');

//verification des informations données par le client avant de les inclurent dans la BD


$depart=isset($_POST['depart'])?$_POST['depart']:'';
$destination=isset($_POST['destination'])?$_POST['destination']:'';
$date = isset($_POST['date'])?$_POST['date']:'';
$heure=isset($_POST['heure'])?$_POST['heure']:'';
$place=isset($_POST['place'])?$_POST['place']:'';
$bagage=isset($_POST['bagage'])?$_POST['bagage']:'';
$information=isset($_POST['information'])?$_POST['information']:'';

echo ("Taille bagages : $bagage");
echo $date;

if($depart=='' && $destination=='' && $date=='' && $heure=='' && $place=='' && $bagage='' && $information=''){

		header('location:proposer_trajet.php?error=1');//si erreur on retourne error=1
		exit;
	}
$queryidvilledest=pg_query($connexion,"SELECT idlieu FROM lieux WHERE LOWER (ville) LIKE LOWER('$destination') ");
$queryidvilledepart=pg_query($connexion,"SELECT idlieu FROM lieux WHERE LOWER (ville) LIKE LOWER('$depart') ");
				
				if(pg_num_rows($queryidvilledest) === 0) {
?>
<script>
    alert("La ville de destination est incorrecte, il se peut qu'elle ne soit pas en France"); 
    document.location.href = 'http://ecovoiture.alwaysdata.net/fichiersPHP/ajout_trajet.php';
</script>
<?php
                header('location:ajout_trajet.php?error=ville');
					exit;
				}
				echo $queryidvilledest;
				while ($row = pg_fetch_assoc($queryidvilledepart)) {
							$IdDepart=$row['idlieu'];
							}
				while ($row = pg_fetch_assoc($queryidvilledest)) {
							$IdDest=$row['idlieu'];
							}	
				
				$requete=pg_query($connexion,"INSERT INTO trajets (datedepart, heuredepart, placesdispo, taillebagages, infostrajet, idVoitureutilisee,iddepart, idarrivee) VALUES ('$date','$heure','$place','$bagage','$information',1,'$IdDepart','$IdDest');");//insert value dans table login
				//echo $requete;
				pg_close($connexion);
				header('location:home.php');
			
?>
<?php
require('connexion.php');

//verification des informations donnés par le client avant de les inclurent dans la BD


$depart=isset($_POST['depart'])?$_POST['depart']:'';
$destination=isset($_POST['destination'])?$_POST['destination']:'';
$date = isset($_POST['date'])?$_POST['date']:'';
$heure=isset($_POST['heure'])?$_POST['heure']:'';
$place=isset($_POST['place'])?$_POST['place']:'';
$bagages=isset($_POST['bagages'])?$_POST['bagages']:'';
$information=isset($_POST['information'])?$_POST['information']:'';

echo $destination;
echo $date;

if($depart=='' && $destination=='' && $date=='' && $heure=='' && $place=='' && $bagages='' && $information=''){

		header('location:proposer_trajet.php?error=1');//si erreur on retourne error=1
		exit;
	}
$queryidvilledest=pg_query($connexion,"SELECT idlieu FROM lieux WHERE LOWER (ville) LIKE LOWER('$destination') ");
$queryidvilledepart=pg_query($connexion,"SELECT idlieu FROM lieux WHERE LOWER (ville) LIKE LOWER('$depart') ");
				
				if(pg_num_rows($queryidvilledest) === 0) {
					echo("La ville de destination. (Il ce peut qu'elle ne soit pas dans la BDD si c'est le cas faire une requete a l'administrateur)");
					header('location:inscription.php?error=ville');
					exit;
				}
				echo $queryidvilledest;
				while ($row = pg_fetch_assoc($queryidvilledepart)) {
							$IdDepart=$row['idlieu'];
							}
				while ($row = pg_fetch_assoc($queryidvilledest)) {
							$IdDest=$row['idlieu'];
							}	
				pg_query($connexion,"INSERT INTO trajets (datedepart, heuredepart, placesdispo, taillebagages, infostrajet, idVoitureutilisee,iddepart, idarrivee) VALUES ('$date','$heure','$place','$bagages','$information',1,'$IdDepart','$IdDest');");//insert value dans table login
				pg_close($connexion);
				header('location:home.php');
			
?>
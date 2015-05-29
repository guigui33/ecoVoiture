

<?php
require('connexion.php');
session_start();
//verification des informations données par le client avant de les inclurent dans la BD

$residutilisateur=pg_query($connexion, "SELECT iduser FROM utilisateurs WHERE login ='".$_SESSION['login']."' ");
while ($row = pg_fetch_assoc($residutilisateur)) {
							$idutilisateur=$row['iduser'];
							}

echo " Id est : $idutilisateur";
$depart=isset($_POST['depart'])?$_POST['depart']:'';
$destination=isset($_POST['destination'])?$_POST['destination']:'';
$date = isset($_POST['date'])?$_POST['date']:'';
$heure=isset($_POST['heure'])?$_POST['heure']:'';
$place=isset($_POST['place'])?$_POST['place']:'';
$bagage=isset($_POST['bagage'])?$_POST['bagage']:'';
$information=isset($_POST['information'])?$_POST['information']:'';

if($depart=='' && $destination=='' && $date=='' && $heure=='' && $place=='' && $bagage='' && $information=''){
		exit;
	}
$queryidvilledest=pg_query($connexion,"SELECT idlieu FROM lieux WHERE LOWER (ville) LIKE LOWER('$destination') ");
$queryidvilledepart=pg_query($connexion,"SELECT idlieu FROM lieux WHERE LOWER (ville) LIKE LOWER('$depart') ");
				
				if(pg_num_rows($queryidvilledest) === 0) {
                   header('location:ajout_trajet.php?dest=ville');
					exit;
				}
				while ($row = pg_fetch_assoc($queryidvilledepart)) {
							$IdDepart=$row['idlieu'];
							}
				while ($row = pg_fetch_assoc($queryidvilledest)) {
							$IdDest=$row['idlieu'];
							}	
				
				$requete=pg_query($connexion,"INSERT INTO trajets (datedepart, heuredepart, placesdispo, taillebagages, infostrajet, idVoitureutilisee,iddepart, idarrivee) VALUES ('$date','$heure','$place','$bagage','$information',1,'$IdDepart','$IdDest');");
				$residtrajet=pg_query($connexion,"SELECT MAX (idtrajet) AS id FROM trajets");
				while ($row = pg_fetch_assoc($residtrajet)) {
							$idtrajet=$row['id'];
				}
				$proposer=pg_query($connexion,"INSERT INTO proposer(idchauffeur, idroute)  VALUES ($idutilisateur,$idtrajet)");
				pg_close($connexion);
				header('location:home.php');
			
?>
<!--
fonction pour ajouter un trajet proposé par un utilisateur
usage de la fonction connexion à la base de donnée
-->

<?php
require('connexion.php'); //connexion à la base de donnée

// continuité de la session
session_start();

//verification des informations données par le client avant de les inclurent dans la BD
$residutilisateur=pg_query($connexion, "SELECT iduser FROM utilisateurs WHERE login ='".$_SESSION['login']."' ");
	while ($row = pg_fetch_assoc($residutilisateur)) {
			$idutilisateur=$row['iduser'];
			}
//Récupérations des différentes informations entrées par l'utilisateur
$depart=isset($_POST['depart'])?$_POST['depart']:'';
$depart=strtok($depart, ',');
$destination=isset($_POST['destination'])?$_POST['destination']:'';
$destination=strtok($destination, ',');
$date = isset($_POST['date'])?$_POST['date']:'';
$heure=isset($_POST['heure'])?$_POST['heure']:'';
$place=isset($_POST['place'])?$_POST['place']:'';
$bagage=isset($_POST['bagage'])?$_POST['bagage']:'';
$information=isset($_POST['information'])?$_POST['information']:'';

//Test pour vérifier que chaque champs ne soit pas vide
if($depart=='' && $destination=='' && $date=='' && $heure=='' && $place=='' && $bagage='' && $information=''){
		exit;
	}
	//Requete Pour recuperer l'id de la ville destination
$queryidvilledest=pg_query($connexion,"SELECT idlieu FROM lieux WHERE LOWER (ville) LIKE LOWER('$destination') ");
	//Requete pour recuperer l'id de la ville de depart
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
				
				//Insertion du trajet avec auto implementation de L'id
				$requete=pg_query($connexion,"INSERT INTO trajets (datedepart, heuredepart, placesdispo, taillebagages, infostrajet, idVoitureutilisee,iddepart, idarrivee) VALUES ('$date','$heure','$place','$bagage','$information',1,$IdDepart,$IdDests);");
				$residtrajet=pg_query($connexion,"SELECT MAX (idtrajet) AS id FROM trajets");
				while ($row = pg_fetch_assoc($residtrajet)) {
							$idtrajet=$row['id'];
				}
				
				//Insertion de l'id utilisateur et de l'id du trajet récuperé
				$proposer=pg_query($connexion,"INSERT INTO proposer(idchauffeur, idroute)  VALUES ($idutilisateur,$idtrajet)");
				pg_close($connexion);
				if ($proposer)
					?>					
					<!-- Affichage d'un message de confirmation de création de trajet dans une pop-up -->
					<script>
						alert("Votre trajet a bien été créé");
						document.location.href = 'http://ecovoiture.alwaysdata.net/fichiersPHP/home.php';
					</script>
					<?
					echo "";
				?>

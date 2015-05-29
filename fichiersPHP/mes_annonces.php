<!-- 
Fichier Appelant : entete_footer.php

Fichier Appelé : entete_footer.php, connexion.php, 

Role : Permet de visualiser les annonces de la session active.


-->

<?php
include('entete_footer.php'); //inclus le fichier entete
entete('Mes Annonces');
require('connexion.php');

//Fonction permettant d'afficher les annonces proposées par l'utilisateur
function afficherTrajet($tabTrajet)
{	
	$idlieux=$tabTrajet['iddepart'];
	$depart=pg_query($GLOBALS['connexion'],"SELECT ville FROM lieux WHERE idlieu =$idlieux") ;
	$depart=pg_fetch_assoc($depart);
	$idlieux=$tabTrajet['idarrivee'];
	$arrivee=pg_query($GLOBALS['connexion'],"SELECT ville FROM lieux WHERE idlieu=$idlieux") ;
	$arrivee=pg_fetch_assoc($arrivee);
	$model=pg_query($GLOBALS['connexion'],'SELECT modele from voitures where idvoiture='.$tabTrajet['idvoitureutilisee'].'') ;
	$model=pg_fetch_assoc($model);
	echo $depart['ville'].' >> '.$arrivee['ville'].' - '. $tabTrajet['datedepart'].' à '.$tabTrajet['heuredepart'].'</br>';
	echo 'Vehicule: '.$model['modele'].'      places disponibles: '. $tabTrajet['placesdispo']."\t";
	echo '<a href="fiche_annonce.php">Accèder aux details</a></br>';
	} //fin fonction afficherTrajet
	
//Test du champ date
function testDateHeure($date){
	$now = new DateTime("now");
	$date = new DateTime("$date");
	return $now<$date;		
	}	
	
$iduser=$_SESSION['iduser']; //recupere l'identifiant de l'utilisateur, session demarrer dans la fonction entete()
$queryIdTrajetProposer=pg_query($connexion,"SELECT * FROM proposer WHERE idchauffeur='$iduser'"); //recupere les trajets où l'utilisateur est chauffeur
	
?>

<!-- Alignement du titre et couleur bleu de la banière du titre -->
<h2 class="alerte alert-info"> Mes annonces </h2>
 <h4> Voici les annonces que vous avez déposées sur Ecovoiture </h4>
		<div class="legend"> En cours </div>
		<fieldset class="fieldset1">
		<?php 
		$i=0;//utilisée si l'utilisateur n'a pas de trajet en cours		
		//On parcours le tableau afin d'afficher les annonces proposées en cours
		while(($tabIdTrajets=pg_fetch_assoc($queryIdTrajetProposer))){
			$i++;
			$idTrajet=$tabIdTrajets['idroute'];
			$queryTrajetInfo=pg_query($connexion,"SELECT * FROM trajets WHERE idtrajet='$idTrajet'");
			$tabTrajet=pg_fetch_assoc($queryTrajetInfo);
			/*si le trajet à une date anterieure on ne l'affiche pas*/
			if(testDateHeure($tabTrajet['datedepart'].' '.$tabTrajet['heuredepart'])){
				afficherTrajet($tabTrajet);	
				echo '<hr>';
			}
		}		
		if($i==0){
			echo "<center> Aucune annonce passée </center>";
		}
		?>
		</fieldset>
		<div class="legend"> Passées </div>
		<fieldset class="fieldset1">
		<?php 
		$queryIdTrajetProposer=pg_query($connexion,"SELECT * FROM proposer WHERE idchauffeur='$iduser'");
		$i=0;		
		//On parcours le tableau afin d'afficher les annonces terminées où l'utilisateur a été chauffeur
		while(($tabIdTrajets=pg_fetch_assoc($queryIdTrajetProposer))){
			$i++;
			$idTrajet=$tabIdTrajets['idroute'];
			$queryTrajetInfo=pg_query($connexion,"SELECT * FROM trajets WHERE idtrajet='$idTrajet'");
			$tabTrajet=pg_fetch_assoc($queryTrajetInfo);
			/*même fonctionnement mais affiche les parcours anterieurs*/
			if(!testDateHeure($tabTrajet['datedepart'].' '.$tabTrajet['heuredepart'])){
				afficherTrajet($tabTrajet);	
				echo '<hr>';
			}
		}
		if($i==0){
			echo "<center> Aucune annonce passée </center>";
		}
		?>
	</fieldset>

<?php
footer();//inclus le fichier footer
?>

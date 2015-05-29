<?php
include('entete_footer.php'); 
entete('Mes Annonces');
require('connexion.php');

function afficherTrajet($tabTrajet){	
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
	
function testDateHeure($date){
	$now   = time();
	$date = strtotime($date);
	$diff  = abs($date1 - $date2);
		
	}
//$iduser=$_SESSION['iduser'];
$iduser=1;
$queryIdTrajetProposer=pg_query($connexion,"SELECT * FROM proposer WHERE idchauffeur='$iduser'");
if(pg_num_rows ($queryIdTrajetProposer) === 0 ) {
	//afficher Erreur
	;
}
	
?>



<h2 class="alerte alert-info" align="center"> Mes annonces </h2>
<fieldset>
 <h4> Voici les annonces que vous avez déposées sur Ecovoiture </h4>
	<fieldset>
		<div class="legend">En cours</div>
			<fieldset class="fieldset1">
			
			
			<?php while(($tabIdTrajets=pg_fetch_assoc($queryIdTrajetProposer))){
				$idTrajet=$tabIdTrajets['idroute'];
				$queryTrajetInfo=pg_query($connexion,"SELECT * FROM trajets WHERE idtrajet='$idTrajet'");
				$tabTrajet=pg_fetch_assoc($queryTrajetInfo);
				//testDateHeure()
				afficherTrajet($tabTrajet);	
				echo '<hr>';
			}
			?>
	</fieldset>
	
	<fieldset>
		<legend> Passées</legend>
	
	</fieldset>
</fieldset>

<?php
footer();
?>

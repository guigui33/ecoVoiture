<?php
include('entete_footer.php'); 
entete('Mes Annonces');
require('connexion.php');

function afficherTrajet($tabTrajet){	
	$idlieux=$tabTrajet['iddepart'];
	//$voiture=pg_query($connexion,"SELECT modele FROM voitures v WHERE modele=(SELECT modele from trajet t where v.idvoiture=t.idvoitureutilisee)");
	$depart=pg_query($GLOBALS['connexion'],"SELECT ville FROM lieux WHERE idlieu =$idlieux") ;
	$depart=pg_fetch_assoc($depart);
	$idlieux=$tabTrajet['idarrivee'];
	$arrivee=pg_query($GLOBALS['connexion'],"SELECT ville FROM lieux WHERE idlieu=$idlieux") ;
	$arrivee=pg_fetch_assoc($arrivee);
	echo $depart['ville']." >> ".$arrivee['ville']." - ". $tabTrajet['datedepart'].' à '.$tabTrajet['heuredepart'].'</br>';
	echo "Vehicule: "."clio2"."</br>";
	} //fin fonction afficherTrajet
	
function testDateHeure(){
	;
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
	<fielset>
		<legend> En cours</legend>
		<?php while(($tabIdTrajets=pg_fetch_assoc($queryIdTrajetProposer))){
			$idTrajet=$tabIdTrajets['idroute'];
			$queryTrajetInfo=pg_query($connexion,"SELECT * FROM trajets WHERE idtrajet='$idTrajet'");
			$tabTrajet=pg_fetch_assoc($queryTrajetInfo);
			afficherTrajet($tabTrajet);	
		}
		?>
	</fielset>
	<fielset>
		<legend> Passées</legend>
	
	</fielset>
</fieldset>

<?php
footer();
?>

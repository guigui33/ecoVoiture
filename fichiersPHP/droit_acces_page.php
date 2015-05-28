<?php 
/*fonction qui teste dans une liste si l'utilisateur non connecté a le droit d'acceder à un page ou non
 * retourne true si oui, false sinon * 
 * */
function isDroitAccesPage($titreFichier){ 
	$listeFichiersInterdits=array(
	"profil_utilisateur.php",
	"fiche_annonce.php",
	"proposer_trajet.php",
	/*"mes_annonces.php"*/
	);
	$i=0;
	while($i<count($listeFichiersInterdits)){ 
		if(!strcmp($listeFichiersInterdits[$i],$titreFichier)) { 
			 return false;//si fichier trouve, on retourne true 
			} 
		$i++; 
		} //fin while
	return true;
	}//fin fonction 
?>

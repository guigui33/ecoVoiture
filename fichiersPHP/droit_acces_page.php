<?php 
/*fonction qui teste dans une liste si l'utilisateur non connecté a le droit d'acceder à un page ou non
 * retourne true si le fichier est dans la liste des non accessibles, false sinon.
 * Permet de rendre des pages inaccessibles aux utilisateurs non connectés
 * */
function isDroitAccesPage($titreFichier){ 
	/* Liste des pages qui ne peuvent pas être visualisées par un utilisateur non authentifié */
	$listeFichiersInterdits=array(
	"profil_utilisateur.php",
	"fiche_annonce.php",
	"proposer_trajet.php",
	"modification_profil.php",
	"mes_annonces.php",
	"modification_profil_voiture.php"
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

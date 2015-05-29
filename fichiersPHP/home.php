<!-- 
Fichier Appelant : Cette page est appelé lors de redirection vers l'acceuil.

Fichier Appelé : proposer_trajet.php, rechercher_annonce.php

Role :Joue le role de page d'accueil.

-->

<?php include('entete_footer.php'); //inclus le fichier entete
entete('home'); //appel de la fonction qui genere l'entete de la page home
require('connexion.php'); //fichier connexion BDD 

// Affichage des informations des 6 derniers trajets -->
function afficherTrajet($tabTrajet){	
	$idlieux=$tabTrajet['iddepart'];
	$depart=pg_query($GLOBALS['connexion'],"SELECT ville FROM lieux WHERE idlieu=$idlieux") ;
	$depart=pg_fetch_assoc($depart);
	$idlieux=$tabTrajet['idarrivee'];
	$arrivee=pg_query($GLOBALS['connexion'],"SELECT ville FROM lieux WHERE idlieu=$idlieux") ;
	$arrivee=pg_fetch_assoc($arrivee);
	$idtrajet=$tabTrajet['idtrajet'];
	$nomCond=pg_query($GLOBALS['connexion'],"SELECT prenom FROM utilisateurs u, proposer p, trajets t WHERE u.iduser=p.idchauffeur AND p.idroute=$idtrajet") ;
	$nomCond=pg_fetch_assoc($nomCond);
?>				
		<!-- Affichage des informations des trajets -->
		<div class="col-lg-3  information">	
				<h4><?php echo $depart['ville'] ?> - <?php echo $arrivee['ville'] ?></h4>
					<ul >
						<li class="list-unstyled">Conducteur : <?php echo $nomCond['prenom'] ?></li>
						<li class="list-unstyled">Départ : <?php echo $depart['ville'] ?></li>
						<li class="list-unstyled">Arrivée : <?php echo $arrivee['ville']?></li>
						<li class="list-unstyled">Date : <?php echo $tabTrajet['datedepart'] ?></li>
						<li class="list-unstyled">Heure de Départ : <?php echo $tabTrajet['heuredepart']?></li>
						<!-- Bouton Ayant en redirection la page fiche_annonce et prenant en parametre GET l'id du trajet afin de recuperer les valeurs dans la page fiche_annonce. --> 
						<li class="list-unstyled">Informations : <?php echo $tabTrajet['infostrajet']; ?>  </br><a class="btn btn-lg btn-success bouton" href="fiche_annonce.php?idtrajet=<?=$tabTrajet['idtrajet']?>" role="button" >Details Trajet</a></li>

					</ul>
				</div>
		<?php
	} //fin fonction afficherTrajet

//Test du champ date
function testDateHeure($date){
	$now = new DateTime("now");
	$date = new DateTime("$date");
	return $now<$date; //comparaison de la date systeme avec la date passée en paramètre
	}	
?>

<!-- Champs à remplir pour recherche de trajet -->
<center>
<fieldset>
 <legend> Trouvez le covoiturage qui correspond a vos attentes : </legend>
<form name="rechercher" action="rechercher_annonce.php" method="POST">	
	<input   name="depart" id="RechercherDepart" size="50" placeholder="Ville de depart" type="text" onchange="checkText(this.id)" required>
	<input   name="destination" id="RechercherDestination" size="50"  placeholder="Ville de destination" type="text" onchange="checkText(this.id)" required>
	<input   name="date" id="date"  placeholder="Date du trajet" type="date"  value="<?php echo date('Y-m-d', strtotime(date('Y-m-d')));?>">
	<a style="font-size: 36px;" ><button class="btn btn-default" type="submit">Rechercher</button></a>
</form>
</fieldset>

<!-- Champs à remplir pour proposer un trajet -->
<fieldset>
 <legend> Proposer un trajet : </legend>
<form name="proposer" action="proposer_trajet.php" method="POST">

	<input class="bginput"  name="depart" id="ProposerDepart" size="50" placeholder="Ville de depart" type="text" onchange="checkText(this.id)" required>
	<input class="bginput"  name="destination" id="ProposerDesitnation" size="50"  placeholder="Ville de destination" type="text" onchange="checkText(this.id)" required>
	
	<!--On passe la date sous la forme AAAA/MM/JJ a l'aide de la fonction date() --> 
	<input class="bginput"  name="date" id="date"  placeholder="Date du trajet" type="date" value="<?php echo date('Y-m-d', strtotime(date('Y-m-d')));?>">
	<a style="font-size: 36px;" ><button class="btn btn-default" type="submit">Proposer</button></a>
</form>
</br>
</br>

<!-- Boucle pour afficher les 6 derniers trajets -->
<div class=" col-lg-offset-3">		
		<?php 
		$queryTrajets=pg_query($connexion,"SELECT * FROM trajets");//recupere les trajets
		$i=0;
		while($i<6 && ($tabTrajet=pg_fetch_assoc($queryTrajets))){
				if(testDateHeure($tabTrajet['datedepart'].' '.$tabTrajet['heuredepart']))//si la date du trajet est un date anterieure on ne l'affiche pas
				{
					afficherTrajet($tabTrajet);	
					$i++;
				}
			}
		?>
</div>	

</fieldset>
<?php footer(); //inclus le fichier footer
?>

<!--AUTOCOMPLETION VILLE API-->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
	<script>
      function initialize() {
		var input = document.getElementById('RechercherDepart');
		var options = {
		  types: ['(cities)'],
		  componentRestrictions: {country: 'fr'}
		};
 
		autocomplete = new google.maps.places.Autocomplete(input, options);
 
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>

	<script>
      function initialize() {
		var input = document.getElementById('ProposerDepart');
		var options = {
		  types: ['(cities)'],
		  componentRestrictions: {country: 'fr'}
		};
 
		autocomplete = new google.maps.places.Autocomplete(input, options);
 
      }
      google.maps.event.addListener(window, 'load', initialize);
    </script>
	
	<script>
      function initialize() {
		var input = document.getElementById('ProposerDesitnation');
		var options = {
		  types: ['(cities)'],
		  componentRestrictions: {country: 'fr'}
		};
 
		autocomplete = new google.maps.places.Autocomplete(input, options);
 
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
	
	<script>
      function initialize() {
		var input = document.getElementById('RechercherDestination');
		var options = {
		  types: ['(cities)'],
		  componentRestrictions: {country: 'fr'}
		};
 
		autocomplete = new google.maps.places.Autocomplete(input, options);
 
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
	<!--FIN AUTOCOMPLETION VILLE API-->

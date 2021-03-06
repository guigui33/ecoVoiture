<!-- 
Fichier Appelant : rechercher_annonce.php

Fichier Appelé : fichier_annonce.php?trajet

Role : Permet d'afficher lors de l'appuie sur 'Detail trajet' les information de celui ci a l'aide d'un get passé en url contenant l'id du trajet selectionné.

-->


<?php include('entete_footer.php'); //inclus le fichier entete
entete('home');
require("connexion.php");

$trajet=false;

//Recuperation de l'id du trajet a l'aide d'un get
if(isset($_GET['idtrajet']))
{
    $res=pg_query($connexion, "SELECT * FROM trajets WHERE idtrajet=' " .$_GET['idtrajet']. " ' ");
    $trajet=pg_fetch_array($res);
}
//Affichage d'un message d'erreur dans le cas d'un ID du trajet invalide
if($trajet===0)
{
    ?>
    <div class="col-lg-12 alert alert-danger">ID du trajet invalide !</div>
    <?php
}
else
{
    if(isset($_POST['Postuler']) && isset($_SESSION['iduser']))
    {
		//Réservation du trajet par l'utilisateur, on affiche un message de confirmation
        $res=pg_query($connexion, "INSERT INTO reserver ( iduserclient, idtrajetreserve ) VALUES (".$_SESSION['iduser']." ,".$_GET['idtrajet'].") ");
        ?>
        <div class="col-lg-12 alert alert-success">Vous avez bien postulé sur ce trajet !</div>
        <?php
    }
	
	//Requete imbriquée afin de recuperer les informations concernants le conducteur du trajet
    $resConducteur=pg_query($connexion,"SELECT * FROM utilisateurs WHERE iduser= (SELECT idchauffeur FROM proposer WHERE idroute=' ".$trajet['idtrajet']." ' ) ");
    $conducteur=pg_fetch_array($resConducteur);
	
	//Recuperation de la ville de départ
    $reqVilleDepart = "SELECT * FROM lieux WHERE idlieu='" . $trajet['iddepart'] . "'";
    $resVilleDepart = pg_query($connexion, $reqVilleDepart);
    $villeDepart = pg_fetch_array($resVilleDepart);

	//Recuperation de la ville destination
    $resVilleArrivee = pg_query($connexion, "SELECT * FROM lieux WHERE idlieu='" . $trajet['idarrivee'] . "'") ;
    $villeArrivee = pg_fetch_array($resVilleArrivee);
    
	//Recuperation des caracteristiques de la voiture utilisée lors du trajet
    $reqVoiture = "SELECT * FROM voitures WHERE idvoiture='" . $trajet['idvoitureutilisee'] . "'";
    $resVoiture = pg_query($connexion, $reqVoiture);
    $voiture = pg_fetch_array($resVoiture);
    
	//Récuperation des informations des preferences de l'utilisateur
	$requete = ("SELECT fumeur, animaux, musique FROM voitures v, conduire c WHERE v.idvoiture=c.idvoiturepossedee AND c.idconducteur ='".$conducteur['iduser']."' " );
		$result=pg_query($connexion, $requete);
		if(!$result){
					pg_close($connexion);
					header('location:home.php?error=2');
					echo "Erreur dans la requete";
					}
					$data = pg_fetch_array($result);
					if ($data['fumeur']==='f')
						{
							$preferences = "interdit de fumer, ";
						}else
						{
							$preferences = "fumeurs autorisés, ";
						}
					if ($data['animaux']==='f')
						{
							$preferences .= "animaux interdits, ";
						}else
						{
							$preferences .= "animaux autorisés, ";
						}
					if ($data['musique']==='f')
						{
							$preferences .= "pas de musique pendant le trajet";
						}else
						{
							$preferences .= "musique pendant le trajet";
						}
						
//Recuperation de la note moyenne de l'utilisateur
$requete = ("SELECT AVG(note) AS notemoyenneuser FROM noter WHERE idusernote= ' ".$conducteur['iduser']."' ");
$result=pg_query($connexion, $requete);
if(!$result){
			header('location:home.php?error=2');
			echo "Erreur dans la requete";
			}
			$data = pg_fetch_array($result);
			$notemoyenne=$data['notemoyenneuser'];
			$notemoyenne = number_format($notemoyenne,1);
    ?>
		<!-- Mise en page de la page -->
      <div class="row">
        <div class="col-lg-4">
          <div class="annonce panel">
            <div class="panel-heading">
              <h3><strong><i><?=$villeDepart['ville']?> &rArr; <?=$villeArrivee['ville']?></i></strong></h3>
            </div>
            <div class="panel-body">
			
			<!-- Script Concernant l'API Google Afin de recuperer la carte, Afficher les markers depart et destination ainsi que le calcul de Durée et de Distance en Km.  -->
            <script src="https://maps.googleapis.com/maps/api/js"></script>     
  <script>
/* Affiche de la carte avec les parametres reçuent par CalculTrajet();*/
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;
function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer();
  var mapOptions = {
    zoom: 7
  }
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  directionsDisplay.setMap(map);
  calcRoute();
}

//Fonction permetant de calculer le trajet : la variable "Origin" prend en parametre la ville de depart et
//la variable "Destination" prend en parametre la destination
function calcRoute() {
  var request = {
      origin: '<?=$villeDepart['ville']?>',
      destination: '<?=$villeArrivee['ville']?>',
      travelMode: google.maps.TravelMode.DRIVING,
      unitSystem: google.maps.UnitSystem.METRIC
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
	  
	   //On affiche la durée et la distance calculée a l'aide de l'API Google
      $('#details-trajet ul').append('<br><li class="list-unstyled">Distance : <strong>' + response.routes[0].legs[0].distance.text + '</strong></li>');
      $('#details-trajet ul').append('<li class="list-unstyled">Durée : <strong>' + response.routes[0].legs[0].duration.text + '</strong></li>');
    }
  });
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>    

                <div id="map-canvas" style="height:450px"></div>
            </div>
          </div>
        </div>
		
		<!-- Affichage des informations du trajet -->
        <div class="col-lg-4">
            <div class="annonce panel">
                <div class="panel-heading" >
					<h3><strong><i>Détails du trajet</i></strong></h3>
				</div>
				<div class="panel-body" id="details-trajet">
					<ul>
						<li class="list-unstyled">Date : <strong><?php echo date('d-m-Y', strtotime(date('Y-m-d')));?></strong></li><br/>
						<li class="list-unstyled">Ville de départ : <strong><?=$villeDepart['ville']?></strong></li>
						<li class="list-unstyled">Heure de départ : <strong><?=$trajet['heuredepart'] ?></strong></li><br/>
						<li class="list-unstyled">Ville d'arrivée : <strong><?=$villeArrivee['ville']?></strong></li>
					</ul>
				</div>
			</div>
        </div>
		
		<!-- Affichage des informations du conducteur -->
		<div class="col-lg-4">
            <div class="annonce panel">
				<div class="panel-heading">
					<h3><strong><i>Conducteur</i></strong></h3>
				</div>
				<div class="panel-body">
					<ul>
						<li class="list-unstyled">Login Conducteur : <strong><?=$conducteur['login']?></strong></li>
						<li class="list-unstyled">Pays : <strong>France</strong></li>
						<li class="list-unstyled">Téléphone : <strong><?=$conducteur['telephone']?></strong></li>
						<li class="list-unstyled">Note Moyenne : <strong><?php if($notemoyenne==0.0){echo "Aucune note pour le moment";}else {echo $notemoyenne."/5";}?></strong></li>
					</ul>
				</div>
            </div>
        </div>
		
		<!-- Affichage des informations du véhicule utilisé pour se trajet -->
		<div class="col-lg-4">
			<div class="annonce panel">
				<div class="panel-heading">
					<h3><strong><i>Voiture</i></strong></h3>
				</div>
				<div class="panel-body">
					<ul>
						<li class="list-unstyled">Marque : <strong><?=$voiture['marque']?></strong></li>
						<li class="list-unstyled">Modèle : <strong><?=$voiture['modele'] ?></strong></li>
						<li class="list-unstyled">Couleur : <strong><?=$voiture['couleur']?></strong></li>
						<li class="list-unstyled">Nombre de places : <strong><?=$trajet['placesdispo']?></strong></li>
						<li class="list-unstyled">Autorisation durant le trajet : <strong><?=$preferences?></strong></li>
					</ul>
				</div>
            </div>
        </div>

      </div>
       
        
      </div>
      <div class="col-lg-12">
	  
      <?php
	    /*  Verification de la Session */ 	
      if(isset($_SESSION['iduser']))
      {
          // On vérifie si on a pas déjà postulé à ce trajet
          $req='SELECT iduserclient FROM reserver WHERE iduserclient='.$_SESSION['iduser'].' AND idtrajetreserve='.$_GET['idtrajet'].' ';
          $res=pg_query($connexion, $req) ;
		  
		  //Si l'utilisateur a déjà réservé le trajet, alors affichage d'un message le disant à l'utilisateur
          if(pg_num_rows($res) != 0)
          {
            ?>
				<div class="alert alert-info">Vous avez déjà postulé à ce trajet !</div>
            <?php
          }
          
          //Sinon si l'utilisateur est le conducteur du trajet, on lui affiche un message pour le prévenir
          else if ($conducteur['iduser'] === $_SESSION['iduser'])
          {
            ?>
				<div class="alert alert-info">Vous êtes le conducteur de ce trajet !</div>
            <?php
          }
		  
		  //Sinon l'utilisateur peut réserver le trajet et on lui donne accès au bouton de réservation
          else
          {  
            ?>
			    <form method="post" action="fiche_annonce.php?idtrajet=<?=$_GET['idtrajet']?>">
					<button type="submit" name="Postuler" class="btn btn-xl btn-success" id="submit" />Postuler à ce trajet !</button>
			    </form>
            <?php
          }
      }
	  
	  //Sinon l'utilisateur doit être connecté pour pouvoir réserver le trajet et on l'informe avec un message
      else
      {
        ?>
			<div class="alert alert-danger">Vous devez être connecté pour postuler à un trajet !</div>
        <?php
      }?>
      </div>
    <?php
}
footer();//inclus le fichier entete
?>

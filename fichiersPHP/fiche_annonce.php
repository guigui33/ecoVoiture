<?php include('entete_footer.php'); 
entete('home');
require("connexion.php");

$trajet=false;

if(isset($_GET['idtrajet']))
{
    $res=pg_query($connexion, "SELECT * FROM trajets WHERE idtrajet=' " .$_GET['idtrajet']. " ' ");
    $trajet=pg_fetch_array($res);
}
if(!$trajet)
{
    ?>
    <div class="col-lg-12 alert alert-danger">ID du trajet invalide !</div>
    <?php
}
else
{
    if(isset($_POST['Postuler']) && isset($_SESSION['iduser']))
    {
        $res=pg_query($connexion, "INSERT INTO reserver ( 'iduserclient', 'idtrajetreserve' ) VALUES (' " .$_SESSION['iduser']. " ' ,' " .$_GET['idtrajet']. " ' ) ");
        ?>
        <div class="col-lg-12 alert alert-success">Vous avez bien postulé sur ce trajet !</div>
        <?php
    }

    $resConducteur=pg_query($connexion,"SELECT * FROM utilisateurs WHERE iduser= (SELECT idchauffeur FROM proposer WHERE idroute=' ".$trajet['idtrajet']." ' ) ");
    $conducteur=pg_fetch_array($resConducteur);
	
    $reqVilleDepart = "SELECT * FROM lieux WHERE idlieu='" . $trajet['iddepart'] . "'";
    $resVilleDepart = pg_query($connexion, $reqVilleDepart);
    $villeDepart = pg_fetch_array($resVilleDepart);

    $resVilleArrivee = pg_query($connexion, "SELECT * FROM lieux WHERE idlieu='" . $trajet['idarrivee'] . "'") ;
    $villeArrivee = pg_fetch_array($resVilleArrivee);
    
    $reqVoiture = "SELECT * FROM voitures WHERE idvoiture='" . $trajet['idvoitureutilisee'] . "'";
    $resVoiture = pg_query($connexion, $reqVoiture);
    $voiture = pg_fetch_array($resVoiture);
    
    ?>
    
<div class="row">
        <div class="col-lg-4">
          <div class="annonce panel">
            <div class="panel-heading">
              <h3><strong><i>Carte</i></strong></h3>
            </div>
            <div class="panel-body">
                    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
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
        <div class="col-lg-6">
          <div class="annonce panel">
            <div class="panel-heading">
              <h3><strong><i><?=$villeDepart['ville']?> &rArr; <?=$villeArrivee['ville']?></i></strong></h3>
            </div>
            <div class="panel-body" id="details-trajet">
                <ul>
                <li class="list-unstyled">Date : <strong>12</strong></li><br/>
                <li class="list-unstyled">Ville de départ : <strong><?=$villeDepart['ville']?></strong></li>
                <li class="list-unstyled">Heure de départ : <strong><?=$trajet['heuredepart'] ?></strong></li><br/>
                <li class="list-unstyled">Ville d'arrivée : <strong><?=$villeArrivee['ville']?></strong></li>
                <li class="list-unstyled">Heure d'arrrivée prévue : <strong>A rajouter </strong></li>
                </ul>
		</div>
		</div>
          </div>
		<div class="col-lg-3">
			  <div class="annonce panel">
				<div class="panel-heading">
				  <h3><strong><i>Voiture</i></strong></h3>
				</div>
				<div class="panel-body">
                <ul>
                <li class="list-unstyled">Marque : <strong><?=$voiture['marque']?></strong></li>
                <li class="list-unstyled">Couleur : <strong><?=$voiture['couleur']?></strong></li>
                <li class="list-unstyled">Année : <strong><?=$voiture['modele'] ?></strong></li>
                <li class="list-unstyled">Nombre de places : <strong><?=$trajet['placesdispo']?></strong></li>
                </ul>
            </div>
          </div>
        </div>
          <div class="col-lg-3">
          <div class="annonce panel">
            <div class="panel-heading">
              <h3><strong><i>Conducteur</i></strong></h3>
            </div>
            <div class="panel-body">
                <ul>
                <li class="list-unstyled"><strong><?=$conducteur['prenom']?></strong></li>
                <li class="list-unstyled">Pays : <strong>France</strong></li>
                <li class="list-unstyled">Téléphone : <strong><?=$conducteur['telephone']?></strong></li>
                </ul>
            </div>
          </div>
        </div>
      </div>
       
        
      </div>
      <div class="col-lg-12">
      <?php
	  echo $_SESSION['iduser'];
      if(isset($_SESSION['iduser']))
      {
          // On vérifie si on a pas déjà postulé à ce trajet
          $req="SELECT iduserclient FROM reserver WHERE iduserclient='".$_SESSION['iduser']."' AND idtrajet='".$_GET['idtrajet']."'";
          $res=pg_query($connexion, $req) ;
          if(pg_num_rows($res) != 0)
          {
              ?>
          <div class="alert alert-info">Vous avez déjà postulé à ce trajet !</div>
          <?php
          }
          
          // On vérifie si on est pas le conducteur
          else if ($conducteur['iduser'] == $_SESSION['iduser'])
          {
              
              ?>
          <div class="alert alert-info">Vous êtes le conducteur de ce trajet !</div>
          <?php
          }
          else
          {  
          ?>
      <form method="post" action="fiche_annonce.php?trajet=<?=$_GET['idtrajet']?>">
        <button type="submit" name="Postuler" class="btn btn-xl btn-success" id="submit" />Postuler à ce trajet !</button>
      </form>
      <?php
          }
      }
      else
      {
          ?>
          <div class="alert alert-danger">Vous devez être connecté pour postuler à un trajet !</div>
          <?php
      }?>
      </div>
    <?php
}
footer();
?>
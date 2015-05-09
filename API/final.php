	<!DOCTYPE html> 
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Calcul d'itinéraire Google Map Api v3</title>
  </head>
  <style type="text/css">
    #container #map{width:700px;height:500px;margin:auto;}
  </style>
  <body>
    <div id="container">
        <h1>Calcul d'itinéraire Google Maps Api V3</h1>
        <div id="destinationForm">
            <form action="" method="get" name="direction" id="direction">
                <label>Point de départ :</label>
                <input type="text" name="origin" id="origin">
                <label>Destination :</label>
                <input type="text" name="destination" id="destination">
                <input type="button" value="Calculer l'itinéraire" onclick="javascript:calculate()">
				<input type="button" value="Calculer Duree trajet" onclick="javascript:calculDuree()">
				<input type="button" value="Calculer Distance trajet" onclick="javascript:calculDistance()">
            </form>
        </div>

        <div id="map">
            <p>Veuillez patienter pendant le chargement de la carte...</p>
        </div>
		<div id="total"></div> 
    </div>
    
    <!-- Include Javascript -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=fr"></script>
    <script type="text/javascript" src="trajet.js"></script>
	<script type="text/javascript" src="temps.js"></script>
	<script type="text/javascript" src="distance.js"></script>
  </body>
</html>

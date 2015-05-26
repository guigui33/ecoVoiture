<?php include('entete_footer.php'); 
entete('home');
?>

<center>
<fieldset>
 <legend> Trouvez le covoiturage qui correspond a vos attentes : </legend>
<form name="rechercher" action="rechercher_annonce.php" method="POST">

	
	<input   name="depart" id="RechercherDepart" size="50" placeholder="Ville de depart" type="text" onchange="checkText(this.id)">
	<input   name="destination" id="RechercherDestination" size="50"  placeholder="Ville de destination" type="text" onchange="checkText(this.id)">
	<input   name="date" id="date"  placeholder="Date du trajet" type="date"  value="<?php echo date('Y-m-d', strtotime(date('Y-m-d')));?>">
	<a style="font-size: 36px;" ><button class="btn btn-default" type="submit">Rechercher</button></a>
</form>
</fieldset>

<fieldset>
 <legend> Proposer un trajet : </legend>
<form name="proposer" action="proposer_trajet.php" method="POST">

	<input class="bginput"  name="depart" id="ProposerDepart" size="50" placeholder="Ville de depart" type="text" onchange="checkText(this.id)">
	<input class="bginput"  name="destination" id="ProposerDesitnation" size="50"  placeholder="Ville de destination" type="text" onchange="checkText(this.id)">
	<input class="bginput"  name="date" id="date"  placeholder="Date du trajet" type="date" value="<?php echo date('Y-m-d', strtotime(date('Y-m-d')));?>">
	<a style="font-size: 36px;" ><button class="btn btn-default" type="submit">Proposer</button></a>
</form>
</br>
</br>
<div class=" col-lg-offset-3" style=" margin-left:20%;">
        <div class="col-lg-3  information">
			
				<h4>TOULOUSE - PARIS</h4>
					<ul >
						<li class="list-unstyled">Conducteur : Pierre</li>
						<li class="list-unstyled">Départ : Toulouse 31000</li>
						<li class="list-unstyled">Arrivée : Paris, 75001</li>
						<li class="list-unstyled">Date : 20/05/2015</li>
						<li class="list-unstyled">Heure de Départ : 10h15</li>
						<li class="list-unstyled">Heure d'Arrrivée prévue : 16h15 </br><a class="btn btn-lg btn-success bouton" href="fiche_annonce.php" role="button">Details Trajet</a></li>
					</ul>
		
		</div>
		    <div class="col-lg-3 information">
			
				<h4>TOULOUSE - PARIS</h4>
					<ul >
						<li class="list-unstyled">Conducteur : Lea</li>
						<li class="list-unstyled">Départ : Toulouse 31000</li>
						<li class="list-unstyled">Arrivée : Paris, 75016</li>
						<li class="list-unstyled">Date : 20/05/2015</li>
						<li class="list-unstyled">Heure de Départ : 10h20</li>
						<li class="list-unstyled">Heure d'Arrrivée prévue : 16h20 </br><a class="btn btn-lg btn-success bouton" href="fiche_annonce.php" role="button">Details Trajet</a></li>
					</ul>
			
		</div>
		    <div class="col-lg-3 information">
			
				<h4>TOULOUSE - PARIS</h4>
					<ul >
						<li class="list-unstyled">Conducteur : Thomas</li>
						<li class="list-unstyled">Départ : Toulouse 31000</li>
						<li class="list-unstyled">Arrivée : Paris, 75013</li>
						<li class="list-unstyled">Date : 20/05/2015</li>
						<li class="list-unstyled">Heure de Départ : 15h00</li>
						<li class="list-unstyled">Heure d'Arrrivée prévue : 21h00 </br><a class="btn btn-lg btn-success bouton" href="fiche_annonce.php" role="button">Details Trajet</a></li>
					</ul>
			
		</div>
		
		  <div class="col-lg-3 information">
			
				<h4>TOULOUSE - PARIS</h4>
					<ul >
						<li class="list-unstyled">Conducteur : Martine</li>
						<li class="list-unstyled">Départ : Toulouse 31000</li>
						<li class="list-unstyled">Arrivée : Paris, 75004</li>
						<li class="list-unstyled">Date : 20/05/2015</li>
						<li class="list-unstyled">Heure de Départ : 15h45</li>
						<li class="list-unstyled">Heure d'Arrrivée prévue : 21h45 </br><a class="btn btn-lg btn-success bouton" href="fiche_annonce.php" role="button">Details Trajet</a></li>
					</ul>
			
		</div>
		  <div class="col-lg-3 information">
			
				<h4>TOULOUSE - PARIS</h4>
					<ul >
						<li class="list-unstyled">Conducteur : Jean</li>
						<li class="list-unstyled">Départ : Toulouse 31000</li>
						<li class="list-unstyled">Arrivée : Paris, 75008</li>
						<li class="list-unstyled">Date : 20/05/2015</li>
						<li class="list-unstyled">Heure de Départ : 18h10</li>
						<li class="list-unstyled">Heure d'Arrrivée prévue : 00h10 </br><a class="btn btn-lg btn-success bouton" href="fiche_annonce.php" role="button">Details Trajet</a></li>
					</ul>
			
		</div>
		  <div class="col-lg-3 information">
			
				<h4>TOULOUSE - PARIS</h4>
					<ul >
						<li class="list-unstyled">Conducteur : Clara</li>
						<li class="list-unstyled">Départ : Toulouse 31000</li>
						<li class="list-unstyled">Arrivée : Paris, 75009</li>
						<li class="list-unstyled">Date : 20/05/2015</li>
						<li class="list-unstyled">Heure de Départ : 18h30</li>
						<li class="list-unstyled">Heure d'Arrrivée prévue : 00h30 </br><a class="btn btn-lg btn-success bouton" href="fiche_annonce.php" role="button">Details Trajet</a></li>
					</ul>
			
		</div>
</div>	

</fieldset>
<?php footer();
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

	<!--FIN AUTOCOMPLETION VILLE API<input id="searchTextField" type="text" size="50">-->
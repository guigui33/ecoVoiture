

<?php include('entete_footer.php'); 
entete('home');
?>
<center>
<fieldset>
 <legend> Trouver le covoiturage qui correspond a vos attentes : </legend>
<form name="rechercher" action="rechercher.php" method="POST">
	<div id="entrerfavoris">
	
	<!--AUTOCOMPLETION VILLE API-->
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
	
	<script>
      function initialize() {
		var input = document.getElementById('searchTextField');
		var options = {
		  types: ['(cities)'],
		  componentRestrictions: {country: 'fr'}
		};
 
		autocomplete = new google.maps.places.Autocomplete(input, options);
 
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
	
	
	<!--FIN AUTOCOMPLETION VILLE API<input id="searchTextField" type="text" size="50">-->
	
	
	<input class="bginput"  name="depart" id="searchTextField" size="50" placeholder="Ville de depart" type="text" onchange="checkText(this.id)">
	<input class="bginput"  name="destination" id="searchTextField" size="50"  placeholder="Ville de destination" type="text" onchange="checkText(this.id)">
	<input class="bginput"  name="date" id="date"  placeholder="Date du trajet" type="date" onchange="checkText(this.id)">
	
	<a style="font-size: 36px;" ><button class="btn btn-default" type="submit">Rechercher</button></a>
</div>
</form>
</fieldset>
<form action="proposer.php" method="post" >
<fieldset>
 <legend> Proposer un trajet : </legend>
<form name="rechercher" action="rechercher.php" method="POST">
	<div id="entrerfavoris">
	<input class="bginput"  name="depart" id="searchTextField" size="50" placeholder="Ville de depart" type="text" onchange="checkText(this.id)">
	<input class="bginput"  name="destination" id="searchTextField" size="50"  placeholder="Ville de destination" type="text" onchange="checkText(this.id)">
	<input class="bginput"  name="date" id="date"  placeholder="Date du trajet" type="date" onchange="checkText(this.id)">
	<a style="font-size: 36px;" ><button class="btn btn-default" type="submit">Proposer</button></a>
</div>
<div class="row marketing">
        <div class="col-lg-4">
			
				<h4>TOULOUSE - PARIS</h4>
					<ul >
						<li class="list-unstyled">Conducteur : Pierre</li>
						<li class="list-unstyled">Départ : Toulouse 31000</li>
						<li class="list-unstyled">Arrivée : Paris, 75000</li>
						<li class="list-unstyled">Date : 20/05/2015</li>
						<li class="list-unstyled">Heure de Départ : 10h15 &nbsp; Heure d'Arrrivée prévue : 2h15</li>
						<li class="list-unstyled">Heure d'Arrrivée prévue : 2h15 </br><a class="btn btn-lg btn-success bouton" href="detail.html" role="button">Details Trajet</a></li>
					</ul>
			
		</div>
		    <div class="col-lg-4">
			
				<h4>TOULOUSE - PARIS</h4>
					<ul >
						<li class="list-unstyled">Conducteur : Pierre</li>
						<li class="list-unstyled">Départ : Toulouse 31000</li>
						<li class="list-unstyled">Arrivée : Paris, 75000</li>
						<li class="list-unstyled">Date : 20/05/2015</li>
						<li class="list-unstyled">Heure de Départ : 10h15 &nbsp; Heure d'Arrrivée prévue : 2h15</li>
						<li class="list-unstyled">Heure d'Arrrivée prévue : 2h15 </br><a class="btn btn-lg btn-success bouton" href="detail.html" role="button">Details Trajet</a></li>
					</ul>
			
		</div>
		    <div class="col-lg-4">
			
				<h4>TOULOUSE - PARIS</h4>
					<ul >
						<li class="list-unstyled">Conducteur : Pierre</li>
						<li class="list-unstyled">Départ : Toulouse 31000</li>
						<li class="list-unstyled">Arrivée : Paris, 75000</li>
						<li class="list-unstyled">Date : 20/05/2015</li>
						<li class="list-unstyled">Heure de Départ : 10h15 &nbsp; Heure d'Arrrivée prévue : 2h15</li>
						<li class="list-unstyled">Heure d'Arrrivée prévue : 2h15 </br><a class="btn btn-lg btn-success bouton" href="detail.html" role="button">Details Trajet</a></li>
					</ul>
			
		</div>
		
		  <div class="col-lg-4">
			
				<h4>TOULOUSE - PARIS</h4>
					<ul >
						<li class="list-unstyled">Conducteur : Pierre</li>
						<li class="list-unstyled">Départ : Toulouse 31000</li>
						<li class="list-unstyled">Arrivée : Paris, 75000</li>
						<li class="list-unstyled">Date : 20/05/2015</li>
						<li class="list-unstyled">Heure de Départ : 10h15 &nbsp; Heure d'Arrrivée prévue : 2h15</li>
						<li class="list-unstyled">Heure d'Arrrivée prévue : 2h15 </br><a class="btn btn-lg btn-success bouton" href="detail.html" role="button">Details Trajet</a></li>
					</ul>
			
		</div>
		  <div class="col-lg-4">
			
				<h4>TOULOUSE - PARIS</h4>
					<ul >
						<li class="list-unstyled">Conducteur : Pierre</li>
						<li class="list-unstyled">Départ : Toulouse 31000</li>
						<li class="list-unstyled">Arrivée : Paris, 75000</li>
						<li class="list-unstyled">Date : 20/05/2015</li>
						<li class="list-unstyled">Heure de Départ : 10h15 &nbsp; Heure d'Arrrivée prévue : 2h15</li>
						<li class="list-unstyled">Heure d'Arrrivée prévue : 2h15 </br><a class="btn btn-lg btn-success bouton" href="detail.html" role="button">Details Trajet</a></li>
					</ul>
			
		</div>
		  <div class="col-lg-4">
			
				<h4>TOULOUSE - PARIS</h4>
					<ul >
						<li class="list-unstyled">Conducteur : Pierre</li>
						<li class="list-unstyled">Départ : Toulouse 31000</li>
						<li class="list-unstyled">Arrivée : Paris, 75000</li>
						<li class="list-unstyled">Date : 20/05/2015</li>
						<li class="list-unstyled">Heure de Départ : 10h15 &nbsp; Heure d'Arrrivée prévue : 2h15</li>
						<li class="list-unstyled">Heure d'Arrrivée prévue : 2h15 </br><a class="btn btn-lg btn-success bouton" href="detail.html" role="button">Details Trajet</a></li>
					</ul>
			
		</div>
	</div>	
</form>
</fieldset>
<?php footer();
?>
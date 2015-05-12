calculDuree = function() 
{
	//récupération des champs du formulaire

	var adresse_depart=document.forms[0].origin.value;
	var adresse_arriver=document.forms[0].destination.value;
	
	var origine=adresse_depart;
	var destination=adresse_arriver;
	
	//requête de distance auprès du service DistanceMatrix, avec ici une seule adresse de départ et une seule d'arrivée
	var service = new google.maps.DistanceMatrixService();
	service.getDistanceMatrix(
	  {
		origins: [origine],
		destinations: [destination],
		travelMode: google.maps.TravelMode.DRIVING,
		unitSystem: google.maps.UnitSystem.METRIC,
		avoidHighways: false,
		avoidTolls: false
	  }, duree);
}
	
function duree(response, status)
{
	if (status != google.maps.DistanceMatrixStatus.OK)
	{
		alert('Erreur : ' + status); //message d'erreur du serveur distant GG Maps
	}
	else
	{
		//réponses du serveur (
		var origins = response.originAddresses;
		var destinations = response.destinationAddresses;
		for (var i = 0; i < origins.length; i++)
		{
			var results = response.rows[i].elements;
			var dep = origins[i];
			if(dep!='')
			{
				for (var j = 0; j < results.length; j++)
				{
					var element = results[j];
					var statut = element.status;
					var arr = destinations[j];
					if(statut=='OK')
					{
						var duree = element.duration.text;
						document.getElementById('TempsTrajet').innerHTML = 'Temps : ' + duree;
					}
					else if(statut=='NOT_FOUND')
					{
						alert("impossible de localiser l'adresse d'arrivée");
					}
					else if(statut=='ZERO_RESULTS')
					{
						alert("impossible de calculer cette duree");
					}
				}
			}
			else
			{
				alert("impossible de localiser l'adresse de départ");
			}
		}
	}
}
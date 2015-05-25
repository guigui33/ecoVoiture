<?PHP
require_once("entete_footer.php");//inclus le fichier entete
entete('Foire aux questions');
?>

<h2 style="background:#46bcde"> Foire aux questions </h2>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<script type="text/javascript">
/*********
MENU  ACCORDEON
*********/
$(document).ready(function() {
  $('.accordeon').hide(); // on cache tous les textes (blocs ayant la classe texte
  $('h4').click(function() { // si on clique sur un titre
    $(this).next('div:hidden').slideDown() // on deroule le div caché qui suit directement le titre
    .siblings('div:visible').slideUp(); // et on cache les div similaires qui etait visible
  });
});
</script>

<body>
<div id="container">
	<div id="contenu">	
			<h4>Comment s'inscrire sur le site ?</h4>
			<div class="accordeon">
				Pour vous incrire sur le site, il faut vous rendre dans la partie gauche de la banière présente en haut du site puis en cliquant sur "<a href="inscription.php">Pas encore inscrit?</a>". Sur cette nouvelle page, 
				vous aurez à renseigner diverses informations obligatoires tel que votre email, votre nom, votre mot de passe, ...
			</div>
			
			<h4>Comment se connecter au site ?</h4>
			<div class="accordeon">
				Pour vous incrire sur le site, il faut vous rendre dans la partie gauche de la banière présente en haut du site puis renseigner votre identifiant et votre mot de passe. Si vos identifiants sont correctes, vous serez 
				redirigé sur la page d'accueil en étant authentifié. Dans le cas contraire, vous serez redirigé sur le page d'accueil avecu n message d'erreur de connexion.
			</div>
	
			<h4>Comment rechercher un trajet ?</h4>
			<div class="accordeon">
				Pour rechercher un trajet, il faut vous rendre sur la page d'accueil en cliquant sur le logo ou la banière du site present en haut de chaque page. Vous trouverez ensuite sur la page d'accueil un formulaire 
				pour la recherche de covoiturage où il vous sera demander la ville de départ, la ville de destination ainsi que la date du trajet. Une fois ces informations renseignées, il suffira de cliquer sur rechercher.
			</div>
	
			<h4>Comment déposer une annonce ?</h4>
			<div class="accordeon">
				Pour déposer une annonce, il faut vous rendre sur la page d'accueil en cliquant sur le logo ou la bannière du site present en haut de chaque page. Vous trouverez ensuite sur la page d'accueil un formulaire
				pour deposer une annonce où il vous sera demander la ville de départ, la ville de destination ainsi que la date du trajet. Une fois ces informations renseignées, il suffira de cliquer sur rechercher.
			</div>
			
			<h4>Comment supprimer mon compte</h4>
			<div class="accordeon">
				Pour supprimer votre compte, il vous faut utiliser le formulaire de contact dont l'accès se trouve en bas de chaque page en cliquant sur "<a href="nousContacter.php">Nous contacter</a>". Préciser le motif de 
				votre demande dans le menu déroulant et un administrateur vous répondra sous 48h.
			</div>
			
			<h4>Est-il possible d'avoir plusieurs véhicules ?</h4>
			<div class="accordeon">
				Un même profil utilisateur peut compter plusieurs véhicules, rendez-vous sur les options de votre profil pour ajouter des voitures. Lorsque vous déposerez une annonce de voyage, vous pourrez choisir quel véhicule utiliser.
			</div>	
			
			<h4>Je rencontre un problème non recensé dans la FAQ, que faire ?</h4>
			<div class="accordeon">
				Vous pouvez nous contacter via le formulaire de contact dont l'accès se trouve en bas de chaque page en cliquant sur "<a href="nousContacter.php">Nous contacter</a>" pour envoyer votre demande à un administrateur qui saura vous repondre.
				
				<br><br>Votre requete sera traitée entre 24h et 48h. Soyez le plus précis possible dans votre demande afin que votre problème soit resolu le plus rapidement possible.
			</div>	
			
			<h4>Pourquoi proposer un site de covoiturage gratuit entre etudiant ?</h4>
			<div class="accordeon">
				Il existe divers sites de covoiturage pour la plus part payant et d'autres gratuits en ligne. Nous avons décider de fonder notre propre site de covoiturage pour les étudiants dans le but de les aider dans leurs déplacements. 
				Les etudiants ont souvent la nécessité de ce déplacer pour des entretiens, ou même prendre un peu de vacances, mais leurs moyens sont limités par le manque de salaire.
				
				<br><br>Nous voulons les aider en proposant des trajets par des étudiants, pour des étudiants et le tout sans frais. Un jour un étudiant proposera un trajet gratuitement à des personnes, un autre jour ce même etudiant 
				pourra profiter des trajet d'autruis.
			</div>	
			
			<h4>Pourquoi votre site ce nomme "Ecovoiture" ?</h4>
			<div class="accordeon">
				Comme vous pouvez le voir, le nom "Ecovoiture" peut être décomposer en deux partie. "Eco" pour l'écologie, car le covoiturage permet d'utiliser moins de voiture pour un trajet en rassemblant les gens dans un meme vehicule donc moins de polution. 
				Puis il y a "voiture" qui est le moyen de transport utiliser dans le covoiturage.
				
				<br><br>Nous avons voulu que notre l'activité de notre site soit facilement reconnaissable tout en passant un message écologique pour changer la manière de penser des personnes, d'ou "Ecovoiture".
			</div>	
		<hr />
	</div>
</div>
</body>

<?php footer(); ?>
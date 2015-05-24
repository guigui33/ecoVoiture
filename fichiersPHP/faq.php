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
			<h4>Comment rechercher un trajet ?</h4>
			<div class="accordeon">
				Pour rechercher un trajet, il faut vous rendre sur la page d'accueil en cliquant sur le logo ou la baniere du site present en haut de chaque page. Vous trouverez ensuite sur la page d'accueil un formulaire pour la recherche de covoiturage ou il vous sera demander la ville de depart, la ville de destination ainsi que la date du trajet. Une fois ces information renseignees, il suffira de cliquer sur rechercher.
			</div>
	
			<h4>Comment je peux deposer une annonce ?</h4>
			<div class="accordeon">
				Pour deposer une annonce, il faut vous rendre sur la page d'accueil en cliquant sur le logo ou la banniere du site present en haut de chaque page. Vous trouverez ensuite sur la page d'accueil un formulaire pour deposer une annonce ou il vous sera demander la ville de depart, la ville de destination ainsi que la date du trajet. Une fois ces information renseignees, il suffira de cliquer sur rechercher.
			</div>
			
			<h4>Comment puis-je supprimer mon compte</h4>
			<div class="accordeon">
				Pour supprimer votre compte, il vous faut utiliser le formulaire de contact dont l'accès se trouve en bas de chaque page en cliquant sur "<a href="nousContacter.php">Nous contacter</a>". Preciser le motif de votre demande dans le menu déroulant et un administrateur vous répondra sous 48h.
			</div>
			
			<h4>Est-il possible d'avoir plusieurs vehicules ?</h4>
			<div class="accordeon">
				Un meme profil utilisateur peut compter plusieurs vehicules, rendez vous sur les options de votre profil pour ajouter des voitures. Lorsque vous deposerez une annonce de voyage, vous pourrez choisir quel vehicule utiliser.
			</div>	
			
			<h4>Je rencontre un probleme non recense dans la FAQ, que faire ?</h4>
			<div class="accordeon">
				Vous pouvez nous contacter via le formulaire de contact dont l'accès se trouve en bas de chaque page en cliquant sur "<a href="nousContacter.php">Nous contacter</a>" pour envoyer votre demande a un administrateur qui saura vous repondre.
				<br><br>Votre requete sera traitee entre 24h et 48h. Soyez le plus precis possible dans votre demande afin que votre probleme soit resolu le plus rapidement possible.
			</div>	
			
			<h4>Pourquoi proposer un site de covoiturage gratuit entre etudiant ?</h4>
			<div class="accordeon">
				Il existe divers sites de covoiturage pour la plus part payant et d'autres gratuits en ligne. Nous avons decider de fonder notre propre site de covoiturage pour les etudiants dans le but de les aider dans leur deplacement. Les etudiants ont souvent la necessite de ce deplacer pour des entretiens, ou meme prendre un peu de vacances, mais leurs moyens sont limites par les prix.
				<br><br>Nous voulons les aider en proposant des trajets par des etudiants, pour des etudiant et le tout sans frais. Un jour un etudiant proposera un trajet gratuitement a des personnes, un autre jour ce meme etudiant pourra profiter des trajet d'autruis.
			</div>	
			
			<h4>Pourquoi votre site ce nomme "Ecovoiture" ?</h4>
			<div class="accordeon">
				Comme vous pouvez le voir, le nom "Ecovoiture" peut etre decomposer en deux partie. "Eco" pour l'ecologie, car le covoiturage permet d'utiliser moins de voiture pour un trajet en rassemblant les gens dans un meme vehicule. Puis il y a "voiture" qui est le moyen de transport utiliser dans le covoiturage.
				<br><br>Nous avons voulu que notre l'activite de notre site soit facilement reconnaissable tout en passant un message ecologique pour changer la maniere de penser des personnes, d'ou "Ecovoiture".
			</div>	
		<hr />
	</div>
</div>
</body>

<?php footer(); ?>
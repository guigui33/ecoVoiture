<?PHP
require_once("entete_footer.php");//inclus le fichier entete
entete('Foire aux questions');
?>

<!-- Alignement du titre et couleur bleu de la banière du titre -->
<h2 class="alerte alert-info"> Foire aux questions </h2>

<!-- Création des menus de type "Accordéon" -->
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
<!-- Mise en forme du texte dans les div -->
<div class="alignement">
	<div id="contenu">	
		<h4>Comment s'inscrire sur le site ?</h4>
		<div class="accordeon">
			Pour vous incrire sur le site, il faut vous rendre dans la partie droite de la banière présente en haut de chaque page puis en cliquant sur "<a href="inscription.php">Pas encore inscrit?</a>". Sur cette nouvelle page, 
			vous aurez à renseigner diverses informations obligatoires telles que votre email, votre nom ou encore votre mot de passe.
		</div>
		
		<h4>Comment accéder à votre compte utilisateur ?</h4>
		<div class="accordeon">
			Pour vous connecter à votre compte utilisateur, il faut vous rendre dans la partie droite de la banière présente en haut du site puis renseigner votre identifiant et votre mot de passe. Si vos identifiants sont corrects, vous serez 
			redirigé sur la page d'accueil en tant qu'utilisateur authentifié. Dans le cas contraire, vous verrez apparaitre un message d'erreur de connexion.
		</div>

		<h4>Comment rechercher un trajet ?</h4>
		<div class="accordeon">
			Pour rechercher un trajet, il faut vous rendre sur la page d'accueil en cliquant sur le logo présent en haut à gauche de chaque page. Vous trouverez ensuite un formulaire 
			où il vous sera demandé de saisir la ville de départ, la ville de destination ainsi que la date du trajet. Une fois ces informations renseignées, il vous suffira de cliquer sur rechercher.
		</div>

		<h4>Comment proposer un trajet ?</h4>
		<div class="accordeon">
			Pour proposer un trajet, il faut vous rendre sur la page d'accueil en cliquant sur logo présent en haut à gauche de chaque page. Vous trouverez ensuite un formulaire
			où il vous sera demandé de saisir la ville de départ, la ville de destination ainsi que la date du trajet. Une fois ces informations renseignées, il vous suffira de cliquer sur proposer.
		</div>
		
		<h4>Comment supprimer mon compte</h4>
		<div class="accordeon">
			Pour supprimer votre compte, il faut utiliser le formulaire de contact dont l'accès se trouve en bas de chaque page en cliquant sur le lien "<a href="contact_admin.php">Nous contacter</a>". Vous trouverez ensuite
			dans le menu déroulant l'objet "Supprimer mon compte"  et pourrez envoyer votre demande en remplissant les champs Objet, Message, Email et Téléphone. Un administrateur confirmera votre demande de suppression par mail sous 48h.
		</div>
		
		<h4>Est-il possible d'avoir plusieurs véhicules ?</h4>
		<div class="accordeon">
			Un même profil utilisateur peut compter plusieurs véhicules, rendez-vous sur les options de votre profil pour ajouter des voitures. Ainsi, lorsque vous déposerez une annonce de voyage, vous pourrez choisir quel véhicule utiliser.
		</div>	
		
		<h4>Je rencontre un problème non recensé dans la FAQ, que faire ?</h4>
		<div class="accordeon">
			Vous pouvez utiliser via le formulaire de contact dont l'accès se trouve en bas de chaque page en cliquant sur "<a href="contact_admin.php">Nous contacter</a>" pour envoyer votre demande à un administrateur qui saura vous répondre.
			 Soyez le plus précis possible dans votre demande afin que votre problème soit résolu le plus rapidement possible.
			<br><br>Votre requête sera traitée entre au plus sous 48h.
		</div>	
		
		<h4>Pourquoi proposer un site de covoiturage gratuit entre étudiants ?</h4>
		<div class="accordeon">
			Il existe divers sites de covoiturage pour la plupart payant et très peu de gratuits. Nous avons décidé de fonder notre propre site de covoiturage pour étudiants dans le but de les aider dans leurs déplacements. 
			Les etudiants ont souvent la nécessité de se déplacer pour des entretiens, ou même prendre un peu de vacances, mais leurs moyens financiers sont souvent limités.
			
			<br><br>Proposer des trajets entre étudiants et le tout sans frais pourra leur permettre de faire de réelles économies.
		</div>	
		
		<h4>Pourquoi votre site s'appelle "Ecovoiture" ?</h4>
		<div class="accordeon">
			Comme vous pouvez le voir, le nom "Ecovoiture" peut être décomposé en deux partie. "Eco" pour l'écologie, car le covoiturage permet de limiter la pollution pour un trajet en rassemblant les voyageurs dans un même véhicule.
			"Eco" également pour les économies, car la gratuité du trajet permet aux étudiants de se déplacer à moindres frais.
			Puis "Voiture" pour le moyen de transport.
			
			<br><br>Nous avons voulu que l'activité de notre site soit facilement reconnaissable tout en transmettant un message d'avenir pour la planète. En participant à ce projet vous agissez pour le bien de l'environnement.
		</div>	
	</div>
</div>
</body>

<!-- inclus le fichier footer -->
<?php footer(); ?>

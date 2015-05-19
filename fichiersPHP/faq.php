<?PHP
require_once("entete_footer.php");//inclus le fichier entete
entete('Foire aux questions');
?>

<h2 style="background:blue"> Foire aux questions </h2>

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
			<h4>Comment je peux deposer une annonce ?</h4>
			<div class="accordeon">
				Pour deposer une annonce, il faut vous rendre sur la page d'accueil en cliquant sur le logo ou la banniere du site present en haut de chaque page.
				Vous trouverez ensuite sur la page d'accueil un formulaire pour deposer une annonce.
			</div>
			
			<h4>Comment puis-je supprimer mon compte</h4>
			<div class="accordeon">
				Pour supprimer votre compte, il vous faut utiliser le formulaire de contact dont l'accès se trouve en bas de chaque page en cliquant sur "contact". Preciser le motif de votre demande dans le menu déroulant et un administrateur vous répondra sous 48h.
			</div>
			
			<h4>Est-il possible d'avoir plusieurs vehicules ?</h4>
			<div class="accordeon">
				Un meme profil utilisateur peut compter plusieurs vehicules, rendez vous sur les options de votre profil pour ajouter des voitures. Lorsque vous deposerez une annonce de voyage, vous pourrez choisir quel vehicule utiliser.
			</div>	
		<hr />
	</div>
</div>
</body>

<?php footer(); ?>
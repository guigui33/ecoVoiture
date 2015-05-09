<?php
/*ajouter fichier require_once(entete_footer.php) dans les fichiers.
pour appeler l'entete faite au debut du fichier entete($titre);
$titre=nom de la page 
puis a la fin du fichier faite footer();
*/
session_start();
	$connexion;
	if(!isset($_SESSION['logged']) || !$_SESSION['logged']){
		$connexion=false;
	}
	else {
		$connexion=true;
		$nom=$_SESSION['nom'];
		}	
		
function entete($titre){ ?>
	<!DOCTYPE html>
	<html lang="fr">
	<head>
		<title><?php echo $titre; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="bootstrap-3.3.4-dist/css/bootstrap.min.css">
	</head>
	<body>
		<header>
			<div style="">
				<img src="logoEcoVoiture.jpg" alt="logo Eco Voiture" width="600px" height="100px" style="border:45px black;"/>
				<img src="banniereEcoVoiture.jpg" alt="banniereEcoVoiture" width="600px" height="100px" style="border:45px black;"/>
			</div>
			<div>				
				<?php if($GLOBALS['connexion']==false){ ?>
				Se connecter: </br>
				<form action="verificationCompte.php" method="POST">
				 Identifiant	Mot de passe <br/>
				 <input type="login" name="login"> <br/>
				 <input type="password" name="password"> <br/>
				 <input type="submit" value="Connexion">
				</form>
				<a href="inscription.php?">Pas encore inscrit?</a>
				<?php }			
				else{?>
					Bienvenue <?php echo $GLOBALS['nom'];?>
					<button type="button" onclick="href='mesAnnonces.php'">Mes annonces</button>
					<button type="button" onclick="href='monProfil.php'">Mon profil</button>
					<button type="button" onclick="href='mesReservations.php'">Mes reservations</button>
					<button type="button" onclick="href='seDeconnecter.php'">Se deconnecter</button>
				<?php } ?>
				</div>
		</header>
<?php } 

function footer(){ ?>
	<footer>
	<button type="button" onclick="href='a_propos.php'">A propos d'Ecovoiture</button>
	<button type="button" onclick="href='foire_questions.php'">Foire aux questions</button>
	<button type="button" onclick="href='conditions_generales_utilisation.php'">Conditions générales d'utilisation</button>
	<button type="button" onclick="href='nous_contacter.php'">Nous contacter</button>
	</footer>
	</body>
	</html>
<?php } ?>



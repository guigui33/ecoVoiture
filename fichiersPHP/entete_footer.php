<?php
/*ajouter fichier require_once(entete_footer.php) dans les fichiers.
pour appeler l'entete faite au debut du fichier entete($titre);
$titre=nom de la page 
puis a la fin du fichier faite footer();
*/
include('droit_acces_page.php');

session_start();
	$connexion;
	if(!isset($_SESSION['logged']) || !$_SESSION['logged'])//si l'utilisateur n'est pas connecté
	{
		$connexion=false;
		/*test si l'utilisateur peut accèder à la page*/
		$titreFichier=$_SERVER['SCRIPT_NAME'];
		$titreFichier=basename ( $titreFichier );
		if(!isDroitAccesPage($titreFichier)){
				header('location:home.php');
		}
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
		<link rel="stylesheet" href="../bootstrap-3.3.4-dist/css/bootstrap.min.css">
		<link href="../bootstrap-3.3.4-dist/css/bootstrap2.css" rel="stylesheet" media="screen">
		<link href="css/custom.css" rel="stylesheet">
		 <meta charset="utf-8">
		  <script src="../bootstrap-3.3.4-dist/js/jquery.js"></script>
		  <script type="text/javascript" src="../bootstrap-3.3.4-dist/js/bootstrap.js"></script>
		  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		  <script type="text/javascript" src="http://code.jquery.com/jquery-1.5.1.min.js"></script>
		  <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.ui/1.8.10/jquery-ui.js"></script>
  
	</head>
	<body>
		<header>
		<nav class="navbar navbar-default">
				<div class="container-fluid">	
				<a href="home.php"><img src="includes/logoEcoVoiture.jpg" alt="logo Eco Voiture" style="height:150px; width:20%;"/></a>
				<img src="includes/banniereEcoVoiture.jpg" alt="banniereEcoVoiture"style="height:150px; width:50%;"/>		
				<?php if($GLOBALS['connexion']==false){ ?>
				<div class="nav navbar-right " >
				
				Se connecter: </br>
				<form action="verificationCompte.php" method="POST" style="margin-bottom: 0px;">
				 Identifiant	:
				 <input type="text" name="login"> <br/>
				Mot de passe :
				 <input type="password" name="password"> <br/>
				 <input class="btn btn-default" type="submit" value="Connexion" >
				 
				</form>
				<a href="inscription.php?">Pas encore inscrit?</a>
				</div></div>
				<?php }			
				else{?>
					Bienvenue <?php echo $GLOBALS['nom'];?>
					<input class="btn btn-default" type="button" onclick="location.href='mesAnnonces.php'" value='Mes annonces'></input>
					<input class="btn btn-default" type="button" onclick="location.href='monProfil.php'" value='Mon profil'></input>
					<input class="btn btn-default" type="button" onclick="location.href='mesReservations.php'" value='Mes reservations'></input>
					<input class="btn btn-default" type="button" onClick="location.href='seDeconnecter.php'" value='Se deconnecter'></input>
				<?php } ?>
				<?php } ?>
			
				
		</header>
<?php  

function footer(){ ?>
<center>
<div class="footer">
<a href="a_propos.php">A propos d'Ecovoiture</a> | <a href="faq.php">Foire aux questions</a> | <a href="conditions_generales.php">Conditions générales d'utilisation</a> | <a href="contact_admin.php">Nous contacter</a>	
</div>
</center>
	</body>
	</html>	
<?php } ?>



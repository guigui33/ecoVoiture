<?php
/*
ajouter fichier require_once(entete_footer.php) dans les fichiers.
pour appeler l'entete faite au debut du fichier entete($titre);
$titre=nom de la page 
puis a la fin du fichier faite footer();
la page permet de continuer sur une session démarrée
*/
include('droit_acces_page.php');

session_start();
	$connexion;//permet de définir la page en fonction de l'etat(connecté ou non) de l'utilisateur
	if(!isset($_SESSION['logged']) || !$_SESSION['logged'])//si l'utilisateur n'est pas connecté
	{
		$connexion=false;
		/*test si l'utilisateur peut accèder à la page*/
		$titreFichier=$_SERVER['SCRIPT_NAME'];
		$titreFichier=basename ( $titreFichier );//recupère que le nom du fichier
		
		/* Si l'utilisateur n'est pas authentifié */
		if(!isDroitAccesPage($titreFichier)){
				/* Il sera redirigé vers la page "home.php" */
				header('location:home.php');
		}
	}
	/*Sinon on lui conserve son nom et prenom dans les variables de session */
	else {
		$connexion=true;
		$nom=$_SESSION['nom'];
		$prenom=$_SESSION['prenom'];
		}			
		
/* Création de l'entète des pages */
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
		<!-- Création de la banière du site -->
		<header>
		<nav class="navbar navbar-default">
				<div class="container-fluid">	
				<center><a href="home.php"><img style="margin-bottom: 5px;" src="includes/banniere_finale.png" alt="banniereEcoVoiture"/></a></center>
				<?php if($GLOBALS['connexion']==false){ ?>
				<center>Connectez vous pour profiter pleinement d'EcoVoiture <a href="inscription.php?">(Pas encore inscrit?)</a></center>
				<form action="verificationCompte.php" method="POST" style="margin-bottom: 0px;">
				<center>
				
				 <input type="text" name="login" placeholder="Identifiant" style="margin-bottom: 0px; margin-top: 6px;">
				 <input type="password" name="password" placeholder="Mot de passe"style="margin-bottom: 0px; margin-top: 6px;">
				 <input class="btn btn-default" type="submit" value="Connexion" >
				 </center>
				</form>
				</div>
				<?php }			
				else{?>
					<!-- Les 4 menus accessibles uniquement si l'utilisateur est authentifié -->
					<center>Bienvenue <?php echo $GLOBALS['prenom'];?>, bonne visite sur EcoVoiture !</center>
					<center><input class="btn btn-default" type="button" onclick="location.href='mes_annonces.php'" value='Mes annonces'></input>
					<input class="btn btn-default" type="button" onclick="location.href='profil_utilisateur.php?idprofil=<?php echo $_SESSION['iduser']?>'" value='Mon profil'></input>
					<input class="btn btn-default" type="button" onclick="location.href='mes_reservations.php'" value='Mes reservations'></input>
					<input class="btn btn-default" type="button" onClick="location.href='seDeconnecter.php'" value='Se deconnecter'></input></center><br>
				<?php } ?>
				<?php } ?>
				
			</nav>				
		</header>
	<?php  

	/* Création du footer des pages */
	function footer(){ ?>
	<center>
		<hr />
		<!-- Les 4 liens du footers pour rediriger sur 4 pages -->
		<div class="footer">
			<a href="a_propos.php">A propos d'Ecovoiture</a> | <a href="faq.php">Foire aux questions</a> | <a href="conditions_generales.php">Conditions générales d'utilisation</a> | <a href="contact_admin.php">Nous contacter</a>	
		</div>
	</center>
	</body>
	</html>	
	<?php } ?>



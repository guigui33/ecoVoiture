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
		<link rel="stylesheet" href="../bootstrap-3.3.4-dist/css/bootstrap.min.css">
		<link href="../bootstrap-3.3.4-dist/css/bootstrap2.css" rel="stylesheet" media="screen">
		<link href="css/custom.css" rel="stylesheet">
		 <meta charset="utf-8">
  <script src="../bootstrap-3.3.4-dist/js/jquery.js"></script>
  <script type="text/javascript" src="../bootstrap-3.3.4-dist/js/bootstrap.js"></script>
  <link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  
	</head>
	<body>
		<header>
			<nav class="navbar navbar-default">
				<div class="container-fluid">	
				<img src="logoEcoVoiture.jpg" alt="logo Eco Voiture" style="height:150px; width:150px;"/>
				<img src="banniereEcoVoiture.jpg" alt="banniereEcoVoiture"style="height:150px; width:650px;" />
			
				<?php if($GLOBALS['connexion']==false){ ?>
				<div class="nav navbar-nav navbar-right" >
				
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
					<input class="btn btn-default" type="button" onclick="href='mesAnnonces.php'">Mes annonces</input>
					<input class="btn btn-default" type="button" onclick="href='monProfil.php'">Mon profil</input>
					<input class="btn btn-default" type="button" onclick="href='mesReservations.php'">Mes reservations</input>
					<input class="btn btn-default" type="button" onclick="href='seDeconnecter.php'">Se deconnecter</input>
				<?php } ?>
				
		</header>
<?php } 

function footer(){ ?>
<footer>
	<center>
	<br><a href="apropos.php">A propos d'EcoVoiture</a> | <a href="FAQ.php">Foire aux questions</a> | <a href="Condition.php">Condition géneral d'utilisation</a> | <a href="Nouscontacter.php">Nous contacter</a>	
	</center>
</footer>
	</body>
	</html>	
<?php } ?>



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
		
		<div class="box">
		  <div id="logo"><img src="includes/logoEcoVoiture.jpg" alt="logo Eco Voiture" style="height:150px; width:250px;"/></div>
		  <div id="banniere"><img src="banniereEcoVoiture.jpg" alt="banniereEcoVoiture"style="height:150px; width:650px;" /></div>
		  <div id="menu_header">trois</div>
		</div>
		
		
		
		
		
			
				
		</header>
<?php } 

function footer(){ ?>
<center>
<div class="footer">
<br><a href="apropos.php">A propos d'EcoVoiture</a> | <a href="faq.php">Foire aux questions</a> | <a href="Conditions.php">Conditions générales d'utilisation</a> | <a href="Nouscontacter.php">Nous contacter</a>	
</div>
</center>

<!-- <footer>
	<center>
	<br><a href="apropos.php">A propos d'EcoVoiture</a> | <a href="FAQ.php">Foire aux questions</a> | <a href="Condition.php">Condition géneral d'utilisation</a> | <a href="Nouscontacter.php">Nous contacter</a>	
	</center>
</footer>
	</body>
	</html>	-->
<?php } ?>



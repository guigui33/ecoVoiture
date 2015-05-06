<?php
$titre=isset($_GET['titre'])?$_GET['titre']:'';
session_start();
	if(!isset($_SESSION['logged']) || !$_SESSION['logged']){
		$connexion=false;
	}
	else {
		$connexion=true;
		$nom=$_SESSION['nom'];
		}

echo coucou;
	
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title><?php echo $titre; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
	<header>
		<div style="">
			<img src="logoEcoVoiture.jpg" alt="logo Eco Voiture" width="600px" height="100px" style="border:45px black;"/>
			<img src="banniereEcoVoiture.jpg" alt="banniereEcoVoiture" width="600px" height="100px" style="border:45px black;"/>
		</div>
		<div>
			<?php if($connexion==false){?>
			Se connecter: </br>
			<form action="verificationCompte.php" method="POST">
			 Identifiant	Mot de passe <br/>
			 <input type="login" name="login"> <br/>
			 <input type="password" name="password"> <br/>
			 <input type="submit" value="Connexion">
			</form>
			<a href="inscription.php?titre=inscription">Pas encore inscrit?</a>
			<?php }			
			else{?>
				Bienvenue <?php echo $nom;?>
				<button type="button" onclick="href='mesAnnonces.php'">Mes annonces</button>
				<button type="button" onclick="href='monProfil.php'">Mon profil</button>
				<button type="button" onclick="href='mesReservations.php'">Mes reservations</button>
				<button type="button" onclick="href='seDeconnecter.php'">Se deconnecter</button>
			<?php } ?>
			</div>
	</header>




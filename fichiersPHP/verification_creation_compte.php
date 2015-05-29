<!-- 
Fichier Appelant : entete_footer.php

Fichier Appelé : entete_footer.php, connexion.php, redirection vers si http://ecovoiture.alwaysdata.net/fichiersPHP/home.php';

Role : Verifie les valeurs et données rentré lors de l'inscription. Redirection vers si http://ecovoiture.alwaysdata.net/fichiersPHP/home.php'; Sinon renvoie l'erreur pour laquelle l'ajout n'as pas pu etre possible

-->

<?php
require('connexion.php');

//verification des informations donnés par le client avant de les inclurent dans la BD


$email=isset($_POST['email'])?$_POST['email']:'';
$login=isset($_POST['login'])?$_POST['login']:'';
$psswd=isset($_POST['psswd'])?$_POST['psswd']:'';
$psswdBis=isset($_POST['psswdBis'])?$_POST['psswdBis']:'';
$nom=isset($_POST['nom'])?$_POST['nom']:'';
$telephone=isset($_POST['telephone'])?$_POST['telephone']:'';
$prenom=isset($_POST['prenom'])?$_POST['prenom']:'';
$date=isset($_POST['date'])?$_POST['date']:'';
$adresse=isset($_POST['adresse'])?$_POST['adresse']:'';
$codePostal=isset($_POST['codePostal'])?$_POST['codePostal']:'';
$ville=isset($_POST['ville'])?$_POST['ville']:'';

if($email=='' && $login=='' && $passwd=='' && $passwdBis=='' && $nom=='' && $prenom=='' && $date=='' && $ville=='' && $codePostal='' && $adresse=''){
		exit;
	}


$query=pg_query($connexion,"SELECT idlieu FROM Lieux WHERE LOWER (ville) LIKE  LOWER ('$ville') ");
				
				if(pg_num_rows($query) === 0){
					
					echo("La ville est incorrecte. (Il se peut qu'elle ne soit pas dans la base de données. Si c'est le cas, veuillez faire une requête à l'administrateur)");
					header('location:inscription.php');
					exit;
				}while ($row = pg_fetch_assoc($query)) {
							$IdLieu=$row['idlieu'];
							}
				$result = pg_query($connexion,"INSERT INTO utilisateurs (mail, login, motdepasse, nom, prenom, telephone, datenaissance, apropos, urlimage, idresidence) VALUES ('$email','$login','$psswd','$nom','$prenom','$telephone','$date','NULL','NULL','$IdLieu');");
				pg_close($connexion);
				if ($result)
					?>
					<script>
						alert("Votre compte a bien été créé");
						document.location.href = 'http://ecovoiture.alwaysdata.net/fichiersPHP/home.php';
					</script>
				<?
					echo "";
				?>
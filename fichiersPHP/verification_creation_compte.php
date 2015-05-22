<?php
require('connexion.php');

/*verification des informations donnés par le client avant de les inclurent dans la BD*//*
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


if($email=='' || $login=='' || $passwd=='' || $passwdBis=='' || $nom=='' || $prenom=='' || $date=='' || $ville==''){
		header('location:inscription.php?error=1');//si erreur on retourne error=1
	}*/
if($passwdBis!=$passwd){
	header('location:inscription.php?error=2');//si erreur on retourne error=1
	}
	
pg_query($connexion,"INSERT INTO login VALUES ('$Mail','$login','$passwd','$nom','$prenom'$telephone','$date');");//insert value dans table login

pg_close($connexion);

?>

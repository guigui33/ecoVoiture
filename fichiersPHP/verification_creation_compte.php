<?php
/*verification des informations donnés par le client avant de les inclurent dans la BD*/
$email=isset($_POST['email'])?$_POST['email']:'';
$login=isset($_POST['login'])?$_POST['login']:'';
$psswd=isset($_POST['psswd'])?$_POST['psswd']:'';
$psswd=isset($_POST['psswdBis'])?$_POST['psswdBis']:'';
$nom=isset($_POST['nom'])?$_POST['nom']:'';
$telephone=isset($_POST['telephone'])?$_POST['telephone']:'';
$prenom=isset($_POST['prenom'])?$_POST['prenom']:'';
$date=isset($_POST['date'])?$_POST['date']:'';
$adresse=isset($_POST['adresse'])?$_POST['adresse']:'';
$codePostal=isset($_POST['codePostal'])?$_POST['codePostal']:'';
$ville=isset($_POST['ville'])?$_POST['ville']:'';

$connexion=pg_connect("host=localhost dbname=exoPHP user=postgres password=postgres") or die('connexion impossible.');
pg_query($connexion,'INSERT INTO login VALUES ("$Login,$Mail,")');//insert value dans table login
pg_close($connexion);
?>
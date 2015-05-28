<?php

// Définitions de constantes pour la connexion à Postgre
$hote="postgresql1.alwaysdata.com";
$port="5432";
$dbname="ecovoiture_ecovoiture";
$user="ecovoiture";
$password="ecovoiturestri";

//connexion a la base de données
$connexion=pg_connect("host=".$hote." port=".$port." dbname=".$dbname." user=".$user." password=".$password."");

if(!$connexion){
	exit("Impossible de se connecter ˆ la base de donnŽes Postgres");}

?>
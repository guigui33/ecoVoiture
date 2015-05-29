<!-- 
Fichier Appelant : Tous les fichiers ayant besoin d'une connexion avec la base de données.

Fichier Appelé : 

Role :Effectuer la connexion a la base de données PostgreSql. 

-->


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
	exit("Impossible de se connecter à la base de données Postgres");}

?>
<?php

// D�finitions de constantes pour la connexion � Postgre
$hote="postgresql1.alwaysdata.com";
$port="5432";
$dbname="ecovoiture_ecovoiture";
$user="ecovoiture";
$password="ecovoiturestri";

//connexion a la base de donn�es
$connexion=pg_connect("host=".$hote." port=".$port." dbname=".$dbname." user=".$user." password=".$password."");

if(!$connexion){
	exit("Impossible de se connecter � la base Postgres");}

?>
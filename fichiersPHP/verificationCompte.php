<?php
$login=isset($_POST['login'])?$_POST['login']:'';
$psswd=isset($_POST['password'])?$_POST['password']:'';
if($login=='' || $passwd=''){
		header('location:index.php?error=1');
	}
else {
	//connex on la base de donnée à remplacer
	//$connexion=pg_connect("host=localhost dbname=exoPHP user=postgres password=postgres") or die('connexion impossible.');
	$connexion=pg_connect("host=sql.free.fr port=5432 dbname=ecovoiture user=ecovoiture password=ecovoiturestri");
	

	
	$result=pg_query($connexion,'SELECT Login FROM Utilisateurs WHERE Login=\''.$login.'\'AND MotDePasse=\''.md5($passwd).'\'');	
	if(!$result){
		pg_close($connexion);
		header('location:index.php?error=2');
		}
	$tab=pg_fetch_array($result);
	$tab['login']=strtok($tab['login'],' ');//suppr les espaces
	if($tab['login']==$login){
		session_start();
		$_SESSION['logged']=true;
		$_SESSION['login']=$login;
		pg_close($connexion);
		header('location:accueil.php');
	}
	else {
		pg_close($connexion);
		header('location:accueil.php?error=2');
	}
		
	}
?>
<?php
$login=isset($_POST['login'])?$_POST['login']:'';
$passwd=isset($_POST['password'])?$_POST['password']:'';


if($login=='' || $passwd==''){
		header('location:home.php?error=1');
	}
else {

	require('connexion.php');
	
		$requete = ('SELECT login FROM utilisateurs WHERE login=\''.$login.'\' AND motdepasse=\''.$passwd.'\'');
		$result=pg_query($connexion, $requete);
		
		if(!$result){
			pg_close($connexion);
			header('location:home.php?error=2');
			echo "Erreur dans la requete";
			}
		$tab=pg_fetch_array($result);
		$tab['login']=strtok($tab['login'],' ');//suppr les espaces
		if($tab['login']==$login){
			session_start();
			$_SESSION['logged']=true;
			$_SESSION['login']=$login;
			
				//Recuperation du nom
				$requete = ('SELECT nom FROM utilisateurs WHERE login=\''.$login.'\'');
				$result=pg_query($connexion, $requete);
				$data = pg_fetch_array($result);
				$_SESSION['nom']=$data['nom'];
				
			pg_close($connexion);
			header('location:home.php');
		}
		else{
			pg_close($connexion);
			echo "Erreur combinaison login/mdp";
			header('location:home.php?error=2');
		}
			
		}
?>

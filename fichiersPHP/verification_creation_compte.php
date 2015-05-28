<?php
//require('connexion.php');

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
if($psswdBis!=$psswd){
?>
<script>
alert("Erreur mot de passe different"); 
 document.location.href = 'http://ecovoiture.alwaysdata.net/fichiersPHP/inscription.php';
 </script>
<?php 
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
				pg_query($connexion,"INSERT INTO utilisateurs (mail, login, motdepasse, nom, prenom, telephone, datenaissance, apropos, urlimage, idresidence) VALUES ('$email','$login','$psswd','$nom','$prenom','$telephone','$date','test','test','$IdLieu');");//insert value dans table login
				pg_close($connexion);
				header('location:home.php');
			
?>

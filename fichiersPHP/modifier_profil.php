<!--
appelé par le fichier modification_profil.php 
rôle: charger les nouvelles informations de l'utilisateur dans la base de donnée 
-->
<?php
require('connexion.php');
session_start();

//recuperation des infos à modifier
$iduser=$_SESSION['iduser'];

$newPsswd = NULL;

$email=isset($_POST['email'])?$_POST['email']:'';
$telephone=isset($_POST['telephone'])?$_POST['telephone']:'';
$nom=isset($_POST['nom'])?$_POST['nom']:'';
$prenom=isset($_POST['prenom'])?$_POST['prenom']:'';
$codePostal=isset($_POST['codePostal'])?$_POST['codePostal']:'';
$ville=isset($_POST['ville'])?$_POST['ville']:'';
$psswd=isset($_POST['psswd'])?$_POST['psswd']:'';

if (isset($_POST['demandeModifPsswsd']))
{
	$newPsswd = isset($_POST['newPsswd'])?$_POST['newPsswd']:'';
}

$psswd=isset($_POST['psswd'])?$_POST['psswd']:'';

//Verification mot de passe, sécurité modif
$requete=('SELECT motdepasse FROM utilisateurs WHERE iduser =\''.$iduser.'\'');
$result=pg_query($connexion, $requete);
if(!$result){
			pg_close($connexion);
			header('location:home.php?error=2');
			echo "Erreur dans la requete";
			}
$data = pg_fetch_array($result);
			$mdp_bdd=$data['motdepasse'];
			
			if($mdp_bdd==$psswd){
			
			//Recuperation idlieu
			$req_idresidence="SELECT idlieu FROM lieux WHERE codepostal='$codePostal' AND ville='$ville'";
			$result=pg_query($connexion, $req_idresidence);
			if(!$result){
								pg_close($connexion);
								?>
						<script>
							alert("Erreur : Erreur dans la requete");
							document.location.href = 'modification_profil.php';
						</script>
							<?php 
							echo "";
						}
			$data = pg_fetch_array($result);
			$idresidence=$data['idlieu'];
			
			if(!$idresidence){
					pg_close($connexion);
								?>
						<script>
							alert("Erreur : La ville ne correspond pas au code postal.");
							document.location.href = 'modification_profil.php';
						</script>
							<?php 
							echo "";
						}
			
				if($newPsswd!=NULL){
					$update="UPDATE utilisateurs SET mail='$email', telephone='$telephone', nom='$nom', prenom='$prenom', motdepasse='$newPsswd', idresidence='$idresidence' WHERE iduser=$iduser";	
				}
				else{
					$update="UPDATE utilisateurs SET mail='$email', telephone='$telephone', nom='$nom', prenom='$prenom', idresidence='$idresidence' WHERE iduser=$iduser";
				}
				$result=pg_query($connexion, $update);
			if(!$update){
								pg_close($connexion);
								?>
						<script>
							alert("Erreur : Erreur dans la requete d'update");
							document.location.href = 'modification_profil.php';
						</script>
							<?php 
							echo "";
						}
						
						pg_close($connexion);
								?>
						<script>
							alert("Modifications effectuées.");
							document.location.href = 'modification_profil.php';
						</script>
							<?php 
							echo "";		
				
			}
			else
			{
				?>
				<script>
					alert("Erreur sur le mot de passe actuel.");
					document.location.href = 'modification_profil.php';
				</script>
					<?php 
					echo "";
				}
?>

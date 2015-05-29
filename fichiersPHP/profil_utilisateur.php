<?php include('entete_footer.php'); 

require('connexion.php');
$iduser=$_GET["idprofil"];

$requete = ('SELECT login FROM utilisateurs WHERE iduser=\''.$iduser.'\'');
$result=pg_query($connexion, $requete);
if(!$result){
			pg_close($connexion);
			header('location:home.php?error=2');
			echo "Erreur dans la requete";
			}
			$data = pg_fetch_array($result);
			$login=$data['login'];

entete('Profil de '.$login);	

/*Recuperation des resultats
pour l'affichage*/

//Recuperation de la note moyenne
$requete = ('SELECT AVG(note) AS notemoyenneuser FROM noter WHERE idusernote=\''.$iduser.'\'');
$result=pg_query($connexion, $requete);
if(!$result){
			pg_close($connexion);
			header('location:home.php?error=2');
			echo "Erreur dans la requete";
			}
			$data = pg_fetch_array($result);
			$notemoyenne=$data['notemoyenneuser'];
			$notemoyenne = number_format($notemoyenne,1);

//Recuperation des préférences
$requete = ('SELECT idvoiture FROM voitures v, conduire c WHERE v.idvoiture=c.idvoiturepossedee AND c.idconducteur =\''.$iduser.'\'');
$result=pg_query($connexion, $requete);
if(!$result){
			pg_close($connexion);
			header('location:home.php?error=2');
			echo "Erreur dans la requete";
			}
$data = pg_fetch_array($result);
			if (!$data)
			{
				$preferences="Aucune preferences pour le moment";
			}
			else
			{
			
			$requete = ('SELECT fumeur, animaux, musique FROM voitures v, conduire c WHERE v.idvoiture=c.idvoiturepossedee AND c.idconducteur =\''.$iduser.'\'');
			$result=pg_query($connexion, $requete);
			if(!$result){
				pg_close($connexion);
				header('location:home.php?error=2');
				echo "Erreur dans la requete";
				}
				$data = pg_fetch_array($result);
				if ($data['fumeur']==='f')
					{
						$preferences = "interdit de fumer, ";
					}else
					{
						$preferences = "fumeurs autorisés, ";
					}
				if ($data['animaux']==='f')
					{
						$preferences .= "animaux interdits, ";
					}else
					{
						$preferences .= "animaux autorisés, ";
					}
				if ($data['musique']==='f')
					{
						$preferences .= "pas de musique pendant le trajet";
					}else
					{
						$preferences .= "musique pendant le trajet";
					}
			}
			
//Recuperation de la voiture préférée
$requete = ("SELECT modele, marque FROM voitures WHERE idvoiture = (SELECT COUNT(idvoiturepossedee) AS voiture FROM conduire WHERE idconducteur=".$iduser." ORDER BY voiture DESC)");

$result=pg_query($connexion, $requete);
if(!$result){
			pg_close($connexion);
			//header('location:home.php?error=2');
			echo "Erreur dans la requete";
			}
			$data = pg_fetch_array($result);
			$voiturepreferee = $data['marque'];
			$voiturepreferee .= " " . $data['modele'];




//Recuperation du a propos	
$requete = ('SELECT apropos FROM utilisateurs WHERE iduser=\''.$iduser.'\'');
$result=pg_query($connexion, $requete);

if(!$result){
			pg_close($connexion);
			header('location:home.php?error=2');
			echo "Erreur dans la requete";
			}
			$data = pg_fetch_array($result);
			$apropos=$data['apropos'];
			if ($apropos==NULL){
				$apropos="Aucun renseignements à propos de $login";
				}
			
			
//Recuperation avis en tant que conducteur
$requete = ('SELECT login, note, commentaire FROM noter n, utilisateurs u WHERE u.iduser=n.idusernotant AND idusernote IN (SELECT idchauffeur FROM proposer WHERE idchauffeur=\''.$iduser.'\')');
$avis_conducteur=pg_query($connexion, $requete);

if(!$avis_conducteur){
			pg_close($connexion);
			//header('location:home.php?error=2');
			echo "Erreur dans la requete";
			}

//Recuperation avis en tant que passager
$requete = ('SELECT login, note, commentaire FROM noter n, utilisateurs u WHERE u.iduser=n.idusernotant AND idusernote IN (SELECT iduserclient FROM reserver WHERE iduserclient=\''.$iduser.'\')');
$avis_passager=pg_query($connexion, $requete);

if(!$avis_passager){
			pg_close($connexion);
			//header('location:home.php?error=2');
			echo "Erreur dans la requete";
			}

			//FERMETURE CONNEXION
			pg_close($connexion);
?>

<h2 class="alerte alert-info" align="center"> 

Profil de l'utilisateur 

		<?php echo $login; if($login === $_SESSION['login']){?>
		<a href="modification_profil.php"><img style="margin-left: 15px; height:30px; width:30px;" src="includes/crayon.png" alt="Modifier votre profil"/></a>
		<?php }
		?> 
</h2>

<legend> Mes informations</legend>


Evaluation moyenne du conducteur : <?php if($notemoyenne==0.0){echo "Aucune note pour le moment";}else {echo $notemoyenne."/5";}?>
<br><br>
Préférences pendant un trajet : <?php echo $preferences;?>
<br><br>
Ma voiture préférée : <?php echo $voiturepreferee; ?>
<br><br>

<legend> A propos de moi</legend>
<?php echo $apropos;?>
<br><br>


<legend> Mes avis</legend>
<TABLE BORDER WIDTH="100%">
	<TR>
	<TD>Mes avis conducteur</TD><TD>Mes avis passager</TD>
	</TR>
	<TR>
	<TD>
		<?php 	
			$row=pg_fetch_array($avis_conducteur); 
			if (!$row)
				echo "<center><br>Aucun avis pour le moment<br><br></center>"; 
			else 
				do{
					echo "<br>". $row['login']. " : ".$row['commentaire']." (".$row['note']."/5)<br>";
				} while($row = pg_fetch_array($avis_conducteur));
		?>
	</TD>
	<TD>
		<?php 	
			$row=pg_fetch_array($avis_passager); 
			if (!$row)
				echo "<center><br>Aucun avis pour le moment<br><br></center>"; 
			else 
				do{
					echo "<br>". $row['login']. " : ".$row['commentaire']." (".$row['note']."/5)<br>";
				} while($row = pg_fetch_array($avis_passager));
		?>
	</TD>
	</TR>
</TABLE>
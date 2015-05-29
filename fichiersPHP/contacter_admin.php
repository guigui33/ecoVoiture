<?PHP
$mail = 'cerberus31@live.fr'; // Déclaration de l'adresse de destination.
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}
//Recupération des premières données
$message_initial=isset($_POST['message'])?$_POST['message']:'';
$email=isset($_POST['email'])?$_POST['email']:'';
$nom = strtok($email, "@");
$telephone=isset($_POST['telephone'])?$_POST['telephone']:'';

//Définition de l'objet
$objet="Objet du contact : ";
$objet.=isset($_POST['objet'])?$_POST['objet']:'';

//Déclaration des messages au format HTML.
$message_html = "<html><head>$objet</head><br><br><body>$message_initial<br><br>-------------------------------------------<br>$email<br>$telephone</body></html>";
 
//réation de la boundary
$boundary = "-----=".md5(rand());
 
//Définition du sujet
$sujet="Question sur : ";
$sujet.=isset($_POST['sujet'])?$_POST['sujet']:'';
  
//Création du header de l'e-mail.
$header = "From: \"$nom\"<$email>".$passage_ligne;
$header.= "Reply-to: \"$nom\" <$email>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

//Création du message
$message = $passage_ligne."--".$boundary.$passage_ligne;

//Ajout du message au format HTML
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;

$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
 
//Envoi de l'e-mail.
$result = mail("cerberus31@live.fr",$sujet,$message,$header);

if ($result)
?>
<!-- Affichage d'un message de confirmation dans une pop-up -->
<script>
	alert("Votre message a bien été transmis. Il sera traité dans les plus brefs délais");
	document.location.href = 'http://ecovoiture.alwaysdata.net/fichiersPHP/home.php';
</script>
	<?
		echo "";
	?>
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
//=====Déclaration des messages au format texte et au format HTML.
$message_initial=isset($_POST['message'])?$_POST['message']:'';
$email=isset($_POST['email'])?$_POST['email']:'';
$nom = strtok($email, "@");
$telephone=isset($_POST['telephone'])?$_POST['telephone']:'';
$message_html = "<html><head></head><body>$message_initial <br><br> $email <br> $telephone </body></html>";
 
//=====Création de la boundary
$boundary = "-----=".md5(rand());
 
//=====Définition du sujet.
$sujet=isset($_POST['objet'])?$_POST['objet']:'';
 
//=====Création du header de l'e-mail.
$header = "From: \"$nom\"<$email>".$passage_ligne;
$header.= "Reply-to: \"$nom\" <$email>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;

//=====Ajout du message au format HTML
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;

$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
 
//Envoi de l'e-mail.
mail("cerberus31@live.fr",$sujet,$message,$header);

header('location:contact_admin.php');
?>
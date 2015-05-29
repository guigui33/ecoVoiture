<!-- Suppresion des variables de session de l'utilisateur -->
<?php
session_start();
session_unset();
session_destroy();
header('location:home.php'); // Redirection à la page "home.php"
?>

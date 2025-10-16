


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Logout</h1>
    <p>Vous avez été déconnecté avec succès.</p>
    <a href="index.php">Retour à la page d'accueil</a>
</body>
</html>

<?php
// Démarrer la session
session_start();
// Détruire toutes les variables de session
$_SESSION = array();
// Détruire la session
session_destroy();
// Rediriger vers la page d'accueil ou de connexion
header("Location: index.php");
exit();
?>
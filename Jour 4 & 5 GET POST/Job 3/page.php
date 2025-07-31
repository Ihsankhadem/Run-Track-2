


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="POST" action="page.php">
        <input type="text" name="prenom" placeholder="Entrez votre prénom"><br><br>
        <input type="text" name="nom" placeholder="Entrez votre nom"><br><br>
        <input type="submit" value="Envoyer">
    </form>

</body>

</html>

<?php

// POST = pour envoyer des données (formulaire) sans les afficher dans l’URL.
 echo "Le nombre de POST est  de : " . count($_POST);

?>
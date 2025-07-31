<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="get" action="page.php">
        <input type="text" name="nom">
        <input type="submit" value="Envoyer">
    </form>

</body>

</html>

<?php
echo $_GET["nom"];
?>








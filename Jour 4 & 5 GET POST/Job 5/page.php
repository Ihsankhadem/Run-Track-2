<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="POST" action="page.php">
        <input type="text" name="username" placeholder="username"><br><br>
        <input type="text" name="password" placeholder="password"><br><br>
        <input type="submit" value="VALIDER">
    </form>

</body>

</html>

<?php

$prenom = "John";
$nom = "Rambo";

    if ($prenom == $_POST["username"] && $nom == $_POST["password"]){
        echo "CODE BON";
        }
    else {
        echo "LOUPER";
    }

?>
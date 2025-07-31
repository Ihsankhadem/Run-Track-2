

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="GET" action="page.php">
        <input type="text" name="Nombre" placeholder="nombre"><br><br>
        <input type="submit" value="VALIDER">
    </form>

</body>

</html>

<?php

$nombre = $_GET["Nombre"] ?? "null";

    if ($nombre%2 == 0){
        echo "PAIR";
        }
    else {
        echo "IMPAIR";
    }

?>
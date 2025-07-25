
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="GET" action="page.php">
        <input type="text" name="Hauteur" placeholder="Hauteur"><br><br>
        <input type="text" name="Largeur" placeholder="Largeur"><br><br>
        <input type="submit" value="VALIDER">
    </form>

</body>

</html>

<?php

$hauteur = $_GET["Hauteur"] ?? "null";
$largeur = $_GET["Largeur"] ?? "null";
$tiret = "|&nbsp;";
$etoile = "*&nbsp;";



// Triangle

for ($i = 0; $i < $hauteur; $i++){
    echo str_repeat('&nbsp;',($hauteur-$i)); 
    for($j = 0; $j <= $i; $j++){
        echo $etoile;
    }
        echo "<br>";
    }

// Rectangle

for ($ligne = 0; $ligne < $hauteur; $ligne++) {
    for ($colonne = 0; $colonne < $largeur; $colonne++) {
        echo $tiret;
    }
    echo "<br>";
}




?>









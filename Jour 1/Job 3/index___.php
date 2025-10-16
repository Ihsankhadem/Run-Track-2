
<?php

$myBool = True ;
$entier = 21 ; 
$str = "Ihsan";
$flottant = 20.04;


echo "<div style='text-align: center;'>TABLEAU TYPE </div>"; // titre centré

//<td> = table data = cellule normale
// <tr> = table row = une ligne du tableau
// <th> = table header = cellule d’en-tête

echo "<br><br>"; 

//echo "<table border='1' style='margin: 0 auto;'>"; // tableau centré

echo "<table border='1' style='margin: 0 auto; font-size: 18px; width: 55%; height: 145px;'>";

echo "<tr><th>Type</th><th>Nom</th><th>Valeur</th></tr>"; // noms des colonnes

// var_export() sert à afficher le contenu exact d'une variable, de manière lisible, et surtout en gardant le type.
echo "<tr><td>boolean</td><td>\$mybool</td><td>"   . var_export($myBool, True)  . "</td></tr>"; 
echo "<tr><td>integer</td><td>\$entier</td><td>" . $entier              . "</td></tr>";
echo "<tr><td>string</td><td>\$str</td><td>"  . $str                    . "</td></tr>";
echo "<tr><td>float</td><td>\$flottant</td><td>" . $flottant            . "</td></tr>";

echo "</table>";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>  </title>
    <style>
        body {
            background-color: #008080; 
            margin: 0;
            height: 100vh;

            color:rgb(224, 232, 231);
        }
    </style>
</head>
<body>

</body>
</html>

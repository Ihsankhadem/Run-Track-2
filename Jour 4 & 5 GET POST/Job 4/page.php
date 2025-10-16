

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST TABLEAU</title>
</head>

<body>

    <form method="POST" action="page.php">
        <input type="text" name="Prenom" placeholder="Entrez votre prénom"><br><br>
        <input type="text" name="Nom" placeholder="Entrez votre nom"><br><br>
        <input type="submit" value="Envoyer">
    </form>

</body>

</html>

<?php

$prenom = $_POST["Prenom"] ?? "null";
$nom = $_POST["Nom"] ?? "null";

echo "<br><br>";
echo "<table border= 1>";
echo "<thead><tr><th>Argument</th><th>Valeur</th></tr></thead>";
echo "<tr><td>prenom</td><td>$prenom</td></tr>"; // ligne 1
echo "<tr><td>nom</td><td>$nom</td></tr>";
echo "</table>";

?>
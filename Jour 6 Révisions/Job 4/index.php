


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<!-- <form method = "GET" action ="">
    <input type="text" name="prenom" placeholder = "PRENOM">
    <input type="text" name="nom" placeholder = "NOM">
    <input type="submit" value="Validation">
</form> -->

<!-- <form method = "post" action ="index.php">
    <input type="text" name="prenom" placeholder = "PRENOM">
    <input type="text" name="nom" placeholder = "NOM">
    <input type="submit" value="Validation">
</form> -->

<!-- <form method = "POST" action ="index.php">
    <input type="text" name="username" placeholder = "username">
    <input type="text" name="password" placeholder = "password">
    <input type="submit" value="Validation">
</form> -->

<form method = "GET" action ="index.php">
    <input type="text" name="nombre" placeholder = "write">
    <input type="submit" value="Validation">
</form>

<?php


// $prenom = $_POST["prenom"] ?? "null";
// $nom = $_POST["nom"] ?? "null";

// $name = "John";
// $mdp = "Rambo";

$nb = $_GET["nombre"] ?? "null";

//     if ($name == $_POST["username"] && $mdp == $_POST["password"]){
//         echo "Code Bon";
//     } else{
//         echo "LOUPER";
//     }


if ($nb %2 == 0){
    echo "$nb est pair";
} else {
    echo "$nb est impair";
}

// echo "<br><br>";
// echo "<table border=1>";
// echo "<thead><tr><th>Arguments</th><th>Valeur</th></tr></thead>";
// echo "<tr><td>prenom</td><td>$prenom</td></tr>"; // ligne 1
// echo "<tr><td>nom</td><td>$nom</td></tr>"; // ligne 2
// echo "</table>";


/*
echo $_GET["prenom"]. " " .$_GET["nom"];
*/

//  echo "<br>Le nombre de POST est  de : " . count($_POST);


?>
</body>
</html>


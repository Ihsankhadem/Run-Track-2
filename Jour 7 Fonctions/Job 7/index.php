



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form method = "POST">
  <input type="text" name="str" placeholder="écris la phrase">
  <select name="choix">
    <option value="gras">Gras</option>
    <option value="cesar">César</option>
    <option value="plateforme">Plateforme</option>
  </select>
  <button type="submit">Transformer</button>
</form>

</form>



</body>
</html>




<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $text = $_POST["str"];      //  stock le texte fourni par le user
    $choix = $_POST["choix"]; // stock choix menu déroulant
}


// applique le choix du user
if ($choix == "gras"){
    echo gras($text);
} elseif ($choix === "cesar") {
    echo cesar($text);
} elseif ($choix === "plateforme") {
    echo plateforme($text);
}

function gras($str) {
    $mots = explode(" ", $str); // découpe la phrase en mots, en utilisant l’espace " " comme séparateur
    foreach ($mots as &$mot) {
        if ($mot !== "" && $mot[0] >= 'A' && $mot[0] <= 'Z') {
            $mot = "<b>$mot</b>";
        }
    }
    return implode(" ", $mots); // regroupe les mots
}


//////// A REVOIR /////////////////////////////////////////////

// function cesar($str, $decalage = 2) {
//     $resultat = "";

//     for ($i = 0; $i < strlen($str); $i++) {
//         $char = $str[$i];

//         if (ctype_alpha($char)) { // Vérifie si le caractère est une lettre (majuscule ou minuscule)
//             $base = ctype_upper($char) ? ord('A') : ord('a'); //  Détermine si la lettre est majuscule (A) ou minuscule (a)
//             $code = ord($char);    // Convertit la lettre en son code ASCII.

// // calcule la nouvelle lettre en décalant sa position dans l'alphabet tout en restant d
// // ans les 26 lettres, grâce au modulo 26, et en repartant de 'A' ou 'a'
//             $decale = (($code - $base + $decalage) % 26) + $base;  
//             $resultat .= chr($decale); // onvertit le code ASCII décalé en lettre avec chr()
//         } else {
//             $resultat .= $char;  
//         }
//     }

//     return $resultat;
// }

// SOLUTION 2


function caesar($input, $decalage)
{
$input = strtolower($input);
$array = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
$chaine_caesar = "";
for($i = 0; $i < strlen($input) ; $i++)
{
    $index = array_search($input[$i],$array);
    if($index + $decalage < 26)
    $chaine_caesar .= $array[$index + $decalage];
    else
    $chaine_caesar .= $array[($index + $decalage) % 26];
     
}
return strtoupper($chaine_caesar);
}



//////////////////////////////////////////////////////////////////

function plateforme($str){
    $mots = explode(" ", $str); // découpe la phrase en mots
    foreach ($mots as &$mot) {
        if (substr($mot, -2) == "me"){  // prend les 2 derniers caracteres
                echo "_";
        }
    }
    return implode(" ", $mots);
}

?>
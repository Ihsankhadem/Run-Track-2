

<?php

function leetSpeak($str){
    $converts = [
        "a" => "4",
        "b" => "8",
        "e" => "3",
        "g" => "6",
        "l" => "1",
        "s" => "5",
        "t" => "7"
    ];

    foreach ($converts as $letter => $replace){
// remplacer un ou plusieurs mots ou lettres dans une chaîne de caractères 
// sans tenir compte des majuscules ou minuscules (i signifie → insensitive).  
         $str = str_ireplace($letter, $replace, $str);
        } 
    return $str;

    }

echo leetSpeak("hello how are you my friend")


// str_ireplace($search, $replace, $subject);

// | Paramètre  | Rôle                                               |
// | ---------- | -------------------------------------------------- |
// | `$search`  = Ce que tu veux remplacer (lettre, mot, etc.)       |
// | `$replace` = Ce par quoi tu veux le remplacer                   |
// | `$subject` = Le texte dans lequel tu veux faire le remplacement |


?>
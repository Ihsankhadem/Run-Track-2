<?php

$str = "I'm sorry Dave I'm afraid I can't do that";
$longueur = 0;

while (isset($str[$longueur])){
    $longueur++;
}


for ($i=0; $i < $longueur; $i++) { 
    
    if ($str[$i] == 'a' || $str[$i] == 'e' || $str[$i] == 'i' || 
        $str[$i] == 'o' || $str[$i] == 'u' || $str[$i] == 'y'|| $str[$i] == 'I') {

        echo $str[$i];
    }

}

?>

<?php

 function calcul($a, $operation, $b){
    if ($operation == "+") {
            return $a + $b;
     } elseif ($operation == "%"){
            return $a % $b;
     }elseif ($operation == "-") {
        return $a - $b;
    } elseif ($operation == "*") {
        return $a * $b;
    }elseif ($operation == "/") {
        return $a / $b ;
    } else {
        return "Opération inconnue";
    }
 }
echo calcul(20, "%", 32);

?>
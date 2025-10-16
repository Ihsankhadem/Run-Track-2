
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Exo 3</title>
</head>
<body>


<?php

for ($i = 0; $i <= 100; $i++){
    
    if ($i == 42) {
      echo "La Plateforme_<br>";
} 

// Si le nombre est entre 0 et 20
    else if ($i >= 0 && $i <= 20) {
        echo "<i>$i</i><br>";
}

    else if ($i >= 25 && $i <= 50){
        echo "<u>$i</u><br>";
}

    else {
        echo $i . "<br>"; 
    }

}

?>

</body>
</html> 

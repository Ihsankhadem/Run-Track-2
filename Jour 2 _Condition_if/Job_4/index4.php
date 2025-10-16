
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Exo 3</title>
</head>
<body>


<?php

for($i= 0; $i <= 100; $i++){


    if ($i % 3 == 0 && $i % 5 == 0) {     
    echo "FizzBuzz<br>";
}

    else if ($i % 3 == 0) {      // un multiple de 3
    echo "Fizz<br>";
}

    else if ($i % 5 == 0) {     
    echo "Buzz<br>";
}

    else {     
    echo $i ."<br>";
}

}

?>

</body>
</html> 

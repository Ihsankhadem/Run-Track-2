


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Dico sûr</title>
</head>
<body>

<style>
  body {
    background-color: beige;
    font-size: 18px;         
  }

  h2 {
    text-align: center;     

  }

  table {
    margin: 40px auto;       
    text-align: center;
    width: 80%;           
  }

  th, td {
    padding: 20px;          
    border: 1px black;  
  }

  thead th {
    background-color: #e0d6b9; 
  }
</style>



<?php


$str ="On n'est pas le meilleur quand on le croit mais quand on le sait";
$dico = [
    "voyelles" => 0,
    "consonnes" => 0,
];
$longueur = 0;



while (isset($str[$longueur])){
    $longueur++;
}

for ($i=0; $i < $longueur; $i++) { 
      
    if ($str[$i] == 'a' || $str[$i] == 'e' || $str[$i] == 'i' || 
        $str[$i] == 'o' || $str[$i] == 'u' || $str[$i] == 'y') {

            $dico["voyelles"]++;
        } else {
            $dico["consonnes"]++;
        }
    }





echo "<h2>Dictionnaire</h2>";

echo "<br><br>";        
echo "<table border='1'>"; 
echo "<thead><tr><th>Voyelles</th><th>Consonnes</th></tr></thead>";
echo "<tr><th>". $dico["voyelles"] ."</th><th>" . $dico["consonnes"]. "</th></tr>";

echo "</table>";



// <tr>	table row = ligne du tableau
// <th>	table header = cellule d’en‑tête
// <td>	table data = cellule de données


?>

</body>
</html>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<style>
  body {
     background-color: #9faf0d9d; 
    font-size: 18px;         
  }


  table {
    margin: 30px auto;       
    text-align: center;
    width: 80%;           
  }

  th, td {
    padding: 20px;          
    border: 1px black;  
  }

  thead th {
    background-color: #bc8010ff; 
  }

  form {
  background: rgba(227, 88, 88, 0.72);
  padding: 1.5rem;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(52, 17, 17, 0.1);
}

input[type="text"],
select,
textarea {
  width: 50%;
  padding: 0.5rem;
  border-radius: 4px;
  font-size: 1rem;
}


</style>


<form post="GET" action="">
    <input type="text" name="Prenom" placeholder="Prénom">  <!-- placeholder = affiche le texte en gris ds l'url -->
    <input type="text" name="Nom" placeholder="Nom">
    <input type="submit" value="Envoyer">

</body>
</html>



<?php

// $_GET est un tableau associatif qui contient les paramètres passés dans l’URL après le ?

$prenom = $_GET["Prenom"] ?? "null";  // ?? = sert à tester si une variable est définie et n’est pas null.
$nom = $_GET["Nom"] ?? "null";



echo "<br><br>";
echo "<table border =1>"; 
echo "<thead><tr><th>Argument</th><th>Valeur</th></tr></thead>";
echo "<tr><td>prenom</td><td>$prenom</td></tr>"; // ligne 1
echo "<tr><td>nom</td><td>$nom</td></tr>"; // ligne 2
echo "</table>";

?>






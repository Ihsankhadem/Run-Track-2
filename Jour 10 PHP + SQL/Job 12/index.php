

<?php

try{

$pdo = new PDO("mysql:host=localhost; port=3307;dbname=jour09;charset=utf8","root","");

$stmt = $pdo->prepare("SELECT Prenom, Nom, Naissance FROM etudiants WHERE Naissance BETWEEN '1998-01-01' AND '2008-12-31'");
$stmt->execute();

} catch(PDOExeception $e){
    die("erreur : " .$e->getMessage());
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<style>
    table { border-collapse: collapse; width: 60%; margin: 20px auto; }
    th, td { border: 1px solid black; padding: 8px; text-align: center; }
    th { background-color: brown; }
</style>

<table>  
<thead>

<tr>
    <th>Prenom</th>
    <th>Nom</th>
    <th>Naissance</th>
</tr>
</thead>
<tbody>
 <?php while ($row= $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
<tr>
    <td><?= htmlspecialchars($row['Prenom']) ?></td>
    <td><?= htmlspecialchars($row['Nom']) ?></td>
    <td><?= htmlspecialchars($row['Naissance']) ?></td>
</tr>
    <?php endwhile; ?>
</tbody>
</table> 

</body>
</html>
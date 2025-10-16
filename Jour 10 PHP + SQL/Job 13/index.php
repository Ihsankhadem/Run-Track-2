



<?php

try{

$pdo = new PDO("mysql:host=localhost; port=3307;dbname=jour09;charset=utf8","root","");

$stmt = $pdo->prepare("SELECT salle.Nom AS NomSalle, etage.Nom AS NomEtage, salle.id AS salle_id, etage.id AS etage_id
FROM salle INNER JOIN etage ON salle.id_etage = etage.id");
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
    <th>ID Salle</th>
    <th>Nom Salle</th>
    <th> ID Etage</th>
    <th>Nom Etage</th>
</tr>
</thead>
<tbody>
 <?php while ($row= $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
<tr>
    <td><?= htmlspecialchars($row['salle_id']) ?></td>
    <td><?= htmlspecialchars($row['NomSalle']) ?></td>
    <td><?= htmlspecialchars($row['etage_id']) ?></td>
    <td><?= htmlspecialchars($row['NomEtage']) ?></td>
</tr>
    <?php endwhile; ?>
</tbody>
</table> 

</body>
</html>



<?php

try {
$pdo = new PDO("mysql:host=localhost;port=3307;dbname=jour09;charset=utf8", "root","");


$stmt = $pdo->prepare("SELECT Prenom, Nom, Naissance FROM etudiants WHERE TIMESTAMPDIFF(YEAR, Naissance , CURDATE()) < 18 ");
$stmt->execute();


}catch(PDOException $e){
    die("erreur :".$e->getMessage());
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
<?php while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
<tr>
    <td><?php echo htmlspecialchars($rows['Prenom']) ?></td>
    <td><?php echo htmlspecialchars($rows['Nom']) ?> </td>
    <td><?php echo htmlspecialchars($rows['Naissance']) ?></td> 
</tr>

<?php endwhile;?>
</tbody>
</table>


</body>
</html>
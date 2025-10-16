

<?php

try{

$pdo = new PDO("mysql:host=localhost; port=3307;dbname=jour09;charset=utf8","root","");

$stmt = $pdo->prepare("SELECT SUM(Superficie) AS TotalSuperficie FROM etage");
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
    <th>Total Superficie</th>
</tr>
</thead>
<tbody>
 <?php while ($row= $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
<tr>
    <td><?php echo htmlspecialchars ($row['TotalSuperficie']) ?></td>
</tr>
    <?php endwhile; ?>
</tbody>
</table> 

</body>
</html>
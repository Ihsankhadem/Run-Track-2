

<?php

try {
$pdo = new PDO("mysql:host=localhost;port=3307;dbname=jour09;charset=utf8", "root","");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $pdo->prepare("SELECT Prenom, Nom, Naissance, Sexe, Email FROM etudiants WHERE Prenom LIKE 'T%'");
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
    <th>Email</th>
    <th>Sexe</th>
</tr>
</thead>
<tbody>
<?php while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
<tr>
    <td><?php echo htmlspecialchars($rows['Prenom']) ?></td>
    <td><?php echo htmlspecialchars($rows['Nom']) ?> </td>
    <td><?php echo htmlspecialchars($rows['Naissance']) ?></td> 
    <td><?php echo htmlspecialchars($rows['Email']) ?></td>   
    <td><?php echo htmlspecialchars($rows['Sexe']) ?></td>
</tr>

<?php endwhile;?>
</tbody>
</table>


</body>
</html>
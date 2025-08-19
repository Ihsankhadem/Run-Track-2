
<?php 

try { // chemin d'acces a la DB
$pdo= new PDO("mysql:host=localhost;port=3307;dbname=jour09;charset=utf8", "root", "");

$stmt = $pdo->prepare("SELECT Nom, Capacite FROM salle");
$stmt->execute();

// message d'erreur
} catch(PDOException $e){
    die("ERREUR :" .$e->getMessage());
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO</title>
</head>
<body>
    
<style>
    table { border-collapse: collapse; width: 60%; margin: 20px auto; }
    th, td { border: 1px solid black; padding: 8px; text-align: center; }
    th { background-color: pink; }
</style>

<table>
<thead>
    <tr>
        <th>Nom</th>
        <th>Capacite</th>
     </tr>
    </thead>
    <tbody>
        <?php while($row= $stmt->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
        <td><?php echo htmlspecialchars($row['Nom']) ?> </td>
        <td><?php echo htmlspecialchars($row['Capacite']) ?> </td>
    </tr>

<?php endwhile;?>

</tbody>
</table>

</body>
</html>


<?php
// try {
//     mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
//     //  interagir avec une base MySQL en PHP, on utilise mysqli
//     $mysqli = new mysqli("localhost:3307", "root", "", "jour09"); //jour09 = nom bd
    
//     // Cela permet de ne pas continuer si la connexion échoue. die() arrête le script et affiche le message.
//     if ($mysqli->connect_error) {
//         die("Erreur de connexion : " . $mysqli->connect_error);
//     }
    
//     //  Écrire une requête SQL
//     $query = "SELECT * FROM etudiants";
    
//     // Exécuter la requête
//     $result = $mysqli->query($query);
// } catch (mysqli_sqi_exception $e) {
//     echo "Erreur : " . $e->getMessage();
// }



// <!DOCTYPE html>
// <html lang="en">
// <head>
//     <meta charset="UTF-8">
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//     <title>Document</title>
// </head>
// <body>
    
// <style>
//     table { border-collapse: collapse; width: 60%; margin: 20px auto; }
//     th, td { border: 1px solid black; padding: 8px; text-align: center; }
//     th { background-color: lightgray; }
// </style>

// <h1>AFFICHAGE TABLEAU ETUDIANT</h1>

//  <table>
//    <thead>
//      <tr>
//        <th>Prenom</th>
//        <th>Nom</th>
//        <th>Sexe</th>
//        <th>Naissance</th>
//        <th>Email</th>
//      </tr>
//    </thead>
//    <tbody>
//      <?php while($row = $result->fetch_assoc()) : 
//      <tr>
    //    <td><?php echo htmlspecialchars($row['Prenom']); </td>
    //    <td><?php echo htmlspecialchars($row['Nom']); </td>
    //    <td><?php echo htmlspecialchars($row['Sexe']); </td>
    //    <td><?php echo htmlspecialchars($row['Naissance']); </td>
    //    <td><?php echo htmlspecialchars($row['Email']); </td>
//      </tr>
//      <?php endwhile; 
//    </tbody>
//  </table>

// </body>
// </html>

try { // chemin d'acces a la DB
$pdo= new PDO("mysql:host=localhost;port=3307;dbname=jour09;charset=utf8", "root", "");

$stmt = $pdo->prepare('SELECT * FROM etudiants');
$stmt->execute();

// message d'erreur
} catch(PDOException $e){
    die("error : " .$e->getMessage());
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
      <th>Prenom</th>
       <th>Nom</th>
        <th>Sexe</th>
        <th>Naissance</th>
       <th>Email</th>
     </tr>
    </thead>
    <tbody>
         <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
    <td><?php echo htmlspecialchars($row['Prenom']) ?> </td>
    <td><?php echo htmlspecialchars($row['Nom']) ?> </td>  
    <td><?php echo htmlspecialchars($row['Sexe']) ?> </td>
    <td><?php echo htmlspecialchars($row['Naissance']) ?> </td>
    <td><?php echo htmlspecialchars($row['Email']) ?> </td>
    </tr>

<?php endwhile; ?>

</tbody>
</table>

</body>
</html>

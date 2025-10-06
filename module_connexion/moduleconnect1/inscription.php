

<?php
require_once 'config.php';

$cnx = moduleCNX::getInstance();
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $login = trim($_POST['login'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $nom = trim($_POST['nom'] ?? '');

    $result = $cnx->register($login, $password, $prenom, $nom);

    if ($result === true) {
        // inscription OK -> stocker session et rediriger
        $_SESSION['user'] = [
            'login' => $cnx->getLogin(),
            'prenom' => $cnx->getPrenom(),
            'nom' => $cnx->getNom()
        ];
        header("Location: connect.php");
        exit;
    } else {
        $errors[] = $result; 
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Inscription - ManguOrange</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Inscription</h1>

    <?php if (!empty($errors)): ?>
        <div class="errors">
            <?php foreach ($errors as $err): ?>
                <p><?= htmlspecialchars($err) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="">
        <input type="text" name="login" placeholder="Login" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <input type="text" name="prenom" placeholder="Prénom" required>
        <input type="text" name="nom" placeholder="Nom" required>
        <button type="submit" name="register">S'inscrire</button>
    </form>

    <p>Déjà un compte ? <a href="connect.php">Connectez-vous ici</a></p>
</div>
</body>
</html>


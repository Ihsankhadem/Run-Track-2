
<?php
require_once 'config.php';

$cnx = moduleCNX::getInstance();
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($cnx->connect($login, $password)) {
        $_SESSION['user'] = [
            'login' => $cnx->getLogin(),
            'prenom' => $cnx->getPrenom(),
            'nom' => $cnx->getNom()
        ];
        header("Location: index.php");
        exit;
    } else {
        $errors[] = "Login ou mot de passe incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Connexion - ManguOrange</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Connexion</h1>

    <?php if (!empty($errors)): ?>
        <div class="errors">
            <?php foreach ($errors as $err) echo "<p>" . htmlspecialchars($err) . "</p>"; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="">
        <input type="text" name="login" placeholder="Login" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>
    </form>

    <p>Pas encore de compte ? <a href="inscription.php">Inscrivez-vous ici</a></p>
</div>
</body>
</html>

<?php
session_start();
require_once '../includes/config.php';
$cnx = livreor::getInstance();
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $result = $cnx->connect($login, $password);

    if ($result === true) {
        $_SESSION['user'] = [
            'id' => $cnx->getId(),
            'login' => $cnx->getLogin(),
            'email' => $cnx->getEmail(),
        ];
        header('Location: home.php');
        exit();
    } else {
        $errors[] = $result;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Connexion - Livre d'or de Lyon</title>
<link rel="stylesheet" href="../css/style1.css">
</head>
<body>

<main class="auth-container">
    <form method="POST" action="connect.php" class="profile-form">
        <h2>Se connecter</h2>

        <?php if (!empty($errors)): ?>
            <div class="errors">
                <?php foreach($errors as $error): ?>
                    <p><?= htmlspecialchars($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <label for="login">Nom d'utilisateur</label>
        <input type="text" id="login" name="login" required>

        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Se connecter" class="btn">
        <p class="back-link">Pas encore de compte ? <a href="register.php">Inscrivez-vous ici</a></p>
        <p class="back-link"><a href="index.php">Retour à l'accueil</a></p>
    </form>
</main>

</body>
</html>

<?php 
require_once 'config.php';
$mc = moduleconnect::getInstance();
$errors = [];  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');  
    $password = trim($_POST['password'] ?? '');
    $result = $mc->connect($username, $password);

    if ($result === true) {
        $_SESSION['user'] = [
            'username' => $mc->getUsername(),
            'email' => $mc->getEmail()
        ];
        header("Location: index.php");
        exit;
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
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="form-container">
        <h2>🔐 Connexion</h2>

        <?php if (!empty($errors)): ?>
            <div class="error">
                <?php foreach ($errors as $error) echo htmlspecialchars($error) . "<br>"; ?>
            </div>
        <?php endif; ?>

        <form action="connect.php" method="post">
            <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit">Se connecter</button>
        </form>

        <a class="return-link" href="register.php">Créer un compte</a>
        <a class="return-link" href="index.php">Retour à l’accueil</a>
    </div>

</body>
</html>

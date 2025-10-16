
<?php
session_start();
require_once '../includes/config.php';
$cnx = livreor::getInstance();
// si le user est connecté
$isConnected = isset($_SESSION['user']);
$success = $error = '';

// verifie si envoyé avc la methode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Récupération et nettoyage des données du formulaire
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name && $email && $message) {
        try {
            // Si la table "contacts" n'existe pas, ce bloc sera ignoré sans planter
            $stmt = $cnx->getConnexion()->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $message]);
        } catch (Exception $e) {
            // afficher quand même le succès
        }
        $success = "Merci pour votre message, nous vous répondrons bientôt !";
    } else {
        $error = "Veuillez remplir tous les champs.";
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Livre d’or de Lyon</title>
    <link rel="stylesheet" href="../css/style1.css">
</head>
<body>

<header class="main-header">
    <h1>Le Livre d’or de la Ville de Lyon</h1>
    <nav>
        <?php require_once '../includes/users_acess.php'; ?>
    </nav>
</header>

<main class="contact-content">
    <section class="contact-form-section">
        <h2>
            <?php if ($isConnected): ?>
                Bonjour <?= htmlspecialchars($_SESSION['user']['login']) ?> 
                <br>Contactez l’équipe du Livre d’Or
            <?php else: ?>
                Contactez-nous
            <?php endif; ?>
        </h2>
<!-- afficher le succes de l'envoie -->
        <?php if ($success): ?>
            <p class="success"><?= htmlspecialchars($success) ?></p>
        <?php elseif ($error): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form method="POST" action="contact.php" class="contact-form">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name"
                value="<?= $isConnected ? htmlspecialchars($_SESSION['user']['login']) : '' ?>"
                <?= $isConnected ? 'readonly' : 'required' ?>>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email"
                value="<?= $isConnected ? htmlspecialchars($_SESSION['user']['email']) : '' ?>"
                <?= $isConnected ? 'readonly' : 'required' ?>>

            <label for="message">Message :</label>
            <textarea id="message" name="message" rows="6" required></textarea>

            <input type="submit" value="Envoyer">
        </form>
    </section>

    <section class="contact-map">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2781.836083228124!2d4.827005276170633!3d45.76404327910657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f4ea4f6dc0f8c7%3A0x406ab0b7f0c0c30!2sLyon!5e0!3m2!1sfr!2sfr!4v1696700000000!5m2!1sfr!2sfr" 
            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy">
        </iframe>
    </section>

</main>

<?php require_once '../includes/footer.php'; ?>
</body>
</html>



<?php
session_start();
require_once '../includes/config.php';
$cnx = livreor::getInstance();

// Si l'utilisateur est connecté => on recharge ses infos dans l'objet
if (isset($_SESSION['user'])) {
    $cnx->setConnectedUser($_SESSION['user']['id'], $_SESSION['user']['login'], $_SESSION['user']['email']);
}

// Gestion de l'ajout de commentaire (réservé aux connectés)
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment'])) {
    if (isset($_SESSION['user'])) {
        $comment = trim($_POST['comment']);
        $user_id = $_SESSION['user']['id'];
        $result = $cnx->addComment($user_id, $comment);
// si erreur lors de l'ajout
        if ($result !== true) {
            
            $errors[] = $result;
        } else {
            header("Location: livreOr.php");
            exit();
        }
    } else {
        $errors[] = "Vous devez être connecté pour publier un commentaire.";
    }
}

$comments = $cnx->getAllComments();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d’or - Lyon</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="page-wrapper">

<header class="main-header">
    <h1>Livre d’or de Lyon</h1>  
    <nav>
        <?php 
        require_once '../includes/users_acess.php'; 
        ?>   
    </nav>   
</header>

<main class="home-content">
    <section class="livre-or-section">
        <h2>Racontes-nous tes souvenirs</h2>

        <?php if(!empty($errors)): ?>
            <div class="errors">
                <?php foreach($errors as $err): ?>
                    <p><?= htmlspecialchars($err) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="livreOr.php">
            <textarea name="comment" placeholder="Écrivez votre commentaire..." required></textarea>
            <input type="submit" value="Publier">
        </form>
<!--$c : est simplement une variable temporaire utilisée à chaque tour 
 de la boucle pour contenir un seul commentaire ds le tableau $comments. -->
        <div class="comments-list">
            <?php foreach($comments as $c): ?>
                <div class="comment-card">
                    <div class="comment-meta">
                        <strong><?= htmlspecialchars($c['login']) ?></strong> - <?= date('d/m/Y H:i', strtotime($c['date'])) ?>
                    </div>
                    <p><?= htmlspecialchars($c['comment']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php require_once '../includes/footer.php'; ?>

</div>
</body>
</html>

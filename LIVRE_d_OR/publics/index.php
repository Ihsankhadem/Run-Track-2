<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Livre d'or de Lyon</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="page-wrapper">

    <header class="main-header">
        <h1>Le Livre d’or de la Ville de Lyon</h1>
        <nav>
            <?php require_once '../includes/users_acess.php'; ?>
        </nav>
    </header>

    <main class="home-content">
        <section class="presentation">
            <div class="presentation-text">
                <h2>Redécouvrez Lyon à travers vos souvenirs</h2>
                <p>
                    De la colline de Fourvière aux quais du Rhône, chaque coin de Lyon raconte une histoire. 
                    Et si c’était la vôtre ? Ce <strong>livre d’or</strong> vous invite à partager vos plus beaux souvenirs, vos coups de cœur et vos émotions dans cette ville où passé et modernité s’entrelacent.
                </p>

                <p>
                    Laissez une trace, un mot, une pensée. Explorez les messages des autres amoureux de Lyon, et contribuez à faire vivre la mémoire collective de notre cité des Lumières.
                </p>

                <div class="buttons">
                    <a class="btn" href="register.php">Rejoindre la communauté</a>
                    <a class="btn" href="connect.php">Se connecter</a>
                </div>
            </div>

            <div class="presentation-image">
                <img src="../img/lyon1.jpeg" alt="Vue panoramique de Lyon">
            </div>
        </section>
    </main>

    <?php require_once '../includes/footer.php'; ?>

</div>
</body>
</html>

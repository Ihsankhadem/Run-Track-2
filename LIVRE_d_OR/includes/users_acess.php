

  
        <?php if (isset($_SESSION['user'])): ?>
            <a href="home.php">Accueil</a>
            <a href="livreOr.php">Livre d’Or</a>
            <a href="profil.php">Mon profil</a>
            <a href="contact.php">Contact</a>
            <a href="logout.php">Déconnexion</a>
        <?php else: ?>
            <a href="index.php">Accueil</a>
            <a href="who.php">Qui Sommes-Nous ?</a>
            <a href="livreOr.php">Livre d’Or</a>
            <a href="contact.php">Contact</a>
        <?php endif; ?>
   


<?php
require "User.php"; // inclure la class ds l'index

// Créer un utilisateur($login, $email)
$user1 = new User("ihsan", "nashi@mail.com");

// Afficher ses infos
echo $user1->sayHello();



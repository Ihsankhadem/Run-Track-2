
Module de Connexion ManguOrange


1. Objectif

Ce module permet :

L’inscription sécurisée d’utilisateurs
La connexion et déconnexion
La gestion du profil utilisateur
L’accès sécurisé aux pages protégées


2. Structure des fichiers
/module_connexion
│
├─ config.php          # Classe principale moduleCNX, PDO, singleton
├─ connect.php         # Page de connexion
├─ inscription.php     # Page d'inscription
├─ deconnect.php       # Page de déconnexion
├─ profil.php          # Page profil de l'utilisateur
├─ index.php           # Page d'accueil après connexion
├─ who.php             # Page "Qui sommes-nous"
├─ contact.php         # Page contact
├─ style.css           # CSS général
├─ images/             # Images pour les fruits et icônes
└─ helper.php          # Fichier optionnel pour fonctions utilitaires (enlever)

3. Base de données

Table users :

Field	Type	Null	Key	Extra
id	int(11)	NO	PRI	auto_increment
login	varchar(255)	NO	UNI	
prenom	varchar(255)	YES		
nom	varchar(255)	YES		
password	varchar(255)	NO		

Notes :
Le mot de passe doit être haché avec password_hash().
Le login est unique (UNI).


4. Classe moduleCNX (dans config.php)

Propriétés :

$id, $login, $prenom, $nom : infos utilisateur
$isConnected : booléen de connexion
$connexion : objet PDO
$instance : singleton

Méthodes principales :

getInstance() : retourne l’instance unique (singleton)
register($login, $password, $prenom, $nom)
Vérifie les champs
Hash le mot de passe

Insère l’utilisateur dans la DB
connect($login, $password)
Vérifie l’utilisateur

Vérifie le mot de passe avec password_verify
Retourne true si connexion réussie
disconnect() : déconnecte l’utilisateur
isConnected() : retourne l’état de connexion

getAllInfos() : retourne les infos de l’utilisateur

Sécurité :
Mot de passe haché
Login unique
Singleton pour éviter plusieurs connexions PDO

5. Pages principales

5.1 Inscription (inscription.php)
Formulaire : login, password, prénom, nom
Méthode POST
Appelle $cnx->register(...)
Après succès → redirige vers connect.php ou index.php

5.2 Connexion (connect.php)
Formulaire : login + password
Méthode POST
Appelle $cnx->connect(...)
Après succès → crée $_SESSION['user'] et redirige vers index.php
Sinon → message d’erreur

5.3 Déconnexion (deconnect.php)
session_start();
session_unset();
session_destroy();
header("Location: index.php");
exit;

5.4 Profil (profil.php)
Affiche les informations de l’utilisateur
Possibilité de mettre à jour les infos via $cnx->update(...)
Affiche historique des achats
Bouton pour déconnexion (deconnect.php)

6. Session utilisateur

Toujours commencer par :

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


Stocker les infos essentielles dans $_SESSION['user'] :

$_SESSION['user'] = [
    'login' => $cnx->login,
    'prenom' => $cnx->prenom,
    'nom' => $cnx->nom
];


Vérifier la session pour pages protégées :

if (!isset($_SESSION['user'])) {
    header("Location: connect.php");
    exit;
}

7. Sécurité

Hash mot de passe avec password_hash et password_verify.
Préparer les requêtes PDO pour éviter les injections SQL.
Vérifier les champs obligatoires avant d’envoyer la requête.
Sessions pour stocker l’état connecté.


9. Bonnes pratiques

Séparer HTML / PHP / CSS
Ne jamais stocker de mot de passe en clair
Utiliser des fonctions pour toutes les opérations DB
Nettoyer les entrées avec trim() et htmlspecialchars() lors de l’affichage

10. Exemple d’utilisation
require_once 'config.php';
$cnx = moduleCNX::getInstance();

// Inscription
if ($cnx->register('nashi', '12345', 'Nashi', 'Fruit')) {
    echo "Inscription OK";
}

// Connexion
if ($cnx->connect('nashi', '12345')) {
    echo "Bienvenue " . $cnx->prenom;
}



SCHEMA POUR QUE CE SOIT PLUS CLAIR



[inscription.php] ---> POST (login, password, prenom, nom)
       |
       v
   [config.php / moduleCNX->register()]
       |
       |-- Vérifie que tous les champs sont remplis
       |-- Vérifie que le login n'existe pas
       |-- Hash le mot de passe (password_hash)
       |-- Insère dans la DB
       v
  [Retour inscription réussie ?]
       |
       |-- Oui --> crée $_SESSION['user'] --> Redirige vers connect.php 
       |
       |-- Non --> Message d'erreur "Login déjà utilisé ou champs manquants"

---

[connect.php] ---> POST (login, password)
       |
       v
   [config.php / moduleCNX->connect()]
       |
       |-- Vérifie que tous les champs sont remplis
       |-- Cherche login dans DB
       |-- Compare mot de passe avec password_verify()
       v
  [Connexion réussie ?]
       |
       |-- Oui --> crée $_SESSION['user'] avec login, prenom, nom
       |           --> Redirige vers index.php (accueil)
       |
       |-- Non --> Message d'erreur "Login ou mot de passe incorrect"

---

[index.php] (page d'accueil)
       |
       v
   [Vérifie session]
       |
       |-- isset($_SESSION['user']) ?
       |       |
       |       |-- Oui --> Affiche page avec "Bonjour [prenom] [nom]"
       |       |
       |       |-- Non --> Redirige vers connect.php

---

[profil.php]
       |
       v
   [Vérifie session]
       |
       |-- Affiche informations user ($_SESSION['user'])
       |-- Permet mise à jour via moduleCNX->update()
       |-- Affiche historique des achats (table HTML)
       |-- Bouton "Se déconnecter" --> deconnect.php

---

[deconnect.php]
       |
       v
   session_start()
   session_unset()
   session_destroy()
   Redirige vers connect.php

---

Notes importantes :
1. **Toutes les pages protégées** (index.php, profil.php, boutique, etc.) doivent vérifier la session.
2. **Mot de passe** jamais stocké en clair : utiliser `password_hash()` à l’inscription et `password_verify()` à la connexion.
3. **PDO + requêtes préparées** pour éviter les injections SQL.
4. **$_SESSION['user']** contient uniquement les informations nécessaires : login, prenom, nom.
5. **Redirections** : après connexion/inscription, envoyer l’utilisateur vers la page d’accueil ou de profil.

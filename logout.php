<?php
session_start(); // On démarre la session

if (isset($_SESSION['name'])) {
    unset($_SESSION['name']);
}
session_unset (); // On détruit les variables de notre session
session_destroy(); // On détruit notre session
header('Location: index.html'); // On redirige le visiteur vers la page d'accueil
exit;
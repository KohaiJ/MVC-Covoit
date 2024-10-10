<?php
session_start();

include 'vue/entete.php'; // L'entête est toujours incluse

if (isset($_GET['ctl'])) {
    switch ($_GET['ctl']) {
        case 'connexion':
            include 'controleur/ctlConnexion.php';
            break;
        case 'compte':
            include 'controleur/ctlCompte.php';
            break;
        // Ajoutez d'autres contrôleurs si nécessaire
    }
}

// Affiche la page d'accueil si aucun autre contrôleur n'est appelé
if (!isset($_GET['ctl'])) {
    // Si l'utilisateur est connecté, on affiche la page d'accueil
    if (isset($_SESSION['connect']) && $_SESSION['connect'] === true) {
        include 'vue/body.php'; // Inclure la page d'accueil
    } else {
        // Sinon, on affiche le formulaire de connexion
        include 'vue/vueConnexion/v_form_connexion.php';
    }
}

include 'vue/footer.php'; // L'inclusion du footer est toujours faite


// ADZFERTYKTRHZEF
?>

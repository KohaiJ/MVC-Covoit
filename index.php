<?php
session_start();

// Vérifier si l'utilisateur est connecté
$userConnected = isset($_SESSION['connect']) && $_SESSION['connect'] === true;

// Inclure l'en-tête seulement si l'utilisateur est connecté
if ($userConnected) {
    include 'vue/entete.php';
}

if (isset($_GET['ctl'])) {
    switch ($_GET['ctl']) {
        case 'connexion':
            include 'controleur/ctlConnexion.php';
            break;
        case 'voiture':
            include 'controleur/ctlVoiture.php';
            break;
        case 'trajet':
            include 'controleur/ctlTrajet.php';
            break;
        case 'compte':
            include 'controleur/ctlCompte.php';
            break; 
        case 'Import':
            include 'controleur/ctlImport.php';
            break;
        case 'reservation':
            include './controleur/ctlReservation.php';
            break;
        case 'compteTrajets':
            include 'controleur/ctlCompteTrajets.php';
            break;
        // Ajoutez d'autres contrôleurs si nécessaire
    }
}

// Affiche la page d'accueil si aucun autre contrôleur n'est appelé
if (!isset($_GET['ctl'])) {
    // Si l'utilisateur est connecté, on affiche la page d'accueil
    if ($userConnected) {
        include 'vue/body.php'; // Inclure la page d'accueil
    } else {
        // Sinon, on affiche le formulaire de connexion
        include 'vue/vueConnexion/v_form_connexion.php';
    }
}

// Inclure le footer seulement si l'utilisateur est connecté
if ($userConnected) {
    include 'vue/footer.php';
}
?>

<?php

require_once './model/DbCompte.php';
require_once './model/DbVoiture.php';
require_once './model/DbTrajet.php';

// Récupérer l'email de l'utilisateur connecté depuis la session
$email = $_SESSION['email'];
$idEtudiant = $_SESSION['id'];

// Récupérer les informations du compte via le modèle
$compte = DbCompte::getCompteByEmail($email);
$idEtudiant = DbVoiture::getIdEtudiantByEmail($email);
$voitures = DbCompte::getVoituresByIdEtudiant($idEtudiant);
$trajets = DbTrajet::getTrajetByUserId($idEtudiant);
// Commentez ou supprimez cette ligne si la méthode n'existe pas
// $reservations = DbTrajet::getReservationsByUserId($idEtudiant);

// Après avoir récupéré les données
if ($compte === false) {
    echo "Erreur lors de la récupération des informations du compte.";
}

if ($voitures === false) {
    echo "Erreur lors de la récupération des voitures.";
}

if ($trajets === false) {
    echo "Erreur lors de la récupération des trajets.";
}

// Vérifiez si les voitures sont récupérées
if (empty($voitures)) {
    //echo "Aucune voiture trouvée pour cet étudiant.";
} else {
    // Préparez les données pour les afficher
    $infosVoitures = [];
    foreach ($voitures as $voiture) {
        $infosVoitures[] = [
            'marque' => htmlspecialchars($voiture['marque']),
            'modele' => htmlspecialchars($voiture['modele']),
        ];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['possede_voiture'])) {
    // Récupérer la réponse de l'utilisateur
    $possede_voiture = $_POST['possede_voiture'];
    $email = $_SESSION['email']; // Utiliser l'email de l'utilisateur connecté

    // Appeler la méthode pour mettre à jour le statut de la voiture
    if (DbCompte::updateVoitureStatus($email, $possede_voiture)) {
        $_SESSION['vehicule'] = ($possede_voiture === 'oui') ? 1 : 0;
        header('Location: index.php?ctl=compte&action=compte');
        echo "<center>Statut de la voiture mis à jour avec succès.</center>";
        exit;
    } else {
        echo "<center>Erreur lors de la mise à jour du statut de la voiture.</center>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $preferences = [
        'cigarette' => isset($_POST['cigarette']) ? 1 : 0,
        'nourriture' => isset($_POST['nourriture']) ? 1 : 0,
        'musique' => isset($_POST['musique']) ? 1 : 0,
        'bagage' => isset($_POST['bagage']) ? 1 : 0,
    ];

    if (DbCompte::updatePreferences($email, $preferences)) {
        header('Location: index.php?ctl=compte&action=compte');
        exit;
    } else {
        echo "<center>Erreur lors de la mise à jour des préférences.</center>";
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'supprimerVoiture') {
    $idVoiture = $_GET['id']; // Récupérer l'ID de la voiture à supprimer

    // Appeler la méthode pour supprimer la voiture
    if (DbCompte::supprimerVoiture($idVoiture)) {
        echo "<center>Voiture supprimée avec succès.</center>";
    } else {
        echo "<center>Erreur lors de la suppression de la voiture.</center>";
    }

    // Rediriger vers la page des comptes
    header('Location: index.php?ctl=compte&action=compte');
    exit;
}

// Inclure la vue pour afficher les informations du compte
require_once 'vue/vueCompte/v_compte.php';

?>

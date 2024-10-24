<?php

include './model/DbCompte.php'; // Inclure le modèle
include './model/DbVoiture.php';
include './model/DbTrajet.php';

// Récupérer l'email de l'utilisateur connecté depuis la session
$email = $_SESSION['email'];
$idEtudiant = $_SESSION['id'];

// Récupérer les informations du compte via le modèle
$compte = DbCompte::getCompteByEmail($email);
$idEtudiant = DbVoiture::getIdEtudiantByEmail($email);
$voitures = DbCompte::getVoituresByIdEtudiant($idEtudiant);
$trajets = DbTrajet::getTrajetByUserId($idEtudiant);
$reservations = DbTrajet::getReservationsByUserId($idEtudiant);
// Vérifiez si les voitures sont récupérées
if ($voitures === false) {
    echo "Erreur lors de la récupération des voitures.";
} elseif (empty($voitures)) {
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

$voitures = DbCompte::getVoituresByIdEtudiant($idEtudiant);

// Vérifiez si les voitures sont récupérées
if ($voitures === false) {
    echo "Erreur lors de la récupération des voitures.";
} elseif (empty($voitures)) {
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
include 'vue/vueCompte/v_compte.php';

?>
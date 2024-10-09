<?php
include './model/DbCompte.php';

// Traitement de la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['possede_voiture'])) {
    // Récupérer la réponse de l'utilisateur
    $possede_voiture = $_POST['possede_voiture'];
    $email = $_SESSION['email']; // Utiliser l'email de l'utilisateur connecté

    // Appeler la méthode pour mettre à jour le statut de la voiture
    if (DbCompte::updateVoitureStatus($email, $possede_voiture)) {
        echo "<center>Statut de la voiture mis à jour avec succès.</center>";
    } else {
        echo "<center>Erreur lors de la mise à jour du statut de la voiture.</center>";
    }
}

include 'vue/vueCompte/v_form_compte.php';

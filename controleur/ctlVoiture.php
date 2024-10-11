<?php
include './model/DbVoiture.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les informations du formulaire
    $marque = $_POST['marque'];
    $modele = $_POST['modele']; // Assurez-vous que ce champ est défini dans votre formulaire
    $nbPlace = $_POST['nbPlace'];
    $email = $_SESSION['email']; // Récupérer l'email de l'étudiant connecté

    // Récupérer l'ID de l'étudiant à partir de l'email
    $idEtudiant = DbVoiture::getIdEtudiantByEmail($email);

    // Appeler la méthode pour ajouter la voiture
    if (DbVoiture::ajouterVoiture($idEtudiant, $marque, $modele, $nbPlace)) { // Assurez-vous d'inclure $modele ici
        echo "<center>Voiture ajoutée avec succès.</center>";
    } else {
        echo "<center>Erreur lors de l'ajout de la voiture.</center>";
    }
}

// Inclure la vue pour afficher le formulaire d'ajout de voiture
include 'vue/vueVoiture/v_form_voiture.php';
?>

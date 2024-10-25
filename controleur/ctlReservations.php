<?php
include './model/DbReservations.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

function mesReservations() {
    $idEtudiant = $_SESSION['id']; // Assurez-vous que cette clé est correcte
    $reservations = DbReservations::getReservationsEtudiant($idEtudiant);
    // Ajoutez un var_dump ici pour déboguer
    // var_dump($reservations);
    require_once 'vue/vueReservations/v_mes_reservations.php';
}

function reserver() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idTrajet = $_POST['idTrajet'];
        $nbPlaces = $_POST['nbPlaces'];
        $idEtudiant = $_SESSION['id']; // Assurez-vous que l'ID de l'étudiant est stocké dans la session

        // Appel à la fonction pour effectuer la réservation
        $reservationReussie = DbReservations::ajouterReservation($idEtudiant, $idTrajet, $nbPlaces);

        if ($reservationReussie) {
            // Redirection vers la page des réservations
            header('Location: index.php?ctl=reservations&action=mesReservations');
            exit();
        } else {
            // Gestion de l'erreur
            // Vous pouvez rediriger vers une page d'erreur ou afficher un message
            echo "Erreur lors de la réservation.";
        }
    }
}
?>

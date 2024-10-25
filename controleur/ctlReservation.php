<?php
include_once './model/DbReservation.php';
include_once './model/DbTrajet.php';

class CtlReservation {
    public static function reserver() {
        if (!isset($_SESSION['id']) || !isset($_POST['idTrajet']) || !isset($_POST['placesReservees'])) {
            header('Location: index.php');
            exit();
        }

        $idEtudiant = $_SESSION['id'];
        $idTrajet = $_POST['idTrajet'];
        $placesReservees = intval($_POST['placesReservees']);

        // Vérifier si le trajet existe et s'il y a assez de places
        $trajet = DbTrajet::getTrajetById($idTrajet);
        if (!$trajet || $trajet['places'] < $placesReservees) {
            $_SESSION['message'] = "Erreur : places insuffisantes ou trajet invalide.";
            header('Location: index.php?ctl=trajet&action=detail&id=' . $idTrajet);
            exit();
        }

        // Effectuer la réservation
        if (DbReservation::ajouterReservation($idEtudiant, $idTrajet, $placesReservees)) {
            // Mettre à jour le nombre de places disponibles
            DbTrajet::updatePlacesDisponibles($idTrajet, $trajet['places'] - $placesReservees);
            $_SESSION['message'] = "Réservation effectuée avec succès !";
        } else {
            $_SESSION['message'] = "Erreur lors de la réservation.";
        }

        header('Location: index.php?ctl=trajet&action=detail&id=' . $idTrajet);
        exit();
    }
}

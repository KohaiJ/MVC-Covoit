<?php

require_once './model/DbReservation.php';
require_once './model/DbCompte.php'; // Pour récupérer les infos de l'étudiant


class ctlReservation {
    
    public static function reserverTrajet() {
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $compte = DbCompte::getCompteByEmail($email); // Récupérer les informations de l'étudiant
            $idEtudiant = $compte['id'];
            
            if (isset($_GET['idTrajet'])) {
                $idTrajet = $_GET['idTrajet'];

                // Appeler la méthode pour ajouter une réservation
                $reservationReussie = DbReservation::ajouterReservation($idEtudiant, $idTrajet);

                if ($reservationReussie) {
                    echo "Réservation réussie !";
                } else {
                    echo "Vous avez déjà réservé ce trajet.";
                }
            } else {
                echo "Trajet non spécifié.";
            }
        } else {
            echo "Vous devez être connecté pour réserver un trajet.";
        }
    }
}

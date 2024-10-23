<?php
include './model/DbConnect.php';
include './model/DbCompte.php'; // Inclure le modèle
include './model/DbVoiture.php';
include './model/DbTrajet.php';

$action = $_GET['action'];

switch($action) {
    case 'mesTrajets':
        $idEtudiant = $_SESSION['id'];
        $trajets = DbTrajet::getTrajetByUserId($idEtudiant);
        include 'vue/vueTrajet/v_mes_trajets.php'; // Mise à jour du chemin
        break;

    case 'supprimerTrajet':
        $idTrajet = $_GET['id'];
        if (DbTrajet::supprimerTrajet($idTrajet)) {
            echo "<center>Le trajet a été supprimé avec succès.</center>";
        } else {
            echo "<center>Erreur lors de la suppression du trajet.</center>";
        }
        header('Location: index.php?ctl=compteTrajets&action=mesTrajets');
        exit;
        break;

    case 'supprimerReservation':
        $idReservation = $_GET['id'];
        if (DbTrajet::supprimerReservation($idReservation)) {
            echo "<center>La réservation a été supprimée avec succès.</center>";
        } else {
            echo "<center>Erreur lors de la suppression de la réservation.</center>";
        }
        header('Location: index.php?ctl=compte&action=compte');
        exit;
        break;

    default:
        // Gérer le cas par défaut ou les erreurs
        break;
}
?>

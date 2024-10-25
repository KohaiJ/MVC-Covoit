<?php
include_once './model/DbReservation.php';
include_once './model/DbTrajet.php';

class CtlReservation {
    public static function reserver() {
        if (!isset($_SESSION['id']) || !isset($_POST['idTrajet']) || !isset($_POST['placesReservees'])) {
            header('Location: index.php');
            exit();
        }
require_once './model/DbReservation.php';
require_once './model/DbCompte.php'; // Pour récupérer les infos de l'étudiant
require_once './model/DbConnect.php';
require_once './model/DbTrajet.php';
$action =$_GET['action'];
switch ($action) {


    case 'reserverTrajet':

        

        if (isset($_GET['id']) && isset($_GET['idTrajetEtudiant']) && $_SESSION['id'] !== $_GET['idTrajetEtudiant']) {
            $idTrajet = $_GET['id'];
            $trajetnbPlace = DbTrajet::getNbPlace($idTrajet);

            // Récupération de l'ID de l'étudiant (par exemple depuis la session)
            $idEtudiant = $_SESSION['id'];

            // Vérifier si l'étudiant a déjà réservé ce trajet
            $conn = MySqlDb::getPdoDb();
            $checkReservation = $conn->prepare("SELECT * FROM reserver WHERE idTrajet = :idTrajet AND idEtudiant = :idEtudiant");
            $checkReservation->bindParam(':idTrajet', $idTrajet);
            $checkReservation->bindParam(':idEtudiant', $idEtudiant);
            $checkReservation->execute();
           

            if ($checkReservation->rowCount() > 0 ) {
                echo "<center>Vous avez déjà réservé ce trajet.</center>";
                break;
            }
        
            if ($trajetnbPlace == 0) {
                echo "<center>Il n'y a plus de place pour ce trajet.</center>";
                break;
            }
            else{
            // Enregistrer la réservation dans la base de données
            $insertReservation = $conn->prepare("INSERT INTO reserver (idTrajet, idEtudiant, etat, netat) VALUES (:idTrajet, :idEtudiant, 'en attente', '1')");
            $insertReservation->bindParam(':idTrajet', $idTrajet);
            $insertReservation->bindParam(':idEtudiant', $idEtudiant);
    
            $success = $insertReservation->execute();

            // Redirection ou message de succès/erreur
            if ($success) {
                
                DbTrajet::updateNbPlace($idTrajet);
                echo "<center>Réservation effectuée avec succès.</center>";
              

                
            } else {
                
                echo "<center>Échec de la réservation.</center>";
                }
            }
        }
        else{
            echo "<center>Données invalides ou vous ne pouvez pas réserver votre propre trajet.</center>";
        }
        break;

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

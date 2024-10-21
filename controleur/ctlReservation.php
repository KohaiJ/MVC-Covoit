<?php
require_once './model/DbReservation.php';
require_once './model/DbCompte.php'; // Pour récupérer les infos de l'étudiant
require_once './model/DbConnect.php';
$action =$_GET['action'];
switch ($action) {


    case 'reserverTrajet':

        if (isset($_GET['id'])) {
            $idTrajet = $_GET['id'];

            // Récupération de l'ID de l'étudiant (par exemple depuis la session)
            $idEtudiant = $_SESSION['id'];

            // Vérifier si l'étudiant a déjà réservé ce trajet
            $conn = MySqlDb::getPdoDb();
            $checkReservation = $conn->prepare("SELECT * FROM reserver WHERE idTrajet = :idTrajet AND idEtudiant = :idEtudiant");
            $checkReservation->bindParam(':idTrajet', $idTrajet);
            $checkReservation->bindParam(':idEtudiant', $idEtudiant);
            $checkReservation->execute();
           

            if ($checkReservation->rowCount() > 0) {
                echo "<center>Vous avez déjà réservé ce trajet.</center>";
                break;
            }

            // Enregistrer la réservation dans la base de données
            $insertReservation = $conn->prepare("INSERT INTO reserver (idTrajet, idEtudiant, etat) VALUES (:idTrajet, :idEtudiant, 'reserve')");
            $insertReservation->bindParam(':idTrajet', $idTrajet);
            $insertReservation->bindParam(':idEtudiant', $idEtudiant);

            $success = $insertReservation->execute();

            // Redirection ou message de succès/erreur
            if ($success) {
                echo "<center>Réservation effectuée avec succès.</center>";
            } else {
                echo "<center>Échec de la réservation.</center>";
            }
        }
        break;

}


?>
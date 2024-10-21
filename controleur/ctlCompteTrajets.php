<?php
include './model/DbConnect.php';
include './model/DbCompte.php'; // Inclure le modèle
include './model/DbVoiture.php';
include './model/DbTrajet.php';

$action =$_GET['action'];
switch($action){

    case 'supprimerTrajet':
        $idTrajet = $_GET['id'];
        DbTrajet::supprimerTrajet($idTrajet);
        echo "<center>Le trajet a été supprimé avec succès.</center>";

        
        break;



    case 'supprimerReservation':
        


        $idTrajetreservation = $_GET['idTrajet'];  
        DbTrajet::supprimerReservation($idTrajetreservation);
        echo "<center>La réservation a été supprimée avec succès.</center>";
        break;

}

?>
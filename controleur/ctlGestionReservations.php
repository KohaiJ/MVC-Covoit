<?php
include 'model/DbReservation.php';
include 'model/DbTrajet.php';
include 'model/DbGestionReservations.php';

$action =$_GET['action'];
switch($action){

    case 'afficherReservations':
        include 'vue/vueReservation/v_reservation.php';
    break;

    case 'afficherReservationsencours':
        $reservationsencours = DbGestionReservations::getReservationsEncours($_GET['idTrajet']);
        include 'vue/vueReservation/v_reservationbis.php';
    break;



    case 'gererReservationacceptees':
        $idEtudiant = $_POST['idEtudiant'];
        $idTrajet = $_POST['idTrajet'];
        $succes = DbGestionReservations::UpdateReservationsAcceptees($idEtudiant, $idTrajet);
       
        if($succes==true){
            echo "<center>Réservation acceptée avec succès</center>";
        }else{
            echo "<center>Erreur lors de la mise à jour de l'état de la réservation ou réservation déjà gérée</center>";
        }
    break;

    case 'gererReservationrefusees':
        $idEtudiant = $_POST['idEtudiant'];
        $idTrajet = $_POST['idTrajet'];
        DbTrajet::recupererplacereserve($idTrajet);
        $succes = DbGestionReservations::UpdateReservationsRefusees($idEtudiant, $idTrajet);

        
        if($succes==true){
            echo "<center>Réservation refusée avec succès</center>";
        }else{
            echo "<center>Erreur lors de la mise à jour de l'état de la réservation ou réservation déjà gérée</center>";
        }
    break;




}

?>
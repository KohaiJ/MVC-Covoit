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



    case 'gererReservation':
        $idReservation = $_POST['idReservation'];
        $action = $_POST['action'];
        DbGestionReservations::gererReservation($idReservation, $action);
    break;




}

?>
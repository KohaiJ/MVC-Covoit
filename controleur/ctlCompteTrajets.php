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
        header("Location: index.php?ctl=compte&action=compte"); 
        exit();
        
        

        
    break;



    case 'supprimerReservation':
        


        $idTrajetreservation = $_GET['idTrajet'];  
        DbTrajet::supprimerReservation($idTrajetreservation);
        
        header("Location: index.php?ctl=compte&action=compte"); 
        exit();
    break;

}

?>
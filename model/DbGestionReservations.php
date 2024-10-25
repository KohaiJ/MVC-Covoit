<?php
require_once "MysqlDb.php";

class DbGestionReservations{

    public static function getReservationsEncours($idTrajet){
        $conn = MySqlDb::getPdoDb();
        $stmt = $conn->prepare("SELECT * FROM reserver WHERE etat = 'en attente' AND idTrajet = :idTrajet");
        $stmt->bindParam(':idTrajet', $idTrajet);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
    }

    public static function updateEtatReservation($idEtudiant, $idTrajet, $action, $netat){
        $conn = MySqlDb::getPdoDb();
        $stmt = $conn->prepare("UPDATE reserver SET etat = :action, netat = :netat WHERE idEtudiant = :idEtudiant AND idTrajet = :idTrajet");
        $stmt->bindParam(':idEtudiant', $idEtudiant);
        $stmt->bindParam(':idTrajet', $idTrajet);
        $stmt->bindParam(':action', $action);
        $stmt->bindParam(':netat', $netat);
        $stmt->execute();
    }

    public static function UpdateReservationsRefusees($idEtudiant, $idTrajet){
        $conn = MySqlDb::getPdoDb();
        $stmt = $conn->prepare("UPDATE reserver SET etat = 'rejeter', netat = 0 WHERE idEtudiant = :idEtudiant AND idTrajet = :idTrajet");
        $stmt->bindParam(':idEtudiant', $idEtudiant);
        $stmt->bindParam(':idTrajet', $idTrajet);
        $stmt->execute();
        //true or false
        return $stmt->rowCount() > 0;
    }

    public static function UpdateReservationsAcceptees($idEtudiant, $idTrajet){
        $conn = MySqlDb::getPdoDb();
        $stmt = $conn->prepare("UPDATE reserver SET etat = 'accepter', netat = 2 WHERE idEtudiant = :idEtudiant AND idTrajet = :idTrajet");
        $stmt->bindParam(':idEtudiant', $idEtudiant);
        $stmt->bindParam(':idTrajet', $idTrajet);
        $stmt->execute();
        //true or false
        return $stmt->rowCount() > 0;
    }


    

    

}

?>
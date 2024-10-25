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

}

?>
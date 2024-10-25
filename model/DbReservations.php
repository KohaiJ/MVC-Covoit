<?php
require_once 'MysqlDb.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

class DbReservations {
    public static function getReservationsEtudiant($idEtudiant) {
        $db = MysqlDb::getPdoDb();
        $sql = "SELECT r.*, t.* FROM reserver r 
                JOIN trajets t ON r.idTrajet = t.idTrajet 
                WHERE r.idEtudiant = :idEtudiant";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':idEtudiant', $idEtudiant, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function ajouterReservation($idEtudiant, $idTrajet, $nbPlaces) {
        $db = MysqlDb::getPdoDb();
        $sql = "INSERT INTO reserver (idEtudiant, idTrajet, nbPlaces, etatReservation) VALUES (:idEtudiant, :idTrajet, :nbPlaces, 'En attente')";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':idEtudiant', $idEtudiant);
        $stmt->bindParam(':idTrajet', $idTrajet);
        $stmt->bindParam(':nbPlaces', $nbPlaces);
        return $stmt->execute();
    }

}

?>

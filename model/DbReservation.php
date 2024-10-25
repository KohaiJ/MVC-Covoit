<?php

require_once 'MysqlDb.php'; // Connexion à la base de données

class DbReservation {
    
    // Méthode pour insérer une réservation
    public static function ajouterReservation($idEtudiant, $idTrajet) {
        $conn = MySqlDb::getPdoDb();
        
        // Requête pour vérifier si la réservation existe déjà
        $sql = "SELECT * FROM reserver WHERE idEtudiant = :idEtudiant AND idTrajet = :idTrajet";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idEtudiant', $idEtudiant);
        $stmt->bindParam(':idTrajet', $idTrajet);
        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            // Si la réservation n'existe pas, on l'insère
            $sql = "INSERT INTO reserver (idEtudiant, idTrajet, etat, netat) VALUES (:idEtudiant, :idTrajet, 'En attente', '1)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':idEtudiant', $idEtudiant);
            $stmt->bindParam(':idTrajet', $idTrajet);
            return $stmt->execute();
        } else {
            // Si la réservation existe déjà, renvoyer une erreur
            return false;
        }
    }
}

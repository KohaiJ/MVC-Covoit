<?php
require_once "MysqlDb.php";

class DbTrajet {
    public static function chercherTrajets($depart, $arrive, $date, $heureActuelle) {
        $conn = MySqlDb::getPdoDb();
        
        $sql = "SELECT t.*, e.nom AS nomEtudiant 
                FROM trajet t
                JOIN etudiant e ON t.idEtudiant = e.id
                WHERE t.LieuDepart = :depart 
                AND t.LieuArrive = :arrive 
                AND (t.DateTrajet > :date OR (t.DateTrajet = :date AND t.heureDepart >= :heureActuelle)) 
                ORDER BY t.DateTrajet ASC, t.heureDepart ASC";
        
        $stmt = $conn->prepare($sql);
        
        // Liaison des paramètres
        $stmt->bindParam(':depart', $depart);
        $stmt->bindParam(':arrive', $arrive);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':heureActuelle', $heureActuelle);
      
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retourne tous les trajets trouvés
    }
    
    public static function ajouterTrajet($lieu_depart, $lieu_arrive, $jour, $heure_depart, $id, $places, $idVoiture) {
        $conn = MySqlDb::getPdoDb();
        $sql = "INSERT INTO trajet (LieuDepart, LieuArrive, DateTrajet, heureDepart, idEtudiant, places, idVoiture)
                VALUES (:LieuDepart, :LieuArrive, :DateTrajet, :heureDepart, :id, :places, :idVoiture)";
        $stmt = $conn->prepare($sql);
    
        // Lier les paramètres
        $stmt->bindParam(':LieuDepart', $lieu_depart);
        $stmt->bindParam(':LieuArrive', $lieu_arrive);
        $stmt->bindParam(':DateTrajet', $jour);
        $stmt->bindParam(':heureDepart', $heure_depart);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':places', $places);
        $stmt->bindParam(':idVoiture', $idVoiture); // Lier idVoiture
    
        return $stmt->execute(); // Renvoie true si l'insertion a réussi, false sinon
    }

    public static function getTrajetById($idTrajet) {
        $conn = MySqlDb::getPdoDb();
        $sql = "SELECT t.*, e.nom AS nomEtudiant, e.prenom AS prenomEtudiant, 
                   v.marque, v.modele, v.nbPlace
            FROM trajet t
            JOIN etudiant e ON t.idEtudiant = e.id
            LEFT JOIN voiture v ON t.idVoiture = v.id
            WHERE t.id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $idTrajet);
        $stmt->execute();

        $trajet = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($trajet && $trajet['marque'] !== null) {
            $trajet['voiture'] = [
                'marque' => $trajet['marque'],
                'modele' => $trajet['modele'],
                'nbPlace' => $trajet['nbPlace']
            ];
        }

        return $trajet;
    }

    public static function getReservationById($idEtudiant) { 
        $conn = MySqlDb::getPdoDb();
        $sql = "SELECT * FROM reserver";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idEtudiant', $idEtudiant);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getTrajetByUserId($idEtudiant) {
        $conn = MySqlDb::getPdoDb();
        $sql = "SELECT * FROM trajet WHERE idEtudiant = :idEtudiant";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idEtudiant', $idEtudiant);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getReservationsByUserId($idEtudiant) {
        $conn = MySqlDb::getPdoDb();
        $sql = "SELECT * FROM reserver WHERE idEtudiant = :idEtudiant";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idEtudiant', $idEtudiant);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function supprimerTrajet($idTrajet) {
        $conn = MySqlDb::getPdoDb();
        $sql = "DELETE FROM trajet WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $idTrajet);
        return $stmt->execute();
    }
}
?>

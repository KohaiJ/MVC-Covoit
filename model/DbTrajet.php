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
                   v.marque, v.modele, v.nbPlace,
                   e.cigarette, e.nourriture, e.musique, e.bagage
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

    public static function getTrajetByUserId($idEtudiant) {
        $conn = MySqlDb::getPdoDb();
        $sql = "SELECT * FROM trajet WHERE idEtudiant = :idEtudiant";
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

    public static function getPlacesDisponibles($idTrajet) {
        $conn = MySqlDb::getPdoDb();
        $sql = "SELECT places FROM trajet WHERE id = :idTrajet";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idTrajet', $idTrajet);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result ? $result['places'] : 0;
    }

    
    public static function supprimerReservation($idtrajetreservation) {   
        $conn = MySqlDb::getPdoDb();
        $sql = "DELETE FROM reserver WHERE idTrajet = :idtrajetreservation";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idtrajetreservation', $idtrajetreservation);
        $stmt->execute();
        $conn2 = MySqlDb::getPdoDb();
        $sql2 = "UPDATE trajet SET places = places + 1 WHERE id = :idtrajetreservation";
        $stmt2 = $conn2->prepare($sql2);
        $stmt2->bindParam(':idtrajetreservation', $idtrajetreservation);
        $stmt2->execute();
        
    }

    public static function getNbPlace($idTrajet) {
        $conn = MySqlDb::getPdoDb();
        $sql = "SELECT places FROM trajet WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $idTrajet);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public static function updateNbPlace($idTrajet) {
        $conn = MySqlDb::getPdoDb();
        $sql = "UPDATE trajet SET places = places - 1 WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $idTrajet);
        return $stmt->execute();
    }

    public static function recupererplacereserve($idTrajet){
        $conn = MySqlDb::getPdoDb();
        $sql = "UPDATE trajet SET places = places + 1 WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $idTrajet);
        return $stmt->execute();
    }
}
?>

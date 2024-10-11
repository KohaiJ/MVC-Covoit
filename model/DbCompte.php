<?php
require_once "MysqlDb.php";

class DbCompte {
    // Récupérer les informations du compte via l'email
    public static function getCompteByEmail($email) {
        $conn = MySqlDb::getPdoDb(); // Connexion à la base de données
        $sql = "SELECT * FROM etudiant WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC); // Retourne les infos du compte
    }

    // Méthode pour mettre à jour le statut de la voiture de l'étudiant
    public static function updateVoitureStatus($email, $possede_voiture) {
        // Connexion à la base de données
        $conn = MySqlDb::getPdoDb();
        
        // Requête pour mettre à jour la colonne 'vehicule' de l'étudiant
        $sql = "UPDATE etudiant SET vehicule = :vehicule WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $vehicule = ($possede_voiture === 'oui') ? true : false;

        // Lier les paramètres
        $stmt->bindParam(':vehicule', $vehicule, PDO::PARAM_BOOL);
        $stmt->bindParam(':email', $email);
        
        // Exécuter la requête
        return $stmt->execute(); // Renvoie vrai si la mise à jour a réussi, faux sinon
    }

    public static function getVoituresByIdEtudiant($idEtudiant) {
        $conn = MySqlDb::getPdoDb();
        $sql = "SELECT * FROM voiture WHERE idEtudiant = :idEtudiant";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idEtudiant', $idEtudiant);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retourne toutes les voitures de l'étudiant
    }

    public static function supprimerVoiture($idVoiture) {
        $conn = MySqlDb::getPdoDb();
        $sql = "DELETE FROM voiture WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $idVoiture);
        return $stmt->execute(); // Renvoie vrai si la suppression a réussi, faux sinon
    }
    
}

?>

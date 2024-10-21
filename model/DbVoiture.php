<?php
require_once "MysqlDb.php";

class DbVoiture {
    // Récupérer l'ID de l'étudiant à partir de l'email
    public static function getIdEtudiantByEmail($email) {
        $conn = MySqlDb::getPdoDb();
        $sql = "SELECT id FROM etudiant WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $row['id'] : null; // Retourne l'ID ou null si non trouvé
    }

    public static function getVoituresByIdEtudiant($idEtudiant) {
        $conn = MySqlDb::getPdoDb();
        $sql = "SELECT * FROM voiture WHERE idEtudiant = :idEtudiant";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idEtudiant', $idEtudiant);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retourne toutes les voitures trouvées
    }
     
    
    // Méthode pour ajouter une voiture à la base de données
    public static function ajouterVoiture($idEtudiant, $marque, $modele, $nbPlace) {
        $conn = MySqlDb::getPdoDb();
        $sql = "INSERT INTO voiture (idEtudiant, marque, modele, nbPlace) VALUES (:idEtudiant, :marque, :modele, :nbPlace)";
        $stmt = $conn->prepare($sql);
        
        // Lier les paramètres
        $stmt->bindParam(':idEtudiant', $idEtudiant);
        $stmt->bindParam(':marque', $marque);
        $stmt->bindParam(':modele', $modele);
        $stmt->bindParam(':nbPlace', $nbPlace);
        
        // Exécuter la requête
        return $stmt->execute(); // Renvoie vrai si l'ajout a réussi, faux sinon
    }
    
}
?>

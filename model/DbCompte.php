<?php
require_once "MysqlDb.php";

class DbCompte {
    
    // Méthode pour mettre à jour le statut de la voiture de l'étudiant
    public static function updateVoitureStatus($email, $possede_voiture) {
        // Connexion à la base de données
        $conn = MySqlDb::getPdoDb();
        
        // Requête pour mettre à jour la colonne 'vehicule' de l'étudiant
        $sql = "UPDATE etudiant SET vehicule = :vehicule WHERE email = :email";
        $stmt = $conn->prepare($sql);
        
        // Lier les paramètres (vehicule est soit 1 soit 0)
        $stmt->bindParam(':vehicule', $possede_voiture, PDO::PARAM_INT);
        $stmt->bindParam(':email', $email);
        
        // Exécuter la requête
        return $stmt->execute(); // Renvoie vrai si la mise à jour a réussi, faux sinon
    }
}
?>

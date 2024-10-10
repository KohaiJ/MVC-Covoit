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
        
        // Convertir 'oui' ou 'non' en vrai/faux
        $vehicule = ($possede_voiture === 'oui') ? true : false;

        // Lier les paramètres
        $stmt->bindParam(':vehicule', $vehicule, PDO::PARAM_BOOL);
        $stmt->bindParam(':email', $email);
        
        // Exécuter la requête
        return $stmt->execute(); // Renvoie vrai si la mise à jour a réussi, faux sinon
    }
}
?>

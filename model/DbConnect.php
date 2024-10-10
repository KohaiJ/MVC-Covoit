<?php
require_once "MysqlDb.php";


class DbConnect {


    public static function verifLogin($email, $pwd) {
        // Connexion à la base de données
        $conn = MySqlDb::getPdoDb();
        
        // Requête pour obtenir les informations de l'utilisateur (y compris le mot de passe haché)
        $sql = "SELECT nom, mdp FROM etudiant WHERE email = :email"; // 'nom' correspond au champ du nom dans votre base de données
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        // Vérification si l'utilisateur existe
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashedPassword = $row['mdp'];
            $nom = $row['nom'];  // Récupérer le nom de l'utilisateur
            
            // Vérification du mot de passe avec password_verify
            if (password_verify($pwd, $hashedPassword)) {
                return [
                    'success' => true,
                    'nom' => $nom 
                    'email' => $email 
                    // Retourner le nom si la connexion est réussie
                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'Mot de passe incorrect'
                ];
            }
        } else {
            return [
                'success' => false,
                'message' => 'Utilisateur non trouvé'
            ];
        }
    }
    

	    public static function hachermdp($mdp){



	    }
		


        // Vérifie si l'utilisateur existe dans la base de données
    public static function checkUserExists($email) {
            $conn = MySqlDb::getPdoDb(); // Connexion à la base de données
            $sql = "SELECT * FROM etudiant WHERE email = :email"; // Vérifie si l'email existe
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
    
            // Retourne vrai si l'utilisateur existe
            return $stmt->rowCount() > 0;
    }
    
        // Génère un mot de passe aléatoire
    public static function generateRandomPassword($length = 8) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $password = '';
            for ($i = 0; $i < $length; $i++) {
                $password .= $characters[rand(0, strlen($characters) - 1)];
            }
            return $password;
    }
    
        // Met à jour le mot de passe de l'utilisateur dans la base de données
    public static function updatePassword($email, $hashedPassword) {
            $conn = MySqlDb::getPdoDb(); // Connexion à la base de données
            $sql = "UPDATE etudiant SET mdp = :hashedPassword WHERE email = :email"; // Mise à jour du mot de passe
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':hashedPassword', $hashedPassword); // Le mot de passe haché
            $stmt->bindParam(':email', $email);
            $stmt->execute();
    }
}
    
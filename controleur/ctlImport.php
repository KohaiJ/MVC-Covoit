<?php
include './model/DbConnect.php';
require_once "./model/MysqlDb.php";

$action = $_GET['action'];

switch ($action) {
    case 'afficherImport':
        // Inclure la vue d'import
        include 'vue/vueImport/v_form_import.php';
        break;

    case 'traiter':
        // Vérifier si le fichier a été téléchargé avec succès
        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK && $_FILES['file']['name'] === 'etudiants.csv') {
            $file = $_FILES['file']['tmp_name'];

            // Vérifier que le fichier est au format CSV
            if (pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION) !== 'csv') {
                die("Le fichier doit être au format CSV.");
            }

            // Ouvrir le fichier CSV
            $handle = fopen($file, "r");
            if ($handle === FALSE) {
                die("Erreur lors de l'ouverture du fichier.");
            }

            $students = [];
            $students2 = [];
            $message = '';

            // Lire les lignes du fichier CSV
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // Vérifier que la ligne contient suffisamment de données
                if (count($data) < 5) {
                    continue; // Passer à la ligne suivante si les données sont insuffisantes
                }

                // Générer un mot de passe aléatoire pour chaque étudiant
                $password = DbConnect::generateRandomPassword(); // Mot de passe aléatoire
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                $codetest = $data[3]; // S'assurer que le code est à la bonne position

                // Préparer l'insertion dans le tableau des étudiants
                

                $conn = MySqlDb::getPdoDb();
                $sql1 = "SELECT * FROM etudiant WHERE code = :codetest";
                $stmtCheck = $conn->prepare($sql1);
                $stmtCheck->bindValue(':codetest', $codetest, PDO::PARAM_STR);
                $stmtCheck->execute();
                $resultCheck = $stmtCheck->fetchAll(PDO::FETCH_ASSOC);

                if (count($resultCheck) == 0) {


                  $students[] = [
                    'code' => $codetest,
                    'nom' => $data[0],
                    'prenom' => $data[1],
                    'email' => $data[2],
                    'classe' => $data[4],
                    'mdp' => $hashedPassword,
                    'mdp_clair' => $password
                  ];
                    // Insertion dans la base de données
                    $sql = "INSERT INTO etudiant (id, code, nom, prenom, email, classe, mdp, vehicule, idvehicule, administrateur) 
                            VALUES (NULL, :code, :nom, :prenom, :email, :classe, :mdp, 0, 0, NULL)";
                    $stmt = $conn->prepare($sql);
                    if ($stmt->execute([
                        'code' => $codetest,
                        'nom' => $data[0],
                        'prenom' => $data[1],
                        'email' => $data[2],
                        'classe' => $data[4],
                        'mdp' => $hashedPassword
                    ])) {
                        //$message .= "Étudiant $data[1] $data[0] ajouté avec succès.<br>";
                        $students2[] = $data;
                    }
                }
                
            }
            

            fclose($handle);
            if (count($students2) > 0) {
              // Afficher les étudiants dans la vue
              include 'vue/vueImport/v_form_import.php';
            }
            else
            {
              echo "<center>Aucun étudiant ajouté</center>";
            }
        } else {
            die("<center>Erreur lors du téléchargement du fichier.</center>");
        }
        break;

    default:
        die("Action non reconnue.");
}
?>

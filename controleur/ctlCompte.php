<?php
include './model/DbConnect.php';
include './model/DbCompte.php';
$action =$_GET['action'];
switch($action){
		

			case 'compte':
                include 'vue/vueCompte/v_form_compte.php';
            break;

            


            case 'updateVoiture' :
                $email = $_SESSION['email']; // Vérifiez que cette ligne récupère bien l'email de l'utilisateur.
            if (empty($email)) {
            echo "Erreur : l'email n'est pas défini dans la session.";
            return;
            }
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Récupérer l'email de l'utilisateur depuis la session
                    $email = $_SESSION['email']; // Assurez-vous que l'email est stocké dans la session
                    $voiture = isset($_POST['voiture']) && $_POST['voiture'] == 'oui' ? 1 : 0; // Convertit "oui" en 1, "non" en 0
        
                    // Appeler la méthode du modèle DbCompte pour mettre à jour la voiture
                    require_once 'model/DbCompte.php';
                    $result = DbCompte::updateVoitureStatus($email, $voiture);
        
                    // Retourner un message en fonction du résultat de la mise à jour
                    if ($result) {
                        echo "Le statut de la voiture a été mis à jour.";
                    } else {
                        echo "Erreur lors de la mise à jour du statut de la voiture.";
                    }
                }
                break;
          
}
                

                
              

?>
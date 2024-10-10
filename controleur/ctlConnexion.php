<?php
include './model/DbConnect.php';
$action =$_GET['action'];
switch($action){
		

			case 'connexion':
				// Affiche le formulaire de connexion
				include 'vue/vueConnexion/v_form_connexion.php';
			break;
	
			case 'deconnecter':
				session_destroy();
				unset($_SESSION['connect']);
				header('Location: index.php');
	
			break;
			
			case 'veriflogin':
				$email = $_POST['myEmail'];
				$pwd = $_POST['myPassword'];
			
				// Appel à la fonction verifLogin de DbConnect du modèle
				$tabresult = DbConnect::verifLogin($email, $pwd);
			
				if ($tabresult['success'] == true) {
					// Si les identifiants sont corrects, on crée une session et redirige
					$_SESSION['connect'] = true;
					$_SESSION['email'] = $email;
					$_SESSION['nom'] = $tabresult['nom']; // Stocke le nom de l'utilisateur dans la session
			
					header('Location: index.php'); // Redirection vers la page principale
					exit();
				} else {
					// Si les identifiants sont incorrects, afficher le formulaire avec un message d'erreur
					session_destroy();
					unset($_SESSION['connect']);
			
					// Définit une variable d'erreur basée sur le message retourné par verifLogin
					$erreur = $tabresult['message'];
					include 'vue/vueConnexion/v_form_connexion.php';
				}
				break;	
			

			case 'forgotpassword' :
				if (isset($_POST['recoverEmail'])) {
					$email = $_POST['recoverEmail']; 
					$userexistance = DbConnect::checkUserExists($email);

					if ($userexistance) {

						$newpassword = DbConnect::generateRandomPassword();
						
						$hashedPassword = password_hash($newpassword, PASSWORD_BCRYPT);

						DbConnect::updatepassword($email, $hashedPassword);
						echo"<center>Votre mot de passe est : $newpassword</center>";
					} else {
						echo"<center>Aucun compte trouvé pour cette adresse e-mail</center>";
					}
				}
			break;

			


					
			
}
?>
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
					
					//appel à la fonction verifLogin de Dbconnect du modele
					$tabresult = DbConnect::verifLogin($email,$pwd);
				
					if($tabresult==true){
						$_SESSION['connect'] =true;
						$_SESSION['email'] =$email;
						header('Location: index.php');
						$_SESSION['nom'] = $tabresult['nom'];


					}
					else
					{
						session_destroy();
						unset($_SESSION['connect']);
						
			
					echo"<center>Identifiant ou mot de passe incorrect</center>";
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
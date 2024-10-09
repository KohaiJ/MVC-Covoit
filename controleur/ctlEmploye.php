<?php
include './model/DbEmploye.php';

$action =$_GET['action'];

switch($action){
		
		
			case 'fiche':
			
			//récuperation de l'id de l'url
				$id = $_GET['id'];
				
			 //appel à la base de donnée le modele
				$data = DbEmploye::getUnEmploye($id);
			 
			 //appel à la vue
			 include 'vue/vueEmploye/v_ficheEmployes.php';
			 
			 break;
			 
			case 'lister':
			 //appel à la base de donnée le modele
				$data = DbEmploye::getAllEmploye();
			 
			 //appel à la vue
			 include 'vue/vueEmploye/v_listeEmployes.php';
			 
			 break;
			 
			 case 'supprimer':
				
				$id = $_GET['id'];
				//appel à la base de donnée le modele pour suppression 
				
				DbEmploye::deleteEmploye($id);
				
				//appel à la base de donnée le modele pour listage
				$data = DbEmploye::getAllEmploye();
				
				//appel à la vue
				include 'vue/vueEmploye/v_listeEmployes.php';
			
			break;
				
		}

?>
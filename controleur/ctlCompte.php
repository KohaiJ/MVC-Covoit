<?php
include './model/DbConnect.php';
$action =$_GET['action'];
switch($action){
		

			case 'compte':
                include 'vue/vueCompte/v_form_compte.php';


            

            case 'updatevoiture' :
              
}
?>
<?php
include './model/DbTrajet.php';
date_default_timezone_set('Europe/Paris'); 

$action = $_GET['action'];

switch ($action) {
    case 'recherche':
        include 'vue/vueTrajet/v_form_trajet.php';
        break;

    case 'chercher':
        $depart = $_POST['depart'];
        $arrivee = $_POST['arrivee'];
        $date = $_POST['date'];
        $heureActuelle = date('H:i');
        $trajets = DbTrajet::chercherTrajets($depart, $arrivee, $date, $heureActuelle);

        include 'vue/vueTrajet/v_resultat_trajet.php'; // Crée un fichier pour afficher les résultats
        break;
    
    case 'ajouterTrajet':
        include 'vue/vueTrajet/v_form_ajoute_trajet.php';
        break;

    case 'trajetvalide':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les valeurs du formulaire
            $lieu_depart = $_POST['LieuDepart'];
            $lieu_arrive = $_POST['LieuArrive'];
            $jour = $_POST['DateTrajet'];
            $heure_depart = $_POST['heureDepart'];
            $id = $_SESSION['id'];   

            // Appeler la méthode pour ajouter le trajet
            $result = DbTrajet::ajouterTrajet($lieu_depart, $lieu_arrive, $jour, $heure_depart, $id);

            // Afficher un message en fonction du résultat
            if ($result) {
                echo "<center>Le trajet a été ajouté avec succès.</center>";
                include 'vue/vueTrajet/v_form_ajoute_trajet.php';
            } else {
                echo "<center>Erreur lors de l'ajout du trajet.</center>";
            }
        } else {
            // Rediriger ou afficher un message d'erreur si la méthode n'est pas POST
            echo "<center>Veuillez soumettre le formulaire.</center>";
        }
        break;

    default:
        // Rediriger vers une page par défaut ou une erreur
        include 'vue/v_form_trajet.php';
        break;
}
?>

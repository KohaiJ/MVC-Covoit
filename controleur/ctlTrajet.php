<?php
include './model/DbTrajet.php';
include './model/DbVoiture.php'; // Ajoutez l'importation de DbVoiture
date_default_timezone_set('Europe/Paris'); 

$action = $_GET['action'];

switch ($action) {
    case 'recherche':
        include 'vue/vueTrajet/v_form_trajet.php';
        break;

    case 'chercher':
        $depart = $_POST['depart'];
        $arrivee = $_POST['arrive'];
        $date = date('Y-m-d');
        $heureActuelle = date('H:i');
        $trajets = DbTrajet::chercherTrajets($depart, $arrivee, $date, $heureActuelle);
        include 'vue/vueTrajet/v_resultat_trajet.php';
        break;

    case 'ajouterTrajet':
        $idEtudiant = $_SESSION['id'];
        $voitures = DbVoiture::getVoituresByIdEtudiant($idEtudiant);
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
            $idVoiture = $_POST['voiture']; // Récupérer l'id de la voiture sélectionnée
    
            // Appeler la méthode pour ajouter le trajet
            $result = DbTrajet::ajouterTrajet($lieu_depart, $lieu_arrive, $jour, $heure_depart, $id, $idVoiture); // Mettez à jour cette méthode
    
            // Afficher un message en fonction du résultat
            if ($result) {
                echo "<center>Le trajet a été ajouté avec succès.</center>";
                include 'vue/vueTrajet/v_form_ajoute_trajet.php';
            } else {
                echo "<center>Erreur lors de l'ajout du trajet.</center>";
            }
        } else {
            echo "<center>Veuillez soumettre le formulaire.</center>";
        }
        break;
        
}
?>

<?php
// Assurez-vous que $trajet contient toutes les informations nécessaires, y compris les détails de la voiture
setlocale(LC_TIME, 'fr_FR.UTF-8', 'fra');
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="index.php?ctl=trajet&action=resultatRecherche" class="btn btn-outline-primary">
            <i class="bi bi-arrow-left me-2"></i>Retour aux résultats
        </a>
        <h2 class="text-primary fw-bold mb-0">Détails du covoiturage</h2>
        <div style="width: 100px;"></div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Première carte -->
            <div class="card shadow-sm border-0 rounded-3 mb-4">
                <div class="card-header bg-primary text-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0 fw-bold">
                            <i class="bi bi-person-circle me-2"></i>
                            <?php echo htmlspecialchars($trajet['nomEtudiant']); ?>
                        </h5>
                        <span class="badge bg-light text-primary rounded-pill px-3 py-2">
                            <i class="bi bi-person-fill me-1"></i>
                            <?php echo htmlspecialchars($trajet['places']); ?> place(s)
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Événement et date -->
                    <p class="card-text mb-4 text-center">
                        <i class="bi bi-calendar3 me-2"></i>
                        <?php echo strftime('%A %d %B %Y à %H:%M', strtotime($trajet['DateTrajet'])); ?>
                    </p>

                    <!-- Trajet avec ligne en pointillé et voiture -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="text-center">
                            <p class="mb-0 text-muted"><?php echo $trajet['heureDepart']; ?></p>
                            <h6 class="fw-bold"><?php echo htmlspecialchars($trajet['LieuDepart']); ?></h6>
                        </div>
                        <div class="flex-grow-1 mx-3 position-relative">
                            <hr class="border-top border-2 border-primary" style="border-style: dashed !important;">
                            <i class="bi bi-car-front position-absolute top-50 start-50 translate-middle text-primary" style="font-size: 1.5rem;"></i>
                        </div>
                        <div class="text-center">
                            <!-- <p class="mb-0 text-muted"><?php echo $trajet['heureArrivee']; ?></p> -->
                            <h6 class="fw-bold"><?php echo htmlspecialchars($trajet['LieuArrive']); ?></h6>
                        </div>
                    </div>

                    <!-- Informations sur la voiture -->
                    <div class="mt-4 bg-light p-3 rounded-3">
                        <h6 class="text-primary"><i class="bi bi-car-front me-2"></i>Véhicule :</h6>
                        <?php if (isset($trajet['voiture'])): ?>
                            <p class="ms-4 mb-1">Marque : <?php echo htmlspecialchars($trajet['voiture']['marque']); ?></p>
                            <p class="ms-4 mb-1">Modèle : <?php echo htmlspecialchars($trajet['voiture']['modele']); ?></p>
                        <?php else: ?>
                            <p class="ms-4 mb-1">Aucune information sur le véhicule disponible.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <!-- Deuxième carte -->
            <div class="card shadow-sm border-0 rounded-3 mb-4">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="card-title mb-0 fw-bold">Informations supplémentaires</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Ajoutez ici les informations supplémentaires que vous souhaitez afficher.</p>
                    <!-- Exemple de contenu -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="mb-3">
                                <label for="placesSelect" class="form-label fw-bold">Nombre de places souhaité :</label>
                                <select id="placesSelect" class="form-select shadow-sm">
                                    <?php for ($i = 1; $i <= $trajet['places']; $i++): ?>
                                        <option value="<?= $i ?>"><?= $i ?> place<?= $i > 1 ? 's' : '' ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <h6 class="fw-bold">Ce que le conducteur accepte :</h6>
                            <br>
                            <div class="d-flex justify-content-around">
                                <?php if ($trajet['cigarette']): ?>
                                    <div class="text-center">
                                        <i class="fas fa-smoking text-primary"></i>
                                        <p class="mb-0">Cigarette</p>
                                    </div>
                                <?php endif; ?>
                                <?php if ($trajet['nourriture']): ?>
                                    <div class="text-center">
                                        <i class="fas fa-hamburger text-primary"></i>
                                        <p class="mb-0">Nourriture</p>
                                    </div>
                                <?php endif; ?>
                                <?php if ($trajet['musique']): ?>
                                    <div class="text-center">
                                        <i class="fas fa-music text-primary"></i>
                                        <p class="mb-0">Musique</p>
                                    </div>
                                <?php endif; ?>
                                <?php if ($trajet['bagage']): ?>
                                    <div class="text-center">
                                        <i class="fas fa-suitcase text-primary"></i>
                                        <p class="mb-0">Bagage</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <!-- Bouton de réservation -->
                            <?php if (isset($_SESSION['connect']) && $_SESSION['connect'] === true): ?>
                                <form action="index.php?ctl=reservations&action=reserver" method="POST">
                                    <input type="hidden" name="idTrajet" value="<?php echo $trajet['id']; ?>">
                                    <input type="hidden" name="nbPlaces" id="nbPlaces" value="1">
                                    <button type="submit" class="btn btn-primary w-100 mt-2">
                                        <i class="bi bi-check-circle me-2"></i>Réserver ce covoiturage
                                    </button>
                                </form>
                            <?php else: ?>
                                <div class="alert alert-info mt-2" role="alert">
                                    <i class="bi bi-info-circle me-2"></i>
                                    Tu dois être connecté pour réserver un covoiturage. 
                                    <a href="index.php?ctl=connexion&action=connexion" class="alert-link">Connecte-toi</a> ou 
                                    <a href="index.php?ctl=connexion&action=inscription" class="alert-link">crée ton compte</a> en quelques clics.
                                </div>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }
    .card:hover {
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        transform: translateY(-5px);
    }
    .card-header {
        background-color: #1e3a8a !important;
        color: white;
        border-radius: 15px 15px 0 0; /* Coins arrondis pour le haut de la carte */
    }
    .badge {
        font-size: 0.9rem;
        font-weight: 500;
    }
    .btn-primary, .bg-primary {
        background-color: #1e3a8a !important;
        border-color: #1e3a8a !important;
    }
    .btn-primary:hover, .btn-outline-primary:hover {
        background-color: #152c69 !important;
        border-color: #152c69 !important;
    }
    .btn-outline-primary {
        color: #1e3a8a !important;
        border-color: #1e3a8a !important;
    }
    .btn-outline-primary:hover {
        color: #ffffff !important;
    }
    .text-primary {
        color: #1e3a8a !important;
    }
    .border-primary {
        border-color: #1e3a8a !important;
    }
    .form-select {
        border-radius: 0.5rem;
        border-color: #1e3a8a;
    }
    .form-select:focus {
        box-shadow: 0 0 5px rgba(30, 58, 138, 0.5);
    }
    .bg-light {
        background-color: #fff !important; /* Fond blanc pour les sections */
    }
</style>

<script>
window.addEventListener('pageshow', function(event) {
    if (event.persisted) {
        window.location.reload();
    }
});
</script>


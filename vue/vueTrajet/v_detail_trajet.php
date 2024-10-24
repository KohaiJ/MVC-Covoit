<?php
// Assurez-vous que $trajet contient toutes les informations nécessaires, y compris les détails de la voiture
setlocale(LC_TIME, 'fr_FR.UTF-8', 'fra');
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="index.php?ctl=trajet&action=resultatRecherche" class="btn btn-outline-primary">
            <i class="bi bi-arrow-left me-2"></i>Retour aux résultats
        </a>
        <h2 class="text-primary fw-bold mb-0">Détails du covoiturage</h2>
        <div style="width: 100px;"></div> <!-- Élément vide pour équilibrer la mise en page -->
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
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
                        <strong class="text-primary"><?php echo htmlspecialchars($trajet['evenement']); ?></strong><br>
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
                            <p class="mb-0 text-muted"><?php echo $trajet['heureArrivee']; ?></p>
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

                    <!-- Bouton de réservation -->
                    <?php if (isset($_SESSION['connect']) && $_SESSION['connect'] === true): ?>
                        <a href="index.php?ctl=reservation&action=reserver&id=<?php echo $trajet['id']; ?>" class="btn btn-primary w-100 mt-4">
                            <i class="bi bi-check-circle me-2"></i>Réserver ce covoiturage
                        </a>
                    <?php else: ?>
                        <div class="alert alert-info mt-4" role="alert">
                            <i class="bi bi-info-circle me-2"></i>
                            Tu dois être connecté pour réserver un covoiturage. 
                            <a href="index.php?ctl=connexion&action=connexion" class="alert-link">Connecte-toi</a> ou 
                            <a href="index.php?ctl=connexion&action=inscription" class="alert-link">crée ton compte</a> en quelques clics.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        transition: box-shadow 0.3s ease;
    }
    .card:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
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
</style>

<script>
window.addEventListener('pageshow', function(event) {
    if (event.persisted) {
        window.location.reload();
    }
});
</script>


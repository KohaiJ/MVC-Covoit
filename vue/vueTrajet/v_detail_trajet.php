<?php
// Assurez-vous que $trajet contient toutes les informations nécessaires, y compris les détails de la voiture
setlocale(LC_TIME, 'fr_FR.UTF-8', 'fra');
?>

<div class="container mt-5">
    <h2 class="text-center mb-5">Détails du covoiturage</h2>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border border-2 border-secondary rounded-lg mb-4">
                <div class="card-body">
                    <!-- Nom du conducteur et nombre de places -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-person-circle me-2"></i>
                            <?php echo htmlspecialchars($trajet['nomEtudiant']); ?>
                        </h5>
                        <span class="badge bg-dark text-white rounded-pill p-2">
                            <i class="bi bi-person-fill"></i>
                            <?php echo htmlspecialchars($trajet['places']); ?>
                        </span>
                    </div>

                    <!-- Événement et date -->
                    <p class="card-text mb-3 text-center">
                        <strong><?php echo htmlspecialchars($trajet['evenement']); ?></strong><br>
                        <?php echo strftime('%A %d %B %Y à %H:%M', strtotime($trajet['DateTrajet'])); ?>
                    </p>

                    <!-- Trajet avec ligne en pointillé et voiture -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <p class="mb-0"><?php echo $trajet['heureDepart']; ?></p>
                            <h6><?php echo htmlspecialchars($trajet['LieuDepart']); ?></h6>
                        </div>
                        <div class="flex-grow-1 mx-3 position-relative">
                            <hr class="border-top border-2 border-secondary" style="border-style: dashed !important;">
                            <i class="bi bi-car-front position-absolute top-50 start-50 translate-middle" style="font-size: 1.5rem;"></i>
                        </div>
                        <div>
                            <p class="mb-0"><?php echo $trajet['heureArrivee']; ?></p>
                            <h6><?php echo htmlspecialchars($trajet['LieuArrive']); ?></h6>
                        </div>
                    </div>

                    <!-- Informations sur la voiture -->
                    <div class="mt-3">
                        <h6><i class="bi bi-car-front me-2"></i>Véhicule :</h6>
                        <?php if (isset($trajet['voiture'])): ?>
                            <p class="ms-4 mb-1">Marque : <?php echo htmlspecialchars($trajet['voiture']['marque']); ?></p>
                            <p class="ms-4 mb-1">Modèle : <?php echo htmlspecialchars($trajet['voiture']['modele']); ?></p>
                        <?php else: ?>
                            <p class="ms-4 mb-1">Aucune information sur le véhicule disponible.</p>
                        <?php endif; ?>
                    </div>

                    <!-- Bouton de réservation -->
                    <?php if (isset($_SESSION['connect']) && $_SESSION['connect'] === true): ?>
                        <a href="index.php?ctl=reservation&action=reserver&id=<?php echo $trajet['id']; ?>" class="btn btn-dark w-100 mt-3">
                            <i class="bi bi-check-circle me-2"></i>Réserver ce covoiturage
                        </a>
                    <?php else: ?>
                        <p class="mt-3 text-center">Tu dois être connecté pour réserver un covoiturage. <a href="index.php?ctl=connexion&action=connexion">Connecte-toi</a> ou <a href="index.php?ctl=connexion&action=inscription">crée ton compte</a> en quelques clics.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

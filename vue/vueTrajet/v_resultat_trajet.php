<?php
// Configurer la locale en français
setlocale(LC_TIME, 'fr_FR.UTF-8', 'fra');

// Fonction pour mettre la première lettre en majuscule
function ucfirst_utf8($str) {
    if (mb_check_encoding($str, 'UTF-8')) {
        $firstChar = mb_substr($str, 0, 1, 'UTF-8');
        $then = mb_substr($str, 1, null, 'UTF-8');
        return mb_strtoupper($firstChar, 'UTF-8') . $then;
    }
    return $str;
}
?>


<div class="container mt-5">
    <h2 class="text-center mb-5">Résultats de la recherche</h2>
    <div class="row">
        <?php foreach ($trajets as $trajet) : ?>
        <div class="col-md-4 mb-4">
            <!-- Carte avec bordure plus épaisse et plus visible -->
            <div class="card shadow-lg border border-2 border-secondary rounded-lg">
                <div class="card-body">
                    <!-- Nom de l'étudiant et nombre de places -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">
                            <?php echo htmlspecialchars($trajet['nomEtudiant']); ?>
                        </h5>
                        <span class="badge bg-dark text-white rounded-pill p-2">
                            <i class="bi bi-person-fill"></i> <!-- Icône de personne (représentant un siège) -->
                            <?php echo htmlspecialchars($trajet['places']); ?>
                        </span>
                    </div>
                    
                    <!-- Date et heure du trajet -->
                    <p class="card-text mb-3 text-center">
                        <strong><?php echo mb_strtoupper(strftime('%A %d %B %Y', strtotime($trajet['DateTrajet']))); ?></strong>
                        <br>
                        <?php echo $trajet['heureDepart']; ?>
                    </p>
                    
                    <!-- Trajet avec ligne en pointillé et voiture -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span><?php echo ucfirst_utf8(htmlspecialchars($trajet['LieuDepart'])); ?></span>
                        <div class="flex-grow-1 mx-3 position-relative">
                            <hr class="border-top border-2 border-secondary" style="border-style: dashed !important;">
                            <i class="bi bi-car-front position-absolute top-50 start-50 translate-middle" style="font-size: 1.5rem;"></i>
                        </div>
                        <span><?php echo ucfirst_utf8(htmlspecialchars($trajet['LieuArrive'])); ?></span>
                    </div>
                    
                    <!-- Bouton pour voir les détails -->
                    <a href="index.php?ctl=reservation&action=reserverTrajet&id=<?= $trajet['id'] ?>" class="btn btn-dark w-100 mt-3">
                        <i class="bi bi-plus-circle me-2"></i>Voir le détail du covoiturage
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

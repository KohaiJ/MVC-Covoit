<?php
// Fonction pour mettre la première lettre en majuscule
function ucfirst_utf8($str) {
    if (mb_check_encoding($str, 'UTF-8')) {
        $firstChar = mb_substr($str, 0, 1, 'UTF-8');
        $then = mb_substr($str, 1, null, 'UTF-8');
        return mb_strtoupper($firstChar, 'UTF-8') . $then;
    }
    return $str;
}

// Fonction pour formater la date
function formatDate($date) {
    return date('d/m/Y', strtotime($date));
}
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">Mes Trajets</h2>
        <a href="index.php?ctl=trajet&action=ajouterTrajet" class="btn btn-outline-primary">
            <i class="bi bi-plus-lg"></i> Ajouter un trajet
        </a>
    </div>

    <?php if (!empty($trajets)): ?>
        <div class="row g-4">
            <?php foreach ($trajets as $trajet): ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 border-primary">
                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <span>
                                <i class="bi bi-geo-alt-fill"></i> 
                                <?php echo ucfirst_utf8(htmlspecialchars($trajet['LieuDepart'])); ?> 
                                <i class="bi bi-arrow-right"></i> 
                                <?php echo ucfirst_utf8(htmlspecialchars($trajet['LieuArrive'])); ?>
                            </span>
                            <a href="index.php?ctl=compteTrajets&action=supprimerTrajet&id=<?= $trajet['id'] ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce trajet ?');">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <i class="bi bi-calendar-event text-primary"></i> 
                                <?php echo formatDate($trajet['DateTrajet']); ?> à 
                                <?php echo htmlspecialchars($trajet['heureDepart']); ?>
                            </p>
                            <p class="card-text">
                                <i class="bi bi-people-fill text-primary"></i> 
                                <?php echo htmlspecialchars($trajet['places']); ?> place(s) disponible(s)
                            </p>
                            <?php if (isset($trajet['marque']) && isset($trajet['modele'])): ?>
                                <p class="card-text">
                                    <i class="bi bi-car-front-fill text-primary"></i> 
                                    <?php echo ucfirst_utf8(htmlspecialchars($trajet['marque'])) . ' ' . ucfirst_utf8(htmlspecialchars($trajet['modele'])); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center" role="alert">
            <i class="bi bi-info-circle-fill me-2"></i>
            Vous n'avez aucun trajet enregistré pour le moment.
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

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
    <div class="position-relative mb-4">
        <h2 class="text-center">Mes Trajets</h2>
        <a href="index.php?ctl=trajet&action=ajouterTrajet" class="btn btn-dark position-absolute top-50 end-0 translate-middle-y">
            <i class="bi bi-plus-lg"></i> Ajouter un trajet
        </a>
    </div>

    <?php if (!empty($trajets)): ?>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-4">
            <?php foreach ($trajets as $trajet): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm position-relative">
                        <a href="index.php?ctl=compteTrajets&action=supprimerTrajet&id=<?= $trajet['id'] ?>" 
                           class="btn btn-danger btn-sm position-absolute top-0 end-0 m-2"
                           onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce trajet ?');">
                            <i class="fas fa-trash"></i>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="bi bi-geo-alt-fill text-dark"></i> 
                                <?php echo ucfirst_utf8(htmlspecialchars($trajet['LieuDepart'])); ?> 
                                <i class="bi bi-arrow-right"></i> 
                                <?php echo ucfirst_utf8(htmlspecialchars($trajet['LieuArrive'])); ?>
                            </h5>
                            <p class="card-text">
                                <i class="bi bi-calendar-event"></i> 
                                <?php echo formatDate($trajet['DateTrajet']); ?> à 
                                <?php echo htmlspecialchars($trajet['heureDepart']); ?>
                            </p>
                            <p class="card-text">
                                <i class="bi bi-people-fill"></i> 
                                <?php echo htmlspecialchars($trajet['places']); ?> place(s) disponible(s)
                            </p>
                            <?php if (isset($trajet['marque']) && isset($trajet['modele'])): ?>
                                <p class="card-text">
                                    <i class="bi bi-car-front-fill"></i> 
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

<?php
// Configurer la locale en français
setlocale(LC_TIME, 'fr_FR.UTF-8', 'fra');

// Fonction pour mettre la première lettre en majuscule
function ucfirst_utf8($str) {
    return mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
}
?>


<div class="container mt-5">
    <h2 class="text-center mb-5 fw-bold">Résultats de la recherche</h2>
    <div class="row g-4">
        <?php foreach ($trajets as $trajet) : ?>
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
                <div class="card-header bg-primary text-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0 fw-bold">
                            <?php echo htmlspecialchars($trajet['nomEtudiant']); ?>
                        </h5>
                        <span class="badge bg-light text-primary rounded-pill px-3 py-2">
                            <i class="bi bi-person-fill me-1"></i>
                            <?php echo htmlspecialchars($trajet['places']); ?> place(s)
                        </span>
                    </div>
                </div>
                <div class="card-body d-flex flex-column">
                    <p class="card-text text-center mb-4">
                        <i class="bi bi-calendar3 me-2"></i>
                        <strong><?php echo ucfirst_utf8(strftime('%A %d %B %Y', strtotime($trajet['DateTrajet']))); ?></strong>
                        <br>
                        <i class="bi bi-clock me-2"></i>
                        <?php echo $trajet['heureDepart']; ?>
                    </p>
                    
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="text-start">
                            <small class="text-muted">Départ</small>
                            <p class="mb-0 fw-bold"><?php echo ucfirst_utf8(htmlspecialchars($trajet['LieuDepart'])); ?></p>
                        </div>
                        <i class="bi bi-arrow-right text-primary fs-4"></i>
                        <div class="text-end">
                            <small class="text-muted">Arrivée</small>
                            <p class="mb-0 fw-bold"><?php echo ucfirst_utf8(htmlspecialchars($trajet['LieuArrive'])); ?></p>
                        </div>
                    </div>
                    
                    <a href="index.php?ctl=trajet&action=detailTrajet&id=<?= $trajet['id'] ?>" class="btn btn-outline-primary mt-auto">
                        <i class="bi bi-info-circle me-2"></i>Détails du trajet
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <h2>Résultats de la recherche</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Lieu de départ</th>
                <th>Lieu d'arrivée</th>
                <th>Date du trajet</th>
                <th>Heure de Départ</th>
                <th>Id du trajet</th>
                <th>Places disponibles</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trajets as $trajet): ?>
            <tr>
                <td><?php echo htmlspecialchars($trajet['LieuDepart']); ?></td>
                <td><?php echo htmlspecialchars($trajet['LieuArrive']); ?></td>
                <td><?php echo htmlspecialchars($trajet['DateTrajet']); ?></td>
                <td><?php echo htmlspecialchars($trajet['heureDepart']); ?></td>
                <td><?php echo htmlspecialchars($trajet['id']); ?></td>
                <td><?php echo htmlspecialchars($trajet['places']); ?></td>
                <td>
                    <a href="index.php?ctl=reservation&action=reserverTrajet&id=<?= htmlspecialchars($trajet['id']) ?>&idTrajetEtudiant=<?= htmlspecialchars($trajet['idEtudiant']) ?>" class="btn btn-primary">Réserver</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .badge {
        font-size: 0.9rem;
        font-weight: 500;
    }
    .btn-outline-primary {
        color: #1e3a8a;
        border-color: #1e3a8a;
    }
    .btn-outline-primary:hover {
        background-color: #1e3a8a;
        color: white;
    }
    .card-header {
        background-color: #1e3a8a !important;
    }
    .text-primary {
        color: #1e3a8a !important;
    }
</style>

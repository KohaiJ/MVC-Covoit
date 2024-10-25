<?php
// v_mes_reservations.php
?>

<div class="container mt-4">
    <h2 class="mb-4">Mes Réservations</h2>

    <?php if (empty($reservations)): ?>
        <div class="alert alert-info" role="alert">
            Vous n'avez aucune réservation pour le moment.
        </div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>ID du trajet</th>
                        <th>État de la réservation</th>
                        <th>Nombre de places</th>
                        <th>Départ</th>
                        <th>Arrivée</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservations as $reservation): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($reservation['idTrajet']); ?></td>
                            <td><?php echo htmlspecialchars($reservation['etatReservation']); ?></td>
                            <td><?php echo htmlspecialchars($reservation['nbPlaces']); ?></td>
                            <td><?php echo htmlspecialchars($reservation['LieuDepart']); ?></td>
                            <td><?php echo htmlspecialchars($reservation['LieuArrive']); ?></td>
                            <td><?php echo htmlspecialchars($reservation['DateTrajet']); ?></td>
                            <td>
                                <a href="index.php?ctl=trajet&action=detailTrajet&id=<?php echo $reservation['idTrajet']; ?>" class="btn btn-sm btn-info">Détails</a>
                                <?php if ($reservation['etatReservation'] == 'En attente'): ?>
                                    <a href="index.php?ctl=reservations&action=annulerReservation&id=<?php echo $reservation['idTrajet']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir annuler cette réservation ?');">Annuler</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<style>
    .table-primary {
        background-color: #1e3a8a;
        color: white;
    }
    .btn-info, .btn-danger {
        margin-right: 5px;
    }
</style>


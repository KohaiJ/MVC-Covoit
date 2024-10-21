<div class="container mt-5">
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
                    <a href="index.php?ctl=reservation&action=reserverTrajet&id=<?= $trajet['id'] ?>" class="btn btn-primary">Réserver</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

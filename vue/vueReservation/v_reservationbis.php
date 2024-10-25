
<?php if (!empty($reservationsencours)): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id Trajet</th>
                        <th>État</th>
                        <th>id Etudiant</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php var_dump($reservationsencours); ?>
                    <?php foreach ($reservationsencours as $reservation): ?>
                        <tr>
                            <td><?= htmlspecialchars($reservation['idTrajet']) ?></td>
                            <td><?= htmlspecialchars($reservation['etat']) ?></td>
                            <td><?= htmlspecialchars($reservation['idEtudiant']) ?></td>
                          
                            <td>
                                <?php if ($reservation['netat'] == 1): ?>
                                    <form method="post" action="index.php?ctl=gestionReservations&action=gererReservation" style="display: inline;">
                                        <input type="hidden" name="idReservation" value="<?= htmlspecialchars($reservation['idTrajet'], $reservation['idEtudiant']) ?>">
                                        <button type="submit" name="action" value="accepter" class="btn btn-success btn-sm">Accepter</button>
                                        <button type="submit" name="action" value="rejeter" class="btn btn-danger btn-sm">Rejeter</button>
                                    </form>
                                <?php else: ?>
                                    <span>Aucune action</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p><center>Aucune réservation pour ce trajet.</center></p>
        <?php endif; ?>
    </div>
</body>
</html>
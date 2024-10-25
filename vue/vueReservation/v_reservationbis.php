
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
                
                    <?php foreach ($reservationsencours as $reservation): ?>
                        <tr>
                            <td><?= htmlspecialchars($reservation['idTrajet']) ?></td>
                            <td><?= htmlspecialchars($reservation['etat']) ?></td>
                            <td><?= htmlspecialchars($reservation['idEtudiant']) ?></td>
                          
                            <td>
                            <?php if (!empty($reservationsencours)): ?>
                                <form id="reservationForm" method="post">
                                    <input type="hidden" name="idEtudiant" value="<?= htmlspecialchars($reservation['idEtudiant']) ?>">
                                    <input type="hidden" name="idTrajet" value="<?= htmlspecialchars($reservation['idTrajet']) ?>">

                                    <!-- Bouton pour rejeter la réservation, qui définit une action spécifique -->
                                     <button type="submit" name="action" value="rejeter" 
                                            onclick="document.getElementById('reservationForm').action = 'index.php?ctl=gestionReservations&action=gererReservationrefusees'" 
                                            class="btn btn-danger btn-sm">Rejeter</button>
        
                                    <!-- Bouton pour accepter la réservation, qui définit une autre action -->
                                    <button type="submit" name="action" value="accepter" 
                                            onclick="document.getElementById('reservationForm').action = 'index.php?ctl=gestionReservations&action=gererReservationacceptees'" 
                                            class="btn btn-success btn-sm">Accepter</button>
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
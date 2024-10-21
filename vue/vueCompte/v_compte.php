<div class="container mt-5">
    <h3 class="mb-3">Informations du Compte</h3>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Détails du compte</h5>
            <p><strong>Nom :</strong> <?= htmlspecialchars($compte['nom']) ?></p>
            <p><strong>Prénom :</strong> <?= htmlspecialchars($compte['prenom']) ?></p>
            <p><strong>Email :</strong> <?= htmlspecialchars($compte['email']) ?></p>
            <p><strong>Classe :</strong> <?= htmlspecialchars($compte['classe']) ?></p>
            <p><strong>Possède une voiture :</strong> <?= $compte['vehicule'] ? 'Oui' : 'Non' ?></p>
            <?php if (isset($_SESSION['connect']) && $_SESSION['connect'] === true): ?>
                <a href="index.php?ctl=connexion&action=vuechangepasswd" class="btn btn-primary">
                    Changer votre mot de passe
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php if (empty($voitures)): ?>
<div class="container mt-5">
    <h3 class="mb-3">Possédez-vous une voiture ?</h3>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="index.php?ctl=compte&action=compte" class="mt-3">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="oui" name="possede_voiture" value="oui" <?= $compte['vehicule'] ? 'checked' : '' ?> required>
                    <label class="form-check-label" for="oui">Oui</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="non" name="possede_voiture" value="non" <?= !$compte['vehicule'] ? 'checked' : '' ?> required>
                    <label class="form-check-label" for="non">Non</label>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Enregistrer</button>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if (!empty($voitures)): ?>
<div class="container mt-5">
    <h3 class="mb-3">Informations des Voitures</h3>
    <div class="row">
        <?php foreach ($voitures as $voiture): ?>
            <div class="col-md-4 mb-3">
                <div class="card position-relative">
                    <a href="index.php?ctl=compte&action=supprimerVoiture&id=<?= $voiture['id'] ?>"
                       class="btn btn-danger btn-sm position-absolute"
                       style="top: 10px; right: 10px;"
                       onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette voiture ?');">
                        <i class="fas fa-trash"></i>
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><strong>Marque :</strong> <?= htmlspecialchars($voiture['marque']) ?></h5>
                        <p class="card-text"><strong>Modèle :</strong> <?= htmlspecialchars($voiture['modele']) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>

<?php if (!empty($trajets)): ?>
<div class="container mt-5">
    <h3 class="text-center mb-4">Informations des Trajets</h3>
    <!--<div class="d-flex justify-content-center">
        <div class="mx-2">
            <a href="index.php?ctl=compteTrajets&action=vuedestrajets" class="btn btn-primary btn-lg">
                Afficher vos trajets
            </a>
        </div>
        <div class="mx-2">
            <a href="index.php?ctl=compteTrajets&action=" class="btn btn-primary btn-lg">
                Afficher vos réservations
            </a>
        </div>
    </div>-->
</div>
<?php endif; ?>

<?php if (!empty($trajets)): ?>
    <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Lieu de départ</th>
            <th>Lieu d'arrivée</th>
            <th>Date du trajet</th>
            <th>Heure de départ</th>
            <th>Places disponibles</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($trajets as $index => $trajet): ?>
            <tr style="background-color: <?php echo $index % 2 == 0 ? '#f2f2f2' : 'white'; ?>;">
                <td><?php echo htmlspecialchars($trajet['id']); ?></td>
                <td><?php echo htmlspecialchars($trajet['LieuDepart']); ?></td>
                <td><?php echo htmlspecialchars($trajet['LieuArrive']); ?></td>
                <td><?php echo htmlspecialchars($trajet['DateTrajet']); ?></td>
                <td><?php echo htmlspecialchars($trajet['heureDepart']); ?></td>
                <td><?php echo htmlspecialchars($trajet['places'] !== null ? $trajet['places'] : 'N/A'); ?></td>
              
                <td>
                <div class="card position-relative">
                    <a href="index.php?ctl=compteTrajets&action=supprimerTrajet&id=<?= $trajet['id'] ?>"
                       class="btn btn-danger position-absolute"
                       
                       onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce trajet ?');">
                        <i class="fas fa-trash"></i>
                    </a>
                    <div class="card-body">
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php else: ?>
    <p>Aucun trajet trouvé.</p>
<?php endif; ?>




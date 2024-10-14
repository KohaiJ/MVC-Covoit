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
            <strong>Mot de passe :</strong> 
            
<?php if (isset($_SESSION['connect']) && $_SESSION['connect'] === true): ?>
    <a href="index.php?ctl=connexion&action=vuechangepasswd" class="text-decoration-underline text-primary">
        Cliquez ici pour changer votre mot de passe
    </a>
<?php endif; ?>

            <!-- Ajouter d'autres informations si nécessaire -->
        </div>
    </div>
</div>

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

<div class="container mt-5">
    <h3 class="mb-3">Informations des Voitures</h3>
    <div class="row">
        <?php if (!empty($voitures)): ?>
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
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-warning" role="alert">
                    Aucune voiture enregistrée.
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

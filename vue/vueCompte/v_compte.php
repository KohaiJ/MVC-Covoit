<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte - Saint-Aspais Covoit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .profile-header {
            background: linear-gradient(135deg, #1e3a8a 0%, #3490dc 100%);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
        }
        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 5px solid white;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .btn-custom {
            background-color: #1e3a8a;
            color: white;
            border: none;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #152c69;
            color: white;
        }
        .vehicle-status {
            font-size: 1.2rem;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="profile-header">
    <div class="container text-center">
        <img src="https://via.placeholder.com/150" alt="Photo de profil" class="rounded-circle profile-img mb-3">
        <h1><?= htmlspecialchars($compte['prenom']) . ' ' . htmlspecialchars($compte['nom']) ?></h1>
        <p class="lead"><?= htmlspecialchars($compte['classe']) ?></p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Informations Personnelles</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-envelope me-2"></i><?= htmlspecialchars($compte['email']) ?></li>
                        <li><i class="fas fa-graduation-cap me-2"></i><?= htmlspecialchars($compte['classe']) ?></li>
                    </ul>
                    <a href="index.php?ctl=connexion&action=vuechangepasswd" class="btn btn-custom btn-sm w-100">
                        <i class="fas fa-key me-2"></i>Changer le mot de passe
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Statut du Véhicule</h5>
                    <p class="vehicle-status mb-4">
                        <?php if ($compte['vehicule']): ?>
                            <i class="fas fa-car me-2 text-success"></i>Vous possédez un véhicule
                        <?php else: ?>
                            <i class="fas fa-times-circle me-2 text-danger"></i>Vous ne possédez pas de véhicule
                        <?php endif; ?>
                    </p>
                    <form method="POST" action="index.php?ctl=compte&action=compte">
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="possede_voiture" name="possede_voiture" value="oui" <?= $compte['vehicule'] ? 'checked' : '' ?>>
                            <label class="form-check-label" for="possede_voiture">Je possède un véhicule</label>
                        </div>
                        <button type="submit" class="btn btn-custom">Mettre à jour le statut</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php if (!empty($voitures)): ?>
    <div class="row mt-4">
        <div class="col-12">
            <h3 class="mb-4">Mes Véhicules</h3>
        </div>
        <?php foreach ($voitures as $voiture): ?>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body position-relative">
                    <a href="index.php?ctl=compte&action=supprimerVoiture&id=<?= $voiture['id'] ?>"
                       class="btn btn-danger btn-sm position-absolute top-0 end-0 m-2"
                       onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce véhicule ?');">
                        <i class="fas fa-trash"></i>
                    </a>
                    <h5 class="card-title"><strong>Marque :</strong> <?= htmlspecialchars($voiture['marque']) ?></h5>
                    <p class="card-text"><strong>Modèle :</strong> <?= htmlspecialchars($voiture['modele']) ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>

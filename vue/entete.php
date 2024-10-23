<head>
  <!-- Meta tags nécessaires -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Lien vers le CSS de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- FontAwesome (si tu utilises les icônes) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <link rel="stylesheet" href="./style.css">
  
  <title>Covoiturage</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Covoiturage</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <!-- Vérification de la connexion de l'utilisateur -->
          <?php if (isset($_SESSION['connect']) && $_SESSION['connect'] === true): ?>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?ctl=trajet&action=recherche">Trajet</a>
            </li>
            <?php if (isset($_SESSION['vehicule']) && $_SESSION['vehicule'] == 1) : ?>
              <li class="nav-item">
                  <a class="nav-link" href="index.php?ctl=voiture&action=voiture">Ajouter Voiture</a>
              </li>
            <?php endif; ?>
            <?php if (isset($_SESSION['vehicule']) && $_SESSION['vehicule'] == 1) : ?>
              <li class="nav-item">
                  <a class="nav-link" href="index.php?ctl=trajet&action=ajouterTrajet">Ajouter Trajet</a>
              </li>
            <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?ctl=compte&action=compte">Compte</a>
            </li>
          <?php endif; ?>
          <?php if (isset($_SESSION['administrateur']) && $_SESSION['administrateur'] == 1) : ?> <!--A changer pour admin -->
            <li class="nav-item">
              <a class="nav-link" href="index.php?ctl=Import&action=afficherImport">Import(admin)</a>
            </li>
          <?php endif; ?>
        </ul>
        <!-- Affichage du nom de l'utilisateur connecté -->
        <ul class="navbar-nav ms-auto">
        <?php if (isset($_SESSION['nom'])): ?>
            <li class="nav-item">
              <a class="nav-link" href="#">Bonjour, <?php echo $_SESSION['nom']; ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?ctl=connexion&action=deconnecter">Déconnexion</a>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?ctl=connexion&action=connexion">Se connecter</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

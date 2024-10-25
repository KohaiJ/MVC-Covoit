<head>
  <!-- Meta tags nécessaires -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Lien vers le CSS de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  
  <link rel="stylesheet" href="./style.css">
  
  <title>Saint-Aspais Covoit</title>

  <style>
    .navbar {
      background-color: #1e3a8a !important;
      box-shadow: 0 2px 4px rgba(0,0,0,.1);
    }
    .navbar-brand, .nav-link {
      color: #ffffff !important;
      transition: color 0.3s ease;
    }
    .nav-link:hover {
      color: #ffd700 !important;
    }
    .navbar-toggler {
      border-color: rgba(255,255,255,0.5);
    }
    .navbar-toggler-icon {
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 0.5)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }
    .greeting-button {
      background-color: rgba(255,255,255,0.1);
      border-radius: 20px;
      padding: 5px 15px;
      display: inline-flex;
      align-items: center;
      color: #ffffff;
      transition: background-color 0.3s ease;
    }
    .greeting-button i {
      margin-right: 10px;
      font-size: 20px;
    }
    .greeting-button:hover {
      background-color: rgba(255,255,255,0.2);
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <!-- Lien vers la page d'accueil avec le logo et le texte "Covoit" -->
      <a class="navbar-brand" href="index.php">
        <img src="./image/SaintAspais.png" alt="Saint-Aspais Covoit" height="30" class="d-inline-block align-top me-2">
        Covoit
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <?php if (isset($_SESSION['connect']) && $_SESSION['connect'] === true): ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php"><i class="fas fa-home me-1"></i> Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?ctl=reservations&action=mesReservations"><i class="fas fa-bookmark me-1"></i> Mes réservations</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?ctl=compteTrajets&action=mesTrajets"><i class="fas fa-route me-1"></i> Mes trajets</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?ctl=compte&action=compte"><i class="fas fa-user me-1"></i> Compte</a>
            </li>
            <!-- Nouveau bouton pour Mes réservations -->
          <?php endif; ?>
          <?php if (isset($_SESSION['administrateur']) && $_SESSION['administrateur'] == 1) : ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?ctl=Import&action=afficherImport"><i class="fas fa-cog me-1"></i> Import (admin)</a>
            </li>
          <?php endif; ?>
        </ul>
        <ul class="navbar-nav">
          <?php if (isset($_SESSION['nom'])): ?>
            <li class="nav-item me-3">
              <span class="greeting-button"><i class="fas fa-user-circle"></i>Bonjour, <?php echo $_SESSION['nom']; ?></span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?ctl=connexion&action=deconnecter"><i class="fas fa-sign-out-alt me-1"></i>Déconnexion</a>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?ctl=connexion&action=connexion"><i class="fas fa-sign-in-alt me-1"></i>Se connecter</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>


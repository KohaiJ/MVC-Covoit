<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Saint-Aspais Covoit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 400px;
            margin: 50px auto;
        }
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #1e3a8a;
            color: white;
            text-align: center;
            padding: 1.5rem;
            border-top-left-radius: 1rem !important;
            border-top-right-radius: 1rem !important;
        }
        .btn-primary {
            background-color: #1e3a8a;
            border-color: #1e3a8a;
        }
        .btn-primary:hover {
            background-color: #152c69;
            border-color: #152c69;
        }
        .form-control:focus {
            border-color: #1e3a8a;
            box-shadow: 0 0 0 0.2rem rgba(30, 58, 138, 0.25);
        }
    </style>
</head>
<body>
    <div class="container login-container">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Connexion</h4>
            </div>
            <div class="card-body p-4">
                <form action="index.php?ctl=connexion&action=veriflogin" method="post">
                    <div class="mb-3">
                        <label for="myEmail" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" id="myEmail" name="myEmail" placeholder="Votre email" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="myPassword" class="form-label">Mot de passe</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="myPassword" name="myPassword" placeholder="Votre mot de passe" required>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Se connecter</button>
                    </div>
                </form>

                <hr class="my-4">

                <form action="index.php?ctl=connexion&action=forgotpassword" method="post">
                    <div class="mb-3">
                        <label for="recoverEmail" class="form-label">Récupération du mot de passe</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="email" class="form-control" id="recoverEmail" name="recoverEmail" placeholder="Votre email" required>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-secondary">Mot de passe oublié ?</button>
                    </div>
                </form>

                <?php if (isset($_SESSION['connect']) && $_SESSION['connect'] === true): ?>
                    <div class="mt-3 text-center">
                        <a href="index.php?ctl=connexion&action=vuechangepasswd" class="text-decoration-none">
                            Changer votre mot de passe
                        </a>
                    </div>
                <?php endif; ?>

                <?php
                if (isset($erreur)) {
                    echo '<div class="alert alert-danger mt-3" role="alert">' . $erreur . '</div>';
                }
                if (isset($_GET['msgPwd'])) {
                    echo '<div class="alert alert-info mt-3" role="alert">' . $_GET['msgPwd'] . '</div>';
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

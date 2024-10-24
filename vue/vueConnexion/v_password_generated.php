<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de Passe Généré</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 500px;
            margin-top: 100px;
        }
        .alert {
            background-color: #1e3a8a;
            color: white;
            border: none;
        }
        .btn-primary {
            background-color: #1e3a8a;
            border-color: #1e3a8a;
        }
        .btn-primary:hover {
            background-color: #152c69;
            border-color: #152c69;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="alert alert-success text-center" role="alert">
            <?php echo $message; ?>
        </div>
        <div class="text-center mt-3">
            <a href="index.php?ctl=connexion&action=connexion" class="btn btn-primary">Retour à la connexion</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

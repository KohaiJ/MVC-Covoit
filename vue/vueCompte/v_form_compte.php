<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Compte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <form action="index.php?controller=ctlCompte&action=updateVoiture" method="post">
            <div class="mb-3">
                <label class="form-label">Possédez-vous une voiture ?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="voiture" id="oui" value="oui">
                    <label class="form-check-label" for="oui">Oui</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="voiture" id="non" value="non" checked>
                    <label class="form-check-label" for="non">Non</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

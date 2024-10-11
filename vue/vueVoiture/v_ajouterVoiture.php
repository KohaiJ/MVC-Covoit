<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Véhicule</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Ajouter un Véhicule</h1>
        <form method="POST" action="index.php?ctl=voiture&action=enregistrerVehicule">
            <div class="mb-3">
                <label for="marque" class="form-label">Marque du véhicule</label>
                <input type="text" class="form-control" id="marque" name="marque" required>
            </div>
            <div class="mb-3">
                <label for="modele" class="form-label">Modèle du véhicule</label>
                <input type="text" class="form-control" id="modele" name="modele" required>
            </div>
            <div class="mb-3">
                <label for="annee" class="form-label">Année</label>
                <input type="number" class="form-control" id="annee" name="annee" required>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer le véhicule</button>
        </form>
    </div>
</body>
</html>

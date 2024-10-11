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
        <div class="card mt-3">
            <div class="card-body">
                <form method="POST" action="index.php?ctl=voiture&action=ajouterVoiture">
                    <div class="custom-select mb-3">
                        <label for="marque">Marque :</label>
                        <select name="marque" id="marque" class="form-control" required>
                            <option value="Audi">Audi</option>
                            <option value="BMW">BMW</option>
                            <option value="Citroen">Citroën</option>
                            <option value="Ford">Ford</option>
                            <option value="Mercedes">Mercedes</option>
                            <option value="Peugeot">Peugeot</option>
                            <option value="Renault">Renault</option>
                            <option value="Tesla">Tesla</option>
                            <option value="Toyota">Toyota</option>
                            <option value="Volkswagen">Volkswagen</option>
                        </select>
                    </div>                    
                    <div class="mb-3">
                        <label for="modele" class="form-label">Modèle du vehicule</label>
                        <input type="text" class="form-control" id="modele" name="modele" required>
                    </div>
                    <div class="form-group">
                    <label for="nbPlace">Nombre de places :</label>
                    <select name="nbPlace" id="nbPlace" class="form-control" required>
                        <option value="2">2 places</option>
                        <option value="3">3 places</option>
                        <option value="4">4 places</option>
                        <option value="5">5 places</option>
                    </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Enregistrer le véhicule</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

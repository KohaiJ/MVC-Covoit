<?php if (isset($_SESSION['vehicule']) && $_SESSION['vehicule'] == 1) : ?>
<!DOCTYPE html>
<html lang="en">     
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Trajet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://openlayers.org/en/v6.6.1/css/ol.css" type="text/css">
    <style>
        #map {
            width: 100%;
            height: 400px; /* Ajustez la hauteur selon vos besoins */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Formulaire de Trajet</h1>
        <div id="map"></div> <!-- Div pour la carte -->
        <form action="index.php?ctl=trajet&action=trajetvalide" method="post" class="mt-3">
            <div class="mb-3">
                <label class="form-label">Lieu de départ</label>
                <input type="text" class="form-control" name="LieuDepart" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Lieu d'arrivée</label>
                <input type="text" class="form-control" name="LieuArrive" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jour</label>
                <input type="date" class="form-control" name="DateTrajet" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Heure de départ</label>
                <input type="time" class="form-control" name="heureDepart" required>
            </div>
             <!--heure arrivé -->
           
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>
 
    <script src="https://openlayers.org/en/v6.6.1/build/ol.js" type="text/javascript"></script>
    <script>
        // Initialisation de la carte
        var map = new ol.Map({
            target: 'map', // L'ID de la div pour la carte
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM() // Utilisation des tuiles OpenStreetMap
                })
            ],
            view: new ol.View({
                center: ol.proj.fromLonLat([2.3522, 48.8566]), // Centre la carte sur Paris
                zoom: 12 // Niveau de zoom initial
            })
        });
    </script>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php endif; ?>
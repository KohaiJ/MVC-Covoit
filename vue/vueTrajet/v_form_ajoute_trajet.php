<?php if (isset($_SESSION['vehicule']) && $_SESSION['vehicule'] == 1) : ?>
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col">
            <h1 class="text-center text-primary">Ajouter un Trajet</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 mb-4">
            <div id="map" class="rounded shadow-sm" style="height: 100%; min-height: 600px;"></div>
        </div>
        <div class="col-md-6">
            <form action="index.php?ctl=trajet&action=trajetvalide" method="post" class="bg-white p-4 rounded-lg shadow-sm border">
                <div class="mb-3">
                    <label class="form-label">Lieu de départ</label>
                    <input type="text" class="form-control border-primary" id="LieuDepart" name="LieuDepart" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Lieu d'arrivée</label>
                    <input type="text" class="form-control border-primary" id="LieuArrive" name="LieuArrive" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jour</label>
                    <input type="date" class="form-control border-primary" name="DateTrajet" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Heure de départ</label>
                    <input type="time" class="form-control border-primary" name="heureDepart" required>
                </div>
                <div class="mb-3">
                    <label for="voiture" class="form-label">Voiture</label>
                    <select name="voiture" id="voiture" class="form-select border-primary" onchange="updatePlaces()" required>
                        <option value="">Sélectionnez une voiture</option>
                        <?php if (!empty($voitures)): ?>
                            <?php foreach ($voitures as $voiture): ?>
                                <option value="<?= htmlspecialchars($voiture['id']) ?>" data-places="<?= htmlspecialchars($voiture['nbPlace']) ?>">
                                    <?= htmlspecialchars($voiture['marque']) . ' ' . htmlspecialchars($voiture['modele']). ' / nombre de places : ' . htmlspecialchars($voiture['nbPlace']) ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">Aucune voiture disponible</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="places" class="form-label">Places disponibles</label>
                    <input type="number" class="form-control border-primary" id="places" name="nbPlace" min="1" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Ajouter le trajet</button>
                    <a href="index.php?ctl=compteTrajets&action=mesTrajets" class="btn btn-secondary">Retour à mes trajets</a>
                </div>
            </form>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<style>
    #map { width: 100%; height: 100%; min-height: 600px; }
    .form-control, .form-select, .btn {
        border-radius: 0.5rem;
    }
    .form-control:focus, .form-select:focus {
        box-shadow: 0 0 0 0.2rem rgba(30, 58, 138, 0.25);
        border-color: #1e3a8a;
    }
    .btn-primary {
        background-color: #1e3a8a;
        border-color: #1e3a8a;
    }
    .btn-primary:hover {
        background-color: #152c69;
        border-color: #152c69;
    }
    .form-label {
        font-weight: 600;
        color: #1e3a8a;
    }
    .border-primary {
        border-color: #1e3a8a !important;
    }
</style>

<script>
function updatePlaces() {
    const voitureSelect = document.getElementById('voiture');
    const placesInput = document.getElementById('places');
    const selectedOption = voitureSelect.options[voitureSelect.selectedIndex];
    const placesVoiture = selectedOption.getAttribute('data-places');

    if (placesVoiture) {
        const placesDisponibles = Math.max(1, placesVoiture - 1); 
        placesInput.value = placesDisponibles;
    } else {
        placesInput.value = '';
    }
}

// Initialisation de la carte
var map = L.map('map').setView([46.603354, 1.888334], 6); // Centre sur la France

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(map);

var departMarker, arriveMarker;

function updateMap(input, isDepart) {
    var address = input.value;
    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`)
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                var lat = parseFloat(data[0].lat);
                var lon = parseFloat(data[0].lon);
                if (isDepart) {
                    if (departMarker) map.removeLayer(departMarker);
                    departMarker = L.marker([lat, lon]).addTo(map).bindPopup('Départ');
                } else {
                    if (arriveMarker) map.removeLayer(arriveMarker);
                    arriveMarker = L.marker([lat, lon]).addTo(map).bindPopup('Arrivée');
                }
                map.fitBounds([
                    departMarker ? departMarker.getLatLng() : [0, 0],
                    arriveMarker ? arriveMarker.getLatLng() : [0, 0]
                ]);
            }
        });
}

document.getElementById('LieuDepart').addEventListener('change', function() {
    updateMap(this, true);
});

document.getElementById('LieuArrive').addEventListener('change', function() {
    updateMap(this, false);
});
</script>
<?php endif; ?>

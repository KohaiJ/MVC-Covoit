<?php if (isset($_SESSION['vehicule']) && $_SESSION['vehicule'] == 1) : ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-4">Ajouter un Véhicule</h2>
            <form method="POST" action="index.php?ctl=voiture" class="bg-white p-4 rounded-lg shadow border border-primary">
                <div class="mb-4">
                    <label for="marque" class="form-label">
                        <i class="bi bi-car-front-fill me-2"></i>Marque
                    </label>
                    <select name="marque" id="marque" class="form-select border-2 border-primary rounded-pill" required>
                        <option value="" selected disabled>Choisissez une marque</option>
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
                <div class="mb-4">
                    <label for="modele" class="form-label">
                        <i class="bi bi-tag-fill me-2"></i>Modèle du véhicule
                    </label>
                    <input type="text" class="form-control border-2 border-primary rounded-pill" id="modele" name="modele" required placeholder="Ex: Golf, 308, Model 3...">
                </div>
                <div class="mb-4">
                    <label for="nbPlace" class="form-label">
                        <i class="bi bi-person-fill me-2"></i>Nombre de places
                    </label>
                    <select name="nbPlace" id="nbPlace" class="form-select border-2 border-primary rounded-pill" required>
                        <option value="" selected disabled>Sélectionnez le nombre de places</option>
                        <option value="2">2 places</option>
                        <option value="3">3 places</option>
                        <option value="4">4 places</option>
                        <option value="5">5 places</option>
                    </select>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                        <i class="bi bi-plus-circle me-2"></i>Enregistrer le véhicule
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

<style>
    body {
        background-color: #f8f9fa;
    }
    .form-control, .form-select, .btn {
        border-radius: 50rem;
    }
    .form-control:focus, .form-select:focus {
        box-shadow: 0 0 0 0.25rem rgba(30, 58, 138, 0.25);
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
<?php endif; ?>

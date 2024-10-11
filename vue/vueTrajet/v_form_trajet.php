    <div class="container mt-5">
        <h1>Formulaire de Trajet</h1>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="index.php?ctl=trajet&action=chercher" class="mt-3">
                    <div class="mb-3">
                        <label for="depart" class="form-label">Lieu de départ</label>
                        <input type="text" class="form-control" name="depart" id="depart" required>
                    </div>
                    <div class="mb-3">
                        <label for="arrive" class="form-label">Lieu d'arrivée</label>
                        <input type="text" class="form-control" name="arrive" id="arrive" required>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Jour</label>
                        <input type="date" class="form-control" name="date" id="date" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Soumettre</button>
                </form>
            </div>
        </div>
    </div>

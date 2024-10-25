<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau des Réservations</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>


<div class="container mt-5">
    <h2 class="mb-4">Entrez l'ID du trajet pour voir les réservations</h2>
    <form method="get" action="index.php">
        <input type="hidden" name="ctl" value="gestionReservations">
        <input type="hidden" name="action" value="afficherReservationsencours">
        <input type="text" name="idTrajet" placeholder="ID Trajet" required>
        <button type="submit" class="btn btn-primary">Voir les réservations</button>
    </form>
</div>

        
</body>
</html>

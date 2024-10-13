<?php if (isset($_SESSION['administrateur']) && $_SESSION['administrateur'] == 1) : ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import CSV</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Importer un fichier CSV d'étudiants</h2>
        <form action="index.php?ctl=Import&action=traiter" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file">Choisir un fichier CSV :</label>
                <input type="file" class="form-control" name="file" accept=".csv" required>
            </div>
            <button type="submit" class="btn btn-primary">Charger</button>
        </form>

        <?php if (isset($students)): ?>
        <h3 class="mt-5">Aperçu des données :</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Classe</th>
                    <th>Mdp</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= $student['code'] ?></td>
                    <td><?= $student['nom'] ?></td>
                    <td><?= $student['prenom'] ?></td>
                    <td><?= $student['email'] ?></td>
                    <td><?= $student['classe'] ?></td>
                    <td><?= $student['mdp_clair'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php endif; ?>

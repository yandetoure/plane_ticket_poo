<?php

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vente de billet d'avion</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Formulaire de vente de billet d'avion</h2>
        <form action="traitement.php" method="post">
            <div class="form-group">
                <label for="first_name">Prénom :</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Nom :</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone :</label>
                <input type="tel" class="form-control" id="telephone" name="telephone" required>
            </div>
            <!-- Ajoutez d'autres champs pour les informations du billet (pays, classe, mode, dates, etc.) -->
            <button type="submit" class="btn btn-primary">Acheter le billet</button>
        </form>
    </div>
</body>
</html>

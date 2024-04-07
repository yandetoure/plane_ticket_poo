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
    <style>
        /* Style pour changer la couleur du texte en bleu */
        .text-blue {
            color: blue !important;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4 text-blue">Formulaire de vente de billet d'avion</h2>
                        <form action="traitement.php" method="post">
                            <div class="form-group">
                                <label for="first_name" class="text-blue">Prénom :</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" required>
                            </div>
                            <div class="form-group">
                                <label for="last_name" class="text-blue">Nom :</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" required>
                            </div>
                            <div class="form-group">
                                <label for="telephone" class="text-blue">Téléphone :</label>
                                <input type="tel" class="form-control" id="telephone" name="telephone" required>
                            </div>
                            <!-- Ajoutez d'autres champs pour les informations du billet (pays, classe, mode, dates, etc.) -->
                            <button type="submit" class="btn btn-primary btn-block mt-4">Acheter le billet</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

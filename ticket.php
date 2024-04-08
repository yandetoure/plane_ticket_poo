<?php
include_once 'server.php';
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

        .card-title{
            font-size: 25px;
            font-weight: bold;
            margin:20px;
        }
        /* Style pour changer la couleur du texte en brun */
        .text-brown {
            color: brown !important;
        }

        /* Style pour arrondir les bords des entrées */
        .form-control {
            border-radius: 15px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4 text-brown">Formulaire de vente de billet d'avion</h2>
                        <form action="add.php" method="post">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name" class="text-brown">Prénom :</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_name" class="text-brown">Nom :</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="passport_number" class="text-brown">Numéro Passeport :</label>
                                        <input type="text" class="form-control" id="passport_number" name="passport_number" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="adress" class="text-brown">Adresse :</label>
                                        <input type="text" class="form-control" id="adress" name="adress" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="text-brown">Email :</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telephone" class="text-brown">Téléphone :</label>
                                        <input type="tel" class="form-control" id="telephone" name="telephone" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="departure_date" class="text-brown">Date de départ :</label>
                                        <input type="date" class="form-control" id="departure_date" name="departure_date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="return_date" class="text-brown">Date de retour :</label>
                                        <input type="date" class="form-control" id="return_date" name="return_date">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pays" class="text-brown">Billet pour :</label>
                                        <select class="form-control" id="pays" name="pays" required>
                                            <?php
                                            $requete = "SELECT id, name FROM Pays";
                                            $resultat = $connection->query($requete);
                                            if ($resultat->rowCount() > 0) {
                                                while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                                                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                }
                                            } else {
                                                echo "<option>Aucune catégorie disponible</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="class" class="text-brown">Classe du voyage :</label>
                                        <select class="form-control" id="class" name="class" required>
                                            <?php
                                            $requete = "SELECT id, name FROM Class";
                                            $resultat = $connection->query($requete);
                                            if ($resultat->rowCount() > 0) {
                                                while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                                                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                }
                                            } else {
                                                echo "<option>Aucune catégorie disponible</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mode" class="text-brown">Mode du voyage :</label>
                                        <select class="form-control" id="mode" name="mode" required>
                                            <?php
                                            $requete = "SELECT id, name FROM Mode";
                                            $resultat = $connection->query($requete);
                                            if ($resultat->rowCount() > 0) {
                                                while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                                                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                }
                                            } else {
                                                echo "<option>Aucune catégorie disponible</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- Ajoutez d'autres champs ici -->
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-4">Acheter le billet</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

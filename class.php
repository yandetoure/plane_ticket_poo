<?php
include_once 'server.php';
if($_SERVER['REQUEST_METHOD'] === "POST" ){

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $passport_number = $_POST['passport_number'];
    $departure_point = $_POST['departure_point'];
    $arrival_point = $_POST['arrival_point'];
    $departure_date = $_POST['departure_date'];
    $return_date = $_POST['return_date'];
    $class = $_POST['class'];
    $mode = $_POST['mode'];
    $pays = $_POST['departure_point'];
    $creation_date = date("Y-m-d H:i:s");
    $user_id = $_SESSION['id_user'];

}
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
        /*Ajout d'une image en arrière plan */
.body{
    background-image: url(img/1.jpeg);
        display: flex;
    flex-direction: column;
    justify-content: center;
}
/*CSS du card  */
        .card-title{
            font-size: 26px;
            font-weight: bold;
            margin-top: 60px;
            padding-bottom: 60px;
        }
        label{
            font-size: 15px;
        }
        /* Style pour changer la couleur du texte en brun */
        .text-brown {
            color: brown !important;
        }

        /* Style pour arrondir les bords des entrées */
        .form-control {
            border-radius: 15px;
        }
        .btn-brown {
            background-color: brown;
            border-color: brown;
            color:#fff;
            font-size: 14px;
            font-weight: bold;
        }
        .card{
    background-color: rgba(23, 126, 205, 0.8);
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 8px;
    label{
        text-align: center;
        font-size: 17px;
        font-weight: bold;
     }
        }

        /* Style pour changer la couleur du texte du bouton en blanc */
        .btn-brown:hover {
            background-color: #854d27;
            border-color: #854d27;
        }
    </style>
</head>
<body class="body">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4 text-brown">Formulaire de Réservation de billet d'avion</h2>
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
                            </div>
                            <button type="submit" class="btn btn-brown btn-block mt-4">Réserver le billet</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

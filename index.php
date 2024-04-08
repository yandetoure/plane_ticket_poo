<?php 
    // Inclusion de la page de configuration avec les paramètres de connexion à la base de données
    include 'server.php';
    require_once 'header.php';
    require_once 'ticket.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Billets</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Style personnalisé */
        .card-title {
            font-size: 24px;
            text-align: center;
            font-weight: bold;
        }
        .membre-card {
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .membre-card:hover {
            transform: scale(1.03);
        }
        .card-body {
            text-align: center;
            font-weight: bold;
            font-size: 16px;
        }
        .btn-group {
            display: flex;
            justify-content: space-around;
            margin-top: 10px;
        }
        .btn {
            width: 30%;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #bd2130;
            border-color: #bd2130;
        }
        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }
        .btn-info:hover {
            background-color: #117a8b;
            border-color: #117a8b;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Liste des Billets</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <?php
                try {
                    // Requête pour sélectionner tous les billets de la base de données
                    $sql = "SELECT Ticket.*, Pays.name AS pays_name
                            FROM Ticket
                            JOIN Pays ON Ticket.id_pays = Pays.id";
                   $stmt = $connexion->prepare($sql);
            
                   $stmt->execute();
                    // Vérifier si des billets sont retournés
                    if ($stmt->rowCount() > 0) {
                        // Afficher les billets dans des cartes Bootstrap
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<div class="card membre-card mb-3">';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title">' . $row['first_name'] . ' ' . $row['last_name'] . '</h5>';
                            echo '<p class="card-text">Pour un billet de : ' . $row['pays_name'] . '</p>';
                            echo '<p class="card-text">Adresse : ' . $row['adress'] . '</p>';
                            echo '<p class="card-text">Date de départ: ' . $row['departure_date'] . '</p>';
                            echo '<div class="btn-group">';
                            echo '<a href="update.php?id=' . $row['id'] . '" class="btn btn-primary">Modifier</a>';
                            echo '<a href="delete.php?id=' . $row['id'] . '" class="btn btn-danger">Supprimer</a>';
                            echo '<a href="detail.php?id=' . $row['id'] . '" class="btn btn-info">Afficher plus</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "Aucun billet trouvé.";
                    }
                } catch(PDOException $e) {
                    // Gérer les erreurs PDO
                    echo "Erreur: " . $e->getMessage();
                }
                // Fermer la connexion à la base de données
                $connexion = null;
                ?>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

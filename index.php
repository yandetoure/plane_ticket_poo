

<?php
include('server.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="my_tickets.css">
    <title>Mes billets</title>
</head>

<body class="body">

<!--condition, ce que l'damin doit voir -->


<?php
$id_user = $_SESSION['id_user'];
// Connexion à la base de données avec PDO
try {
    $requete = "SELECT* FROM tickets WHERE id = :id";

    $resultat = $connection->prepare($requete);

    $resultat->execute();

    

    // Vérifie si la requête a renvoyé des résultats
    if ($resultat->rowCount() > 0) {
        // Parcourir les résultats et afficher chaque publication sous forme de carte
        while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {

            echo "<div class='body-content'>";
            
            echo "<div class='content'>";

            echo "<div class='card-title'>";

            echo "<h3>Bénéficiaire : " . $row['first_name'] .' '. $row['last_name']."</h3>";

            echo "</div>";
            echo "<h3>Départ de : " . $row['name'] .'    '.' Vers : '.' '. $row['name']."</h3>";

            echo "<h4> Classe du voyage : " . $row['name'] . "</h4>";

            echo "<div class='card-body'>";

            echo "<h3><strong>Date de départ :</strong> " . $row['name'] . "</h3>";

            echo "</div>";

            echo "<div class='card-footer'>";
            echo "<h5><strong>Date d'achat du billet :</strong> " . $row['creation_date'] . "</h5>";

            echo "<h5><strong>Prise en charge par :</strong> " . $row['first_name'] . "</h5>";
            
            echo "</div>";
            echo '<button class="update"><a href="update.php?id=' . $row['id'] . '">Modifier</a></button>';
            echo '<button class="supprimer"><a onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cette réservation ?\')" href="delete.php?id=' . $row['id'] . '">Supprimer</a></button>';
            
            echo "</div>";
            echo "</div>";

        }
    } else {
        echo "<p>Aucune publication disponible pour cet utilisateur.</p>";
    }
} catch (PDOException $e) {
    echo "Erreur lors de l'exécution de la requête : " . $e->getMessage();
}
?>

</body>
</html>

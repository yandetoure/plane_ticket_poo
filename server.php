<?php
require_once ('ticket.php');


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Ticket";

try {
    $connexion = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);

    // Configuration pour afficher les erreurs PDO
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Déclaration des variables et instanciation de resultat
    $first_name ="";
    $last_name ="";
    $telephone ="0"; // Variable corrigée de telepgone à telephone
    $adress ="";
    $pays ="";
    $class ="";
    $mode ="";
    $user ="";
    $passport_number ="N12";
    $departure_point="";
    $departure_date = "";
    $return_date = 0;
    $creation_date = 0;
    $arrival_date ="";
    $email = ""; // Ajout de l'email


    // Création d'un objet Ticket en utilisant la connexion
    $ticket = new Ticket($connexion, $first_name, $last_name, $telephone, $email, $passport_number, $mode, $departure_point, $return_date, $class, $pays, $adress, $creation_date,);
    $resultat = $ticket->readTicket();

} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

// Fermeture de la connexion à la base de données (décommentez si nécessaire)
// $connexion = null;

?>

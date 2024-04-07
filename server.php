<?PHP 

require_once 'ticket.php';
//Déclarations des variables pour la connexion
$host ="localhost";
$user="root";
$pass= "";
$db = "plane_ticket";

try{
    
    $connexion = new PDO("mysql:host=$host;dbname=$db",$user,$pass);

    //Déclaration des variables et instanciation de resultat
    $first_name ="";
    $last_name ="";
    $matricule ="";
    $sexe ="";
    $tranche_age ="";
    $situation_matrimoniale ="";
    $statut ="";
    $etat="";

    $member = new Member ($connexion, $first_name, $last_name,$matricule,$tranche_age,$situation_matrimoniale,$sexe,$statut,$etat);
    $resultat = $member->readMember();

    
} catch (PDOException $e) {
    die("Erreur de la connexion à la base de données : ".$e->getMessage());
}
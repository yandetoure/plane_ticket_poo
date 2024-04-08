<?php 

    $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "Ticket";


   
try {
  
    // $connexion = new PDO($serveurname, $utilisateur, $mot_de_passe);
    // echo 'ok';
     $connection = new PDO("mysql:host=$servername;dbname=$dbname;",$username, $password);

    // Configuration pour afficher les erreurs PDO
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "connexion OK";
    
} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}


//$connexion = null; 
?>
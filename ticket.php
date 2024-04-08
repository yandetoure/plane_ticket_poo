<?php
require_once('CRUD.php');
require_once ('header.php');

class Ticket implements CRUD {
    private $connexion;
    private $first_name;
    private $last_name;
    private $telephone;
    private $email;
    private $passport_number;
    private $mode;
    private $departure_point;
    private $return_date;
    private $class;
    private $pays;
    private $adress;
    private $creation_date;

    public function __construct($connexion, $first_name, $last_name, $telephone, $email, $passport_number, $mode, $departure_point, $return_date, $class, $pays, $adress, $creation_date) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->telephone = $telephone;
        $this->email = $email;
        $this->passport_number = $passport_number;
        $this->mode = $mode;
        $this->departure_point = $departure_point;
        $this->return_date = $return_date;
        $this->class = $class;
        $this->pays = $pays;
        $this->adress = $adress;
        $this->creation_date = $creation_date;
        $this->connexion = $connexion;
    }

    public function addTicket($first_name, $last_name, $telephone, $email, $passport_number, $mode, $departure_point, $return_date, $class, $pays, $adress, $creation_date) {
        try {
            $sql = "INSERT INTO Ticket (first_name, last_name, telephone, email, passport_number, mode, departure_point, return_date, class, pays, adress, creation_date) 
                    VALUES (:first_name, :last_name, :telephone, :email, :passport_number, :mode, :departure_point, :return_date, :class, :pays, :adress, :creation_date)";
    
            $stmt = $this->connexion->prepare($sql);
    
            $stmt->bindParam(':first_name', $first_name);
            $stmt->bindParam(':last_name', $last_name);
            $stmt->bindParam(':telephone', $telephone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':passport_number', $passport_number);
            $stmt->bindParam(':mode', $mode);
            $stmt->bindParam(':departure_point', $departure_point);
            $stmt->bindParam(':return_date', $return_date);
            $stmt->bindParam(':id_class', $class);
            $stmt->bindParam(':id_pays', $pays);
            $stmt->bindParam(':id_adress', $adress);
            $stmt->bindParam(':creation_date', $creation_date);
    
            $stmt->execute();
    
            header('Location: index.php');
            exit();
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion du billet : " . $e->getMessage();
        }
    }

    public function deleteTicket($id) {
        try {
            $sql = "DELETE FROM Ticket WHERE id = :id";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            header('Location: index.php');
            exit();
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression du billet : " . $e->getMessage();
        }
    }

    public function updateTicket($id, $first_name, $last_name, $telephone, $email, $passport_number, $mode, $departure_point, $return_date, $class, $pays, $adress, $date) {
        try {
            $sql = "UPDATE Ticket SET first_name = :first_name, last_name = :last_name, telephone = :telephone, email = :email, passport_number = :passport_number, 
                    mode = :mode, departure_point = :departure_point, return_date = :return_date, class = :class, pays = :pays, adress = :adress, date = :date WHERE id = :id";
    
            $stmt = $this->connexion->prepare($sql);
    
            $stmt->bindParam(':first_name', $first_name);
            $stmt->bindParam(':last_name', $last_name);
            $stmt->bindParam(':telephone', $telephone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':passport_number', $passport_number);
            $stmt->bindParam(':mode', $mode);
            $stmt->bindParam(':departure_point', $departure_point);
            $stmt->bindParam(':return_date', $return_date);
            $stmt->bindParam(':class', $class);
            $stmt->bindParam(':pays', $pays);
            $stmt->bindParam(':adress', $adress);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
            $stmt->execute();
    
            header('Location: index.php');
            exit();
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour du billet : " . $e->getMessage();
        }
    }

    public function readTicket() {

        try{
            //Requête d'insertion                        // Requête pour sélectionner tous les membres de la base de données
                        $sql = "SELECT * FROM Ticket
                        JOIN Pays ON Ticket.id_pays = Pays.id
                        JOIN Class ON Ticket.id_class = Class.id
                        JOIN Mode ON Ticket.id_mode = Mode.id";
            //Préparation de la requête
            $stmt=$this->connexion->prepare($sql);
            //Exécution de la requete
            $stmt->execute();

            //Récupération des données
            $resultat=$stmt->fetchALL(PDO::FETCH_ASSOC);
            return $resultat;
        }
        catch(PDOException $e){
            echo "Erreur: " . $e->getMessage();
        }
    }

    public function getAllTickets() {
        try {
            $sql = "SELECT * FROM Ticket";
            $stmt = $this->connexion->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des billets : " . $e->getMessage();
        }
    }
}
?>

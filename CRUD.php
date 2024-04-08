<?php
interface CRUD{
    public function addTicket($first_name, $last_name, $telephone, $email, $passport_number, $mode, $departure_point, $return_date, $class, $pays, $adress, $creation_date);
    public function updateTicket($id, $first_name, $last_name, $telephone, $email, $passport_number, $mode, $departure_point, $return_date, $class, $pays, $adress, $date);
    public function deleteTicket($id);
    public function readTicket();
    
    // public function createClass();
    // public function updateClss();
    // public function deleteClass();
    // public function readClass();

    // public function createMode();
    // public function updateMode();
    // public function deleteMode();
    // public function readMode();

    // public function createPays();
    // public function updatePays();
    // public function deletePays();
    // public function readPays();
}
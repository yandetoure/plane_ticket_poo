<?php
interface CRUD{
    public function createTicket();
    public function updateTicket();
    public function deleteTicket();
    public function readTicket();
    
    public function createClass();
    public function updateClss();
    public function deleteClass();
    public function readClass();

    public function createMode();
    public function updateMode();
    public function deleteMode();
    public function readMode();

    public function createPays();
    public function updatePays();
    public function deletePays();
    public function readPays();
}
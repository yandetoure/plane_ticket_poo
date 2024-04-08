<?php
include "server.php";
$id = $_GET['id'];
$ticket->deleteTicket($id);
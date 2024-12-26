<?php

require_once __DIR__ . '/../classes/Reservation.php';
require_once __DIR__ . '/../classes/DB.php';

class getAllReservations {
    static function getAllReservations(){
        $db  = new Database();
        $pdo = $db->getConnection();
        $reservations = Reservation::getAllReservations($pdo);
        return $reservations;
    }
    static function getReservationById($id){
        $db  = new Database();
        $pdo = $db->getConnection();
        $reservations = Reservation::getReservationById($pdo,$id);
        return $reservations;
    }
    
    

}
?>
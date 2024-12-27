<?php

require_once('SuperAdmin.php');

class Admin extends User {

    public function __construct($nom, $prenom, $password, $email) {
        parent::__construct($nom, $prenom, $password, $email, 'admin');
    }
  
    public function viewUsers($pdo) {
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE role = 'client'");
        $stmt->execute();
        $users = $stmt->fetchAll();
        return $users;
    }
    public function manageReservations($pdo) {
        $stmt = $pdo->prepare("SELECT * FROM reservations");
        $stmt->execute();
        $reservations = $stmt->fetchAll();
        return $reservations;
    }
    public function __toString() {
        return "Admin: " . $this->nom . " " . $this->prenom;
    }
}
?>

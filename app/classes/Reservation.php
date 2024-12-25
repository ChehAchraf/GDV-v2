<?php

class Reservation {
    private $idReservation;
    private $idClient;
    private $idActivite;
    private $dateReservation;
    private $nbrPersonnes;
    private $statut;

    public function __construct($idClient, $idActivite, $statut = 'En Attente') {
        $this->idClient = $idClient;
        $this->idActivite = $idActivite;
        $this->statut = $statut;
    }

    public function creerReservation($pdo) {
        try {
            $stmt = $pdo->prepare("INSERT INTO `reservations` (`id_client`, `id_activite`, `statut`,`nbr_personne`) 
                                    VALUES (:idClient, :idActivite, :statut,:nbr_personne)");
            $stmt->execute([
                'idClient' => $this->idClient,
                'idActivite' => $this->idActivite,
                'statut' => $this->statut,
                'nbr_personne' => $this->nbrPersonnes,
            ]);
            return "Reservation added successfully.";
        } catch (Exception $e) {
            return "Couldn't add reservation: " . $e->getMessage();
        }
    }

    public static function getAllReservations($pdo) {
        try {
            $stmt = $pdo->query("SELECT * FROM `reservations`");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Couldn't fetch reservations: " . $e->getMessage();
        }
    }

    public static function getReservationById($pdo, $id) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM `reservations` WHERE `id_reservation` = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Couldn't fetch reservation: " . $e->getMessage();
        }
    }

    public function modifierReservation($pdo) {
        try {
            $stmt = $pdo->prepare("UPDATE `reservations` SET 
                                    `id_client` = :idClient, 
                                    `id_activite` = :idActivite, 
                                    `statut` = :statut,
                                    `nbr_personne` = :nbr_personne
                                    WHERE `id_reservation` = :idReservation");
            $stmt->execute([
                'idClient' => $this->idClient,
                'idActivite' => $this->idActivite,
                'statut' => $this->statut,
                'nbr_personne' => $this->nbrPersonnes,
                'idReservation' => $this->idReservation
            ]);
            return "Reservation updated successfully.";
        } catch (Exception $e) {
            return "Couldn't update reservation: " . $e->getMessage();
        }
    }

    public static function deleteReservation($pdo, $id) {
        try {
            $stmt = $pdo->prepare("DELETE FROM `reservations` WHERE `id_reservation` = :id");
            $stmt->execute(['id' => $id]);
            return "Reservation deleted successfully.";
        } catch (Exception $e) {
            return "Couldn't delete reservation: " . $e->getMessage();
        }
    }
}

?>

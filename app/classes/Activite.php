<?php

class Activite {
    private $id;
    private $titre;
    private $description;
    private $prix;
    private $dateDebut;
    private $dateFin;
    private $placesDisponibles;
    private $type;

    function __construct($titre, $description, $prix, $dateDebut, $dateFin, $placesDisponibles,$type) {
        $this->titre = $titre;
        $this->description = $description;
        $this->type = $type;
        $this->prix = $prix;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->placesDisponibles = $placesDisponibles;
    }

    function creerActivite($pdo) {
        try {
            $stmt = $pdo->prepare("INSERT INTO `activites` (`titre`, `description`, `prix`, `date_debut`, `date_fin`, `places_disponibles`,`type`)
                                   VALUES (:titre, :description, :prix, :date_debut, :date_fin, :places_disponibles,:type)");
            $stmt->execute([
                'titre' => $this->titre,
                'description' => $this->description,
                'prix' => $this->prix,
                'date_debut' => $this->dateDebut,
                'date_fin' => $this->dateFin,
                'places_disponibles' => $this->placesDisponibles,
                'type'=> $this->type
            ]);
            return "Activity Added Successfully";
        } catch (Exception $e) {
            return "Couldn't Add Activity: " . $e->getMessage();
        }
    }

    function modifierActivite($pdo) {
        try {
            $stmt = $pdo->prepare("UPDATE `activites` SET 
                                   `titre` = :titre,
                                   `description` = :description,
                                   `prix` = :prix,
                                   `date_debut` = :date_debut,
                                   `date_fin` = :date_fin,
                                   `places_disponibles` = :places_disponibles,
                                   `type` = :type
                                   WHERE `id` = :id");
            $stmt->execute([
                'titre' => $this->titre,
                'description' => $this->description,
                'prix' => $this->prix,
                'date_debut' => $this->dateDebut,
                'date_fin' => $this->dateFin,
                'places_disponibles' => $this->placesDisponibles,
                'type'=> $this->type,
                'id' => $this->id
            ]);
            return "Activity Modified Successfully";
        } catch (Exception $e) {
            return "Couldn't Modify Activity: " . $e->getMessage();
        }
    }

    static function getAllActivites($pdo) {
        try {
            $stmt = $pdo->query("SELECT * FROM `activites`");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Couldn't Fetch Activities: " . $e->getMessage();
        }
    }

    static function getActiviteById($pdo, $id) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM `activites` WHERE `id` = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Couldn't Fetch Activity: " . $e->getMessage();
        }
    }
    
    static function getActiviteByType($pdo, $type) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM `activites` WHERE `type` = :type");
            $stmt->execute(['type' => $type]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Couldn't Fetch Activity: " . $e->getMessage();
        }
    }

    static function deleteActivite($pdo, $id) {
        try {
            $stmt = $pdo->prepare("DELETE FROM `activites` WHERE `id` = :id");
            $stmt->execute(['id' => $id]);
            return "Activity Deleted Successfully";
        } catch (Exception $e) {
            return "Couldn't Delete Activity: " . $e->getMessage();
        }
    }
}

?>

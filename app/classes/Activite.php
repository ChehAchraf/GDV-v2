<?php

 class Activite {
    private $id;
    private $titre;
    private $description;
    private $prix;
    private $dateDebut;
    private $dateFin;
    private $placeDisponibles;

    function __construct($titre,$description,$prix,$dateDebut,$dateFin,$placeDisponibles){
        $this->titre=$titre;
        $this->description=$description;
        $this->prix=$prix;
        $this->dateDebut=$dateDebut;
        $this->dateFin=$dateFin;
        $this->placeDisponibles=$placeDisponibles;
    }

    function creerActivty($pdo){
        $stmt = $pdo->prepare("INSERT INTO `activites` (`titre`,`description`,`prix`,`date_debut`,`date_fin`,`places_disponibles`)
                        VALUES (?,?,?,?,?,?)");
        $stmt->execute(['username' => $this->username]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($this->password, $user['password'])) {
            return $user;
        }
        return null;
    }
 }

?>
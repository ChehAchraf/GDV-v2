<?php

require_once __DIR__ . '/../classes/Activite.php';
require_once __DIR__ . '/../classes/DB.php';

class getActivite {
    static function getAllActivites(){
        $db  = new Database();
        $pdo = $db->getConnection();
        $activites = Activite::getAllActivites($pdo);
        return $activites;
    }
    static function getActiviteById($id){
        $db  = new Database();
        $pdo = $db->getConnection();
        $activite = Activite::getActiviteById($pdo,$id);
        return $activite;
    }
    
    

}
?>
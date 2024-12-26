<?php

require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../classes/DB.php';

class getUser {
    static function getAllUsers(){
        $db  = new Database();
        $pdo = $db->getConnection();
        $users = User::getAllUsers($pdo);
        return $userss;
    }
    static function getUserById($id){
        $db  = new Database();
        $pdo = $db->getConnection();
     
        $user = User::getUserById($pdo,$id);
   
        return $user;
    }
    
    

}
?>
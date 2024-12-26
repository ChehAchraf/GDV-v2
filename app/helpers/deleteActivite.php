<?php 
session_start();
require_once('../classes/Activite.php');
require_once('../classes/DB.php');
    if(isset($_GET['id']) ){
        $idAct = $_GET['id'];

        $db  = new Database();
        $pdo = $db->getConnection();
        
        $result = Activite::deleteActivite($pdo,$idAct);
        if($result){
            echo $result;
            header("Location: ../../public/admin/activite.php");
        }
        

        

    }else{
        echo "Please enter any data";
    }

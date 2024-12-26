<?php 
session_start();
require_once('../classes/Reservation.php');
require_once('../classes/DB.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['activite-select-edit']) && isset($_POST['nbr-personne-reservation-edit'])){
        $idReservation = $_POST['r-id'];
        $idActivity = trim($_POST['activite-select-edit']);
        $nbrPersonnes = trim($_POST['nbr-personne-reservation-edit']);
       
        echo   $idClient;
        echo '<br>';
        echo $nbrPersonnes;
        if(empty($idActivity) || empty($nbrPersonnes) ){
            echo "data is empty";
            return;
        }
        $db  = new Database();
        $pdo = $db->getConnection();
        $newReservation = new Reservation($idReservation,null,$idActivity,$nbrPersonnes);
        $result = $newReservation->modifierReservation($pdo);
        if($result){
            header("Location: ../../public/client/reservation.php");
        }
        

        

    }else{
        echo "Please enter any data";
    }
}
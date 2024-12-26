<?php 
session_start();
require_once('../classes/Reservation.php');
require_once('../classes/DB.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['action']) ){
        $idReservation = $_POST['res-id'];
   
        $db  = new Database();
        $pdo = $db->getConnection();
        $newReservation = new Reservation($idReservation,null,null,null,"Annulée");

       echo $newReservation;
        $result = $newReservation->annulerReservation($pdo);
        if($result){
            echo $result;
            header("Location: ../../public/client/reservation.php");
        }
        

        

    }else{
        echo "Please enter any data";
    }
}
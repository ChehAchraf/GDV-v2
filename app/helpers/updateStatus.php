<?php 
session_start();
require_once('../classes/Reservation.php');
require_once('../classes/DB.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['status_reservation']) ){
        $idReservation = $_POST['id_reservation'];
        $status = $_POST['status_reservation'];
        $db  = new Database();
        $pdo = $db->getConnection();
        $newReservation = new Reservation($idReservation,null,null,null,$status);

       echo $newReservation;
        $result = $newReservation->annulerReservation($pdo);
        if($result){
            echo $result;
            header("Location: ../../public/admin/reservation.php");
        }
        

        

    }else{
        echo "Please enter any data";
    }
}
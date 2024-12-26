<?php 
session_start();
require_once('../classes/Reservation.php');
require_once('../classes/DB.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['activite-select']) && isset($_POST['nbr-personne-reservation'])){

        $idActivity = trim($_POST['activite-select']);
        $nbrPersonnes = trim($_POST['nbr-personne-reservation']);
        $idClient = $_SESSION['id'];
        echo   $idClient;
        echo '<br>';
        echo $nbrPersonnes;
        if(empty($idActivity) || empty($nbrPersonnes) || empty($idClient)){
            echo "data is empty";
            return;
        }
        $db  = new Database();
        $pdo = $db->getConnection();
        $reservation = new Reservation(null,$idClient,$idActivity,$nbrPersonnes); 
        $result = $reservation->creerReservation($pdo);
        if($result){
            header("Location: ../../public/client/reservation.php");
        }
        

        

    }else{
        echo "Please enter any data";
    }
}
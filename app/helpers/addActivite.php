<?php 
session_start();
require_once('../classes/Activite.php');
require_once('../classes/DB.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['submit']) ){

        $titre = trim(htmlspecialchars($_POST['titre']));
        $description = trim(htmlspecialchars($_POST['description']));
        $dateDebut = trim(htmlspecialchars($_POST['dateDebut']));
        $dateFin = trim(htmlspecialchars($_POST['dateFin']));
        $prix = trim(htmlspecialchars($_POST['prix']));
        $places = trim(htmlspecialchars($_POST['placesDisponibles']));
        $type = trim(htmlspecialchars($_POST['type']));

        
        if(empty($titre) || empty($description) || empty($dateDebut) || empty($dateFin)|| empty($prix)|| empty($places)){
            echo "data is empty";
            return;
        }
        $db  = new Database();
        $pdo = $db->getConnection();
        $act = new Activite(null,$titre,$description,$prix,$dateDebut,$dateFin,$places,$type); 
        $result = $act->creerActivite($pdo);
        if($result){
            header("Location: ../../public/admin/activite.php");
        }
        

        

    }else{
        echo "Please enter any data";
    }
}
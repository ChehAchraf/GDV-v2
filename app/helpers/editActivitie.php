<?php 
session_start();
require_once('../classes/Activite.php');
require_once('../classes/DB.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['submit']) ){
      
        $idActivity = trim(htmlspecialchars($_POST['id-edit']));
        $titre = trim(htmlspecialchars($_POST['titre-edit']));
        $description = trim(htmlspecialchars($_POST['description-edit']));
        $dateDebut = trim(htmlspecialchars($_POST['dateDebut-edit']));
        $dateFin = trim(htmlspecialchars($_POST['dateFin-edit']));
        $prix = trim(htmlspecialchars($_POST['prix-edit']));
        $places = trim(htmlspecialchars($_POST['placesDisponibles-edit']));
        $type = trim(htmlspecialchars($_POST['type-edit']));
     
        if(empty($titre) || empty($description) || empty($dateDebut) || empty($dateFin)|| empty($prix)|| empty($places)){
            echo "data is empty";
            return;
        }
        $db  = new Database();
        $pdo = $db->getConnection();
        $act = new Activite($idActivity,$titre,$description,$prix,$dateDebut,$dateFin,$places,$type); 
        $result = $act->modifierActivite($pdo);
        if($result){
            echo $result;
            header("Location: ../../public/admin/activite.php");
        }
        

        

    }else{
        echo "Please enter any data";
    }
}
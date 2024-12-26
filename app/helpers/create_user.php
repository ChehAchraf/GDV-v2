<?php 
require_once('../classes/User.php');
require_once('../classes/SuperAdmin.php');
require_once('../classes/Admin.php');
require_once('../classes/DB.php');

if($_SERVER['REQUEST_METHOD'] == "POST" && $_SESSION['user_role'] == "SuperAdmin"){
    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['password']) && isset($_POST['email'])  && isset($_POST['role']) ){
      
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        switch($_SESSION['user_role']){
            case 'SuperAdmin':
                $db  = new Database();
                $pdo = $db->getConnection();
            break;
        }

    }else{
        echo "kayn chi haja na9sa asat";
    }
}else{
    echo "you cant acces to this page directly";
}
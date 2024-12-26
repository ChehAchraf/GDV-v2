<?php 
require_once('../classes/User.php');
require_once('../classes/SuperAdmin.php');
require_once('../classes/Admin.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['password']) && isset($_POST['email'])  && isset($_POST['role']) ){
      
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        switch($_SESSION['user_role']){
            case 'Client':
                echo "you are just a client";
            break;
        }

    }else{
        echo "kayn chi haja na9sa asat";
    }
}else{
    echo "you cant acces to this page directly";
}
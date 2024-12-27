<?php 

require_once('../classes/User.php');
require_once('../classes/DB.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $idUser = $_POST['user_id'];
   echo $_POST['Ban'];
    $db  = new Database();
    $pdo = $db->getConnection();
    if(isset($_POST['Ban']) ){


        $user = new User($idUser,null,null,null,null,null);
        $user->setBan(1);
     
        $result = $user->banUnbanUser($pdo);
        if($result){
            echo $result;
            
        }
        

        

    }else if (isset($_POST['Unban'])){
        $user = new User($idUser,null,null,null,null,null);
        $user->setBan(0);
     
        $result = $user->banUnbanUser($pdo);
        if($result){
            echo $result;
            
        }
    }
    header("Location: ../../public/admin/users.php");

}
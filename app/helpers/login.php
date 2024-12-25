<?php 
require_once('../classes/User.php');
require_once('../classes/DB.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['email-login']) && isset($_POST['password-login'])){

        $email = trim($_POST['email-login']);
        $password = trim($_POST['password-login']);

        if(empty($email) or empty($password)){
            echo "data is empty";
            return;
        }
        $db  = new Database();
        $pdo = $db->getConnection();
        $user = new User('', '', $password, $email); 
        $result = $user->login($pdo);
        if($result){
           
            header("Location: ../../public/admin/index.php");
        }
        

        

    }else{
        echo "Please enter any data";
    }
}
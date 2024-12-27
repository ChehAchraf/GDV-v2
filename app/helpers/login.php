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
        $user = new User(null,'', '', $password, $email); 
        $result = $user->login($pdo);
   
        if($result == 202){
        
            if($_SESSION['user_role'] == "SuperAdmin" or $_SESSION['user_role'] == "Admin" ){
            header("Location: ../../public/admin/index.php");
            }else{
                header("Location: ../../public/client/home.php");
            }
        
        }else if($result == 404) {
            $_SESSION['error'] = 'This User is banned!!';
            header('Location: ../../public');
        }
        else {
            echo "Invalid User name or Password";
        }
        

        

    }else{
        header('Location: ../../public');
    }
   
}
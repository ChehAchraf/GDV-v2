<?php 
require_once('../classes/User.php');
require_once('../classes/DB.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['submit']) ){

        $email = trim(htmlspecialchars( $_POST['email-signup']));
        $password = trim(htmlspecialchars($_POST['password-signup']));
        $firstName=trim(htmlspecialchars($_POST['firstName-signup']));
        $lastName=trim(htmlspecialchars($_POST['lastName-signup']));

        if(empty($email) or empty($password)){
            echo "data is empty";
            return;
        }
        $db  = new Database();
        $pdo = $db->getConnection();

        $user1 = new User($firstName,$lastName,$password,$email);
        $res = $user1->register($pdo);
     
        if($res)
        {
            header("Location: ../../public");

        }
        else
        {
            $_SESSION['error']="User with this email already exists";
            header("Location: ../../public/signup.php");
        }

        

    }else{
        echo "Please enter any data";
    }
}
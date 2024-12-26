<?php 
require_once('../classes/User.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['submit']) ){
        $res = User::logout();
        if($res)
        {
            header("Location: /GDV-v2/public/index.php");
        }
    } else {
        echo "aa";
    }
} else {
    echo 'bb';
}
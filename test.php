<?php 

require_once('./app/classes/DB.php');
require_once('./app/classes/User.php');
require_once('./app/classes/SUperAdmin.php');
require_once('./app/classes/Admin.php');
require_once('./app/classes/Activite.php');
require_once('./app/classes/Reservation.php');


$db  = new Database();
$pdo = $db->getConnection();
$user1 = new User("ayoub","ben omar","1234","ayoub@gmail.com");
echo "<br>";
echo $user1->register($pdo);
$superAdmin = new SuperAdmin("adminName", "adminSurname", "adminPassword123", "admin@example.com");
echo "<br>";
echo $superAdmin->createSuperAdmin($pdo, "ashraf", "admin", "1234", "a@a.com");
echo "<br>";
$admin = new Admin("normaladmin","test","hhh"   ,"123");
echo $admin->createAdmin($pdo,"achraf","chehboun","password","ashrafchehboun@gmail.com");








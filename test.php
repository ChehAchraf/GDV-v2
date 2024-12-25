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
echo $superAdmin->createAdmin($pdo, "test", "ok", "dd", "admin1@dd.com","admin");
echo "<br>";
$admin = new Admin("normaladmin","test","hhh","123");
echo $admin->createAdmin($pdo,"achraf","chehboun","password","ashrafchehboun@gmail.com");

// $act1 = new Activite("Activtie1","my descirption",50,"2024-11-11","2024-11-11",20,"vol");
// echo "<br>";
// echo $act1->creerActivite($pdo);
$res = new Reservation(3,1,'En Attente',10);
echo "<br>";
 echo $res->creerReservation($pdo);
 echo "<br>";

 print_r(Reservation::getAllReservations($pdo));






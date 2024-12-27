<?php
require_once('../classes/User.php');
require_once('../classes/SuperAdmin.php');
require_once('../classes/Admin.php');
require_once('../classes/DB.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION['user_role'])) {
    $userRole = $_SESSION['user_role']; // Current logged-in user's role

    // Check required fields
    if (isset($_POST['nom'], $_POST['prenom'], $_POST['password'], $_POST['email'], $_POST['role'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $role = $_POST['role']; // Role to be created

        $db = new Database();
        $pdo = $db->getConnection();

        // Check permissions based on current user's role
        if ($userRole === "SuperAdmin") {
            $superAdmin = new SuperAdmin(null,"superAdminName", "superAdminSurname", "superAdminPassword123", "superAdmin@example.com");

            if ($role === "SuperAdmin") {
                $result = $superAdmin->createSuperAdmin($pdo, $nom, $prenom, $password, $email);
            } elseif ($role === "Admin") {
                $result = $superAdmin->createAdmin($pdo, $nom, $prenom, $password, $email);
            } else {
                echo "Error: Invalid role specified.";
                exit;
            }
        } elseif ($userRole === "Admin") {
            if ($role === "Admin") {
                $admin = new Admin(null,"adminName", "adminSurname", "adminPassword123", "admin@example.com");
                $result = $admin->createAdmin($pdo, $nom, $prenom, $password, $email);
            } else {
                echo "Error: You do not have permission to create a SuperAdmin.";
                exit;
            }
        } else {
            echo "Error: Unauthorized role.";
            exit;
        }

        // Handle result of user creation
        if ($result) {
            $_SESSION['added'] = '<div id="alertBox" class="w3-panel w3-green w3-round w3-padding-16 w3-large" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 999;">
                                    <strong>Success!</strong> The ' . htmlspecialchars($role) . ' has been added!
                                    <span class="w3-closebtn" style="cursor:pointer" onclick="this.parentElement.style.display=\'none\'">&times;</span>
                                  </div>';
            header("Location: ../../public/admin/");
            exit;
        } else {
            echo "Error: Unable to add the user.";
        }
    } else {
        echo "Error: Missing required fields.";
    }
} else {
    echo "Error: Unauthorized access.";
}

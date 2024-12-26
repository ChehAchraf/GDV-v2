<?php
class SuperAdmin extends User {
    public function createAdmin($pdo, $nom, $prenom, $password, $email) {
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        if ($user) {
            return "Admin with this email already exists.";
        }
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, prenom, mot_de_passe, email, role) VALUES (:nom, :prenom, :password, :email, :role)");
        $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'password' => $hashedPassword,
            'email' => $email,
            'role' => 'admin'
        ]);

        return "Admin created successfully.";
    }
    public function createSuperAdmin($pdo, $nom, $prenom, $password, $email ) {
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        if ($user) {
            return "SuperAdmin with this email already exists.";
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, prenom, mot_de_passe, email, role) VALUES (:nom, :prenom, :password, :email, :role)");
        $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'password' => $hashedPassword,
            'email' => $email,
            'role' => 'SuperAdmin'
        ]);

        return true;
    }

    public function __toString() {
        return "SuperAdmin: " . $this->nom . " " . $this->prenom;
    }
}
?>

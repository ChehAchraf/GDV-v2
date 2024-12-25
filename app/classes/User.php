<?php
class User {
    protected $nom;
    protected $prenom;
    protected $password;
    protected $role;

    public function __construct($nom, $prenom, $password, $role = 'client') {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->password = $password;
        $this->role = $role;
    }

    public function login($pdo) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE nom = :nom AND prenom = :prenom");
        $stmt->execute(['nom' => $this->nom, 'prenom' => $this->prenom]);
        $user = $stmt->fetch();

        if ($user && password_verify($this->password, $user['password'])) {
            return "Login successful! Welcome, {$this->nom} {$this->prenom}";
        }
        return "Invalid username or password";
    }

    public function register($pdo) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE nom = :nom AND prenom = :prenom");
        $stmt->execute(['nom' => $this->nom, 'prenom' => $this->prenom]);
        $user = $stmt->fetch();

        if ($user) {
            return "User already exists";
        }

        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (nom, prenom, password, role) VALUES (:nom, :prenom, :password, :role)");
        $stmt->execute([
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'password' => $hashedPassword,
            'role' => $this->role
        ]);

        return "User registered successfully";
    }
    public function makeReservation($pdo, $activityId, $userId, $date) {
        $stmt = $pdo->prepare("INSERT INTO reservations (user_id, activity_id, date) VALUES (:user_id, :activity_id, :date)");
        $stmt->execute(['user_id' => $userId, 'activity_id' => $activityId, 'date' => $date]);

        return "Reservation made successfully";
    }
}
?>

<?php
class User {
    protected $id;
    protected $username;
    protected $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    

    public function login($pdo) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $this->username]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($this->password, $user['password'])) {
            return $user;
        }
        return null;
    }

    public function register($pdo) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $this->username]);
        $user = $stmt->fetch();
        
        if ($user) {
            return "User already exists";
        } else {
            $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
            $stmt->execute(['username' => $this->username, 'password' => $hashedPassword]);
            return "User registered successfully";
        }
    }

    public function makeReservation($pdo, $activityId, $userId, $date) {
        $stmt = $pdo->prepare("INSERT INTO reservations (user_id, activity_id, date) VALUES (:user_id, :activity_id, :date)");
        $stmt->execute(['user_id' => $userId, 'activity_id' => $activityId, 'date' => $date]);
        return "Reservation made successfully";
    }
}
?>

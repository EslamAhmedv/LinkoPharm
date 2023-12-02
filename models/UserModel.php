<?php
require_once("../models/Model.php");

class UserModel extends Model {

    public function addUser($firstname, $lastname, $username, $email, $gender, $password) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (firstname, lastname, username, email, gender, password) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssss", $firstname, $lastname, $username, $email, $gender, $passwordHash);
        return $stmt->execute();
    }

    public function checkUserExists($email) {
        $query = "SELECT email FROM users WHERE email = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }
}

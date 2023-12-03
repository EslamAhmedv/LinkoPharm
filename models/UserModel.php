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














    public function userLogin($email, $password) {
        $checkLogin = "SELECT * FROM users WHERE email = ? LIMIT 1";
        $stmt = $this->conn->prepare($checkLogin);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();

            // Validate the password using password_verify
            if (password_verify($password, $data['password'])) {
                $this->userAuthentic($data);
                return true;
            }
        }

        return false;
    }


    private function userAuthentic($data) {
        $_SESSION['authenticated'] = true;
        $_SESSION['auth_user'] = [
            'user_id' => $data['id'],
            'user_fname' => $data['firstname'],
            'user_lname' => $data['lastname'],
            'user_name' => $data['username'],
            'user_email' => $data['email'],
            'user_gender' => $data['gender'],
            // Avoid storing the password in the session
            // 'user_pass' => $data['password'], 
        ];}









public function getUserById($userId) {
    $query = "SELECT * FROM users WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null; // User not found
    }
}






public function getPasswordHash($userId) {
    $query = "SELECT password FROM users WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
        return $userData['password'];
    } else {
        return null; // User not found
    }
}

public function updatePassword($userId, $newPasswordHash) {
    $query = "UPDATE users SET password = ? WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("si", $newPasswordHash, $userId);
    $stmt->execute();
}
}
?>
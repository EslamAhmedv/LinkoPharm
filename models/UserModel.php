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

    // public function updatePasswordResetToken($email, $token) {
    //     $email = $this->db->real_escape_string($email);
    //     $token = $this->db->real_escape_string($token);

    //     // Assuming your users table has columns 'email' and 'reset_token'
    //     $query = "UPDATE users SET reset_token = '$token' WHERE email = '$email'";

    //     if ($this->db->query($query)) {
    //         // Update successful
    //         return true;
    //     } else {
    //         // Update failed
    //         echo "Error updating record: " . $this->db->error;
    //         return false;
    //     }
    // }












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

public function updatePassword($userId, $hashedNewPassword) {
    $query = "UPDATE users SET password = ? WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("si", $hashedNewPassword, $userId);
    return $stmt->execute();
}









public function getUserRole($userId) {
    $query = "SELECT role FROM users WHERE id = ?";
    $stmt = $this->conn->prepare($query);

    if (!$stmt) {
        die("Error in preparing the statement: " . $this->conn->error);
    }

    $stmt->bind_param("i", $userId);

    if (!$stmt->execute()) {
        die("Error in executing the statement: " . $stmt->error);
    }

    $result = $stmt->get_result();

    if (!$result) {
        die("Error in getting result set: " . $stmt->error);
    }

    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
        return $userData['role'];
    } else {
        return null; // User not found
    }
}











public function updateUserInfo($userId, $newFirstName, $newLastName, $newUsername, $newEmail, $newGender) {
    $query = "UPDATE users SET firstname = ?, lastname = ?, username = ?, email = ?, gender = ? WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("sssssi", $newFirstName, $newLastName, $newUsername, $newEmail, $newGender, $userId);
    return $stmt->execute();
}





















// public function updatePassword($userId, $newPasswordHash) {
//     $query = "UPDATE users SET password = ? WHERE id = ?";
//     $stmt = $this->conn->prepare($query);
//     $stmt->bind_param("si", $newPasswordHash, $userId);
//     return $stmt->execute();
// }





public function getAdminInfo() {
    $query = "SELECT * FROM users WHERE role = '1' LIMIT 1"; 
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

public function getTotalUsers() {
    $query = "SELECT COUNT(*) as total FROM users"; 
    $result = $this->conn->query($query);
    if ($result) {
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return 0; 
    }
}


}
?>
<?php
class ForgetPassController {
    public function forgotPassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];

            // Validate the email (you can use a more robust validation method)
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Generate a temporary token (you can use a more secure method)
                $token = md5(uniqid(rand(), true));

                // Instantiate the model
                $userModel = new UserModel();

                // Update the database with the reset token
                $userModel->updatePasswordResetToken($email, $token);

                // Send an email with a link containing the token
                $resetLink = "http://example.com/reset_password.php?token=$token";
                $emailSubject = "Password Reset";
                $emailBody = "Click the following link to reset your password: $resetLink";

                mail($email, $emailSubject, $emailBody);

                // Redirect to a confirmation page
                header("Location: forgot_password_confirmation.php");
                exit;
            } else {
                // Invalid email format, handle accordingly
                echo "Invalid email format";
            }
        }

        // Load the view for the forgot password form
        include 'views/forgot_password.php'; // Adjust the path accordingly
    }
}
?>

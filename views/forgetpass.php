<?php
//require 'vendor/autoload.php'; // Include the PHPMailer autoloader

//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email entered by the user
    $email = $_POST["email"];

    // TODO: Validate the email (you can use filter_var function)
    // Example validation:
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Handle invalid email format, perhaps show an error message
        echo "Invalid email format";
        exit();
    }

    // TODO: Check if the email exists in your database
    // Example check (replace with your database query):
    $userExists = checkIfUserExists($email);
    if (!$userExists) {
        // Handle non-existent email, perhaps show an error message
        echo "Email not found";
        exit();
    }

    // TODO: Generate a unique token and save it in the database with the user's email
    // Example token generation (use a secure method):
    $token = bin2hex(random_bytes(16));

    // Example database update (replace with your database query):
    saveTokenInDatabase($email, $token);
   // $mail = new PHPMailer(true);

    try {
        //Server settings
       /* $mail->isSMTP();
        $mail->Host       = 'smtp.example.com'; // Replace with your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'your-email@example.com'; // Replace with your email
        $mail->Password   = 'your-email-password'; // Replace with your email password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;
    
        //Sender and recipient settings
        $mail->setFrom('your-email@example.com', 'Your Name');
        $mail->addAddress($email); // User's email
        $mail->addReplyTo('your-email@example.com', 'Your Name');
    
        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Password Reset';
        $mail->Body    = "Click the link to reset your password: $resetLink";
    
        $mail->send();*/
    
        // For demonstration purposes, you can redirect to a success message
        header("Location: forgot_password_success.php");
        exit();
    }
    catch (Exception $e) {
        // Handle email sending failure
        echo "Email sending failed. Error: {$mail->ErrorInfo}";
    }
}

// Function to check if the user exists in the database
function checkIfUserExists($email) {
    $dbConnection = mysqli_connect("localhost", "root", "", "linkopharm");

    if (!$dbConnection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $email = mysqli_real_escape_string($dbConnection, $email);

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($dbConnection, $query);

    mysqli_close($dbConnection);

    return mysqli_num_rows($result) > 0;
}

// Function to save the token in the database
function saveTokenInDatabase($email, $token) {
       // Replace this with your database query to save the token
    // Example: 
    $dbConnection = mysqli_connect("localhost", "root", "", "linkopharm");

    if (!$dbConnection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $email = mysqli_real_escape_string($dbConnection, $email);
    $token = mysqli_real_escape_string($dbConnection, $token);

    $query = "UPDATE users SET reset_token = '$token' WHERE email = '$email'";
    mysqli_query($dbConnection, $query);

    mysqli_close($dbConnection);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap">
    <link rel="stylesheet" href="../public/css/forgetpass.css">
    <title>Forgot Password</title>
</head>
<body>
    <br>
    <br>
    <div class="cont">
        <div class="form">
            <h1>Forgot Password?</h1>
            <h4>Enter your email address...</h4>
        
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label>
                    <i class="uil uil-envelope"></i>
                    <span>Email:</span>
                    <br>
                    <input type="email" name="email" required>
                </label>
                <button type="submit" class="submit">Continue</button>
            </form>

          
        </div>
    </div>
</body>
</html>

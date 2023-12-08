<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}

require_once("../controllers/UserController.php");

$userController = new UserController();
$userId = $_SESSION['auth_user']['user_id'];

// Fetch user data
$userData = $userController->getUserProfile($userId);

// Check if the user data exists
if ($userData) {
    $firstname = $userData['firstname'];
    $lastname = $userData['lastname'];
    $username = $userData['username'];
    $email = $userData['email'];
    $gender = $userData['gender'];
    // Add other fields as needed
} else {
    // Handle case where user data is not found
    echo "User not found.";
    exit();
}
?>
























<link rel="stylesheet" href="../public/css/profile.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">














    <body>
<?php include('../partials/navbar.php'); ?>

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="../public/images/userr.avif"><span class="font-weight-bold"><?php echo $username; ?></span><span class="text-black-50"><?php echo $email; ?></span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control" placeholder="first name" value="<?php echo $firstname; ?>"></div>
                    <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" value="<?php echo $lastname; ?>" placeholder="surname"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value=""></div>
                    <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" class="form-control" placeholder="enter address line 1" value=""></div>
                  
                    <div class="col-md-12"><label class="labels">Gender</label><input type="text" class="form-control" placeholder="enter address line 2" value="<?php echo $gender; ?>"></div>
                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value="<?php echo $email; ?>"></div>
                  
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value=""></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state"></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>change password</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Settings</span></div><br>
                <div class="col-md-12"><label class="labels">Current Password</label><input type="text" class="form-control" placeholder="old password" value=""></div> <br>
                <div class="col-md-12"><label class="labels">New Password</label><input type="text" class="form-control" placeholder="new password" value=""></div>
                <div class="col-md-12"><label class="labels">Confirm Password</label><input type="text" class="form-control" placeholder="new password" value=""></div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save password</button></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>   </body>
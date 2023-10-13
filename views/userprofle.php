
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap/bootstrap-icons.css">
</head>
<body>

	<!-- <div class="text-center p-1"><a href="users.php">All users</a></div> -->

	
		<div class="row col-lg-8 border rounded mx-auto mt-5 p-2 shadow-lg">
			<div class="col-md-4 text-center">
				<img src="../public/images/profile-pic.jpg" style="width: 180px;height:180px;object-fit: cover;">
				<div>

					

						<a href="profile-edit.php">
							<button class="mx-auto m-1 btn-sm btn btn-primary">Edit</button>
						</a>
						<a href="profile-delete.php">
							<button class="mx-auto m-1 btn-sm btn btn-warning text-white">Delete</button>
						</a>
						<a href="logout.php">
							<button class="mx-auto m-1 btn-sm btn btn-info text-white">Logout</button>
						</a>
					
				</div>
			</div>
			<div class="col-md-8">
				<div class="h2">User Profile</div>
				<table class="table table-striped">
					<tr><th colspan="2">User Details:</th></tr>
					<tr><th><i class="bi bi-envelope"></i> Email</th><td>user@gmail.com</td></tr>
					<tr><th><i class="bi bi-person-circle"></i> First name</th><td>mohamed</td></tr>
					<tr><th><i class="bi bi-person-square"></i> Last name</th><td>ali</td></tr>
					<tr><th><i class="bi bi-gender-ambiguous"></i> Gender</th><td>Male</td></tr>
				</table>
			</div>
		</div>
	<!-- <div class="text-center alert alert-danger">That profile was not found</div>
		<a href="index.php">
			<button class="btn btn-primary m-4">Home</button>
		</a> -->
	

</body>
</html>
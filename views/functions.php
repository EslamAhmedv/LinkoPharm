<?php 

session_start();

function login($data2)
{
	$errors2 = array();
 
	//validate 
	if(!filter_var($data2['email'],FILTER_VALIDATE_EMAIL)){
		$errors2[] = "Please enter a valid email";
	}

	if(strlen(trim($data2['password'])) < 4){
		$errors2[] = "Password must be atleast 4 chars long";
	}
 
	//check
	if(count($errors2) == 0){

		$arr['email'] = $data2['email'];
		$password = hash('sha256', $data2['password']);

		$query = "select * from users where email = :email limit 1";

		$row = database_run($query,$arr);

		if(is_array($row)){
			$row = $row[0];

			if($password === $row->password){
				
				$_SESSION['USER'] = $row;
				$_SESSION['LOGGED_IN'] = true;
			}else{
				$errors2[] = "wrong email or password";
			}

		}else{
			$errors2[] = "wrong email or password";
		}
	}
	return $errors2;
}


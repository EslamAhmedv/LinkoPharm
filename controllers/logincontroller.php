<?php
//include("../config/app.php");
class logincontroller{
    
	public function __construct(){
        $db=new dbcon;
        $this->conn = $db->conn;
    }
    

    public function userlogin($email,$password){
        $checklogin= "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";
        $result= $this->conn->query($checklogin);

        if($result->num_rows > 0){
          $data = $result->fetch_assoc();
          $this->userauthentic($data); 
          return true;

        }
        else{
            return false;

        }




       
    }

    private function userauthentic($data){
        $_SESSION['authenticated'] = true;
       // $_SESSION['auth_role'] = $data['role_as'];
       $_SESSION['auth_user'] = [
        'user_id'=>$data['id'],
        'user_fname'=>$data['firstname'],
        'user_lname'=>$data['lastname'],
        'user_name'=>$data['username'],
        'user_email'=>$data['email'],
        'user_gender'=>$data['gender'],
        'user_pass'=>$data['password'],
       ];


    }

}
    ?>
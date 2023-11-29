<?php
//include("../config/app.php");
class regcontrollers{
    
	public function __construct(){
        $db=new dbcon;
        $this->conn = $db->conn;
    }
    

    public function registration($firstname,$lastname,$username,$email,$gender,$password){
        $register_query= "insert into users (firstname,lastname,username,email,gender,password) values ('$firstname','$lastname','$username','$email','$gender','$password')";
        $result= $this->conn->query($register_query);
        return $result;
    }





    public function isuserexist(){
        $checkuser= "SELECT email FROM users WHERE email = '$email' LIMIT 1 ";
        $result= $this->conn->query( $checkuser);
        if($result->num_rows > 0){
            return true;

        }
        else{
            return false;

        }

    }



    public function confirmpassword($password,$password2){
        if($password==$password2){
            return true;

        }
        else{
            return false;

        }
    }


}






?>
<?php 
// include("../config/app.php");
include_once("../controllers/regcontrollers.php");
include_once("../controllers/logincontroller.php");






    
$auth=new logincontroller;
if(isset($_POST['log'])){

    $email =validateinput( $db->conn, $_POST['email']);
    $password = validateinput( $db->conn, $_POST['password']);

    $checklogin= $auth->userlogin($email,$password);
    if($checklogin){
        redirect("successsssss","index.php");


       }
       else{
        redirect("faileeeeeeeeeeeeeeeed","login.php");




       }










}























if(isset($_POST['reg'])){ //check if form was submitted
    $firstname =validateinput( $db->conn, $_POST['firstname']);
    $lastname =validateinput( $db->conn, $_POST['lastname']);
    $username = validateinput( $db->conn, $_POST['username']);
    $email =validateinput( $db->conn, $_POST['email']);
    $gender =validateinput( $db->conn, $_POST['gender']);
    $password = validateinput( $db->conn, $_POST['password']);
    $password2 = validateinput( $db->conn, $_POST['password2']);
	
	$register=new regcontrollers;
    $result_password =$register->confirmpassword($password,$password2);
    if($result_password){
       $result_user=$register->isuserexist($email);
       if($result_user){
        redirect("email alredy exist","login.php");


       }else{

$register_query=$register->registration($firstname,$lastname,$username,$email,$gender,$password);
if($register_query){
    redirect("registered success","index.php");


   }else{ redirect("something went wrong","signup.php");}


       }
      

    }
    else{
        redirect("passwords doesn't match","404page.php");
        

    }
	
}




?>
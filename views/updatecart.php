<?php 
  session_start();
  
  $id=$_POST["id"];
  $quantity=$_POST["quantity"];
  
  require_once '../controllers/CartController.php';
  $cart=new CartController();

  $cart->update_cart(["id"=>$id,"qty"=>$qty]);
  
  $result=[
	"row_total"=>$cart->get_item($id)["total"],
	"total"=>$cart->get_cart_total(),
  ];
  echo json_encode($result);
  
?>
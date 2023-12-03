<?php


require_once("config.php");




function base_url($slug){
    echo SITE_URL.$slug;
}


function redirect($message,$page){
    $redirectTo=SITE_URL.$page;
    $_SESSION["message"]="$message";
    header("Location:   $redirectTo");
    exit(0);



}



function validateinput($dbcon,$input){

    return mysqli_real_escape_string($dbcon,$input);
}

?>




<?php 
    if(isset($_COOKIE["cart"])){
        foreach ($_COOKIE["cart"] as $name => $value) {
            setcookie("cart[".$name."]", "", time() - 1000, "/");
        }
    }
    
    session_start();
    $_SESSION=array();
    session_destroy();
    header("location: ../login.php");
    exit;
?>
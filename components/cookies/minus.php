<?php
    if(isset($_POST["id"]) && is_numeric($_POST["id"])){
    $id=$_POST["id"];
    
    
    if($_COOKIE["cart"][$id]==1){
        setcookie("cart[".$id."]", "", time()-1000 , "/");
    }
    else{
        setcookie("cart[".$id."]", ($_COOKIE["cart"][$id]-1), time()+(86400 * 30) , "/");
    }
    $_POST["id"]="";
    }
    header("location: /cart");
?>
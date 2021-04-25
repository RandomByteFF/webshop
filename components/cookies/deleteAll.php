<?php 
if(isset($_COOKIE["cart"])){
    foreach ($_COOKIE["cart"] as $name => $value) {
        setcookie("cart[".$name."]", "", time() - 1000, "/");
    }
}
header("location: /cart");
?>
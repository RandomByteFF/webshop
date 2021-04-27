<?php
session_start();
if (isset($_POST["amount"]) && isset($_POST["id"])) {
    $id = $_POST["id"];
    $amount = $_POST["amount"];
    $item = "cart[".$id.
    "]";
    if (isset($_COOKIE["cart"][$id])) {
        setcookie($item, $amount + $_COOKIE["cart"][$id], time() + (86400 * 30), "/");
    } else {
        setcookie($item, $amount, time() + (86400 * 30), "/");
    }
}
header("location: /item.php/?id=".$_POST["id"]); 
?>
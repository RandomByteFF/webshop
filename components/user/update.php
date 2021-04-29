<?php
    session_start();
    $values= array("email", "name", "postal_code", "town", "address", "phone");
    foreach ($values as &$value) {
        if(isset($_POST[$value]) && $_POST[$value] != $_SESSION[$value]){
            $_SESSION[$value]= $_POST[$value];
        }
    }
    header("location: /profile");
    exit();
?>
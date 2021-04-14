<?php 
session_start();
$error=false;
if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true)
{
    header("location: index.php");
    exit;
}

$values= array("email", "name", "postal_code", "town", "address");
foreach ($values as &$value){
    if(isset($_POST[$value])){
        $_SESSION[$value] = $_POST[$value];
    }
    else{
        $error = true;
        $_SESSION["loggedIn"]=false;
    }
}
if($error == false){
    $shoppingCart = array();
    $_SESSION["loggedIn"] = true;
    $_SESSION["shoppingCart"] = serialize($shoppingCart);
    header("location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../stylesheets/login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="card p-2">
                <div class="card-header h2">
                    Bejelentkezés
                </div>
                <div class="card-body row">
                    <div class="col-sm-12 p-1">
                        <div class="form-floating">
                            <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="col-sm-12 p-1">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="name" placeholder="name" required>
                            <label for="name">Név</label>
                        </div>
                    </div>
                    <div class="col-md-5 p-1">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="postal_code" placeholder="0000" pattern="[0-9]{4}" required>
                            <label for="postal_code">Irányító szám</label>
                        </div>
                    </div>
                    <div class="col-md-7 p-1">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="town" placeholder="town" required>
                            <label for="town">Település</label>
                        </div>
                    </div>
                    <div class="col-sm-12 p-1">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="address" placeholder="street" required>
                            <label for="address">Lakcím</label>
                        </div>
                    </div>
                    <div class="col-sm-12 p-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="accept_cookie" name="accept_cookie" required>
                            <label class="form-check-label" for="accept_cookie">elfogadom az oldal cookie használatát</label>
                        </div>
                    </div>
                </div>
                <?php if($error != true){
                    echo "<div class='alert alert-danger' role='alert'>Hiba történt</div>";
                }?>
                <input type="submit" class="btn btn-primary" value="Belépés">
            </div>
        </form>
    <div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>

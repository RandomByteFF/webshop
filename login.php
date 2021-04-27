<?php 
session_start();
$error=false;
if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true)
{
    header("location: ..");
    exit;
}

$values= array("email", "name", "postal_code", "town", "address", "phone");
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
    $_SESSION["loggedIn"] = true;
    header("location: ..");
    exit;
}
?>

<!DOCTYPE html>
<html lang="hu">
<?php 
    include_once("components/header.php");
    SetHeader("Login", array("login.css"));
?>

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
                            <input type="email" class="form-control" name="email" placeholder="name@example.com"
                                required>
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
                            <input type="text" class="form-control" name="postal_code" placeholder="0000"
                                pattern="[0-9]{4}" required>
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
                        <div class="form-floating">
                            <input type="tel" class="form-control" name="phone" placeholder="street"
                                pattern="([0-9]{11}|\+[0-9]{11})" required>
                            <label for="phone">Telefonszám</label>
                        </div>
                    </div>
                    <div class="col-sm-12 p-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="accept_cookie"
                                name="accept_cookie" required>
                            <label class="form-check-label" for="accept_cookie">Elfogadom az oldal cookie
                                használatát</label>
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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
                crossorigin="anonymous"></script>
</body>

</html>
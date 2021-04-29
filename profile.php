<!DOCTYPE html>
<html lang="hu">
<?php 
    include_once("components/header.php");
    SetHeader("Home", array("navbar.css", "style.css"));
?>

<body>
    <div class="content">
        <?php include_once("components/menu.php"); ?>

        <form class="form" action="<?php echo "components/user/update.php"; ?>" method="POST">
            <div class="card p-2">
                <div class="card-header h2">
                    Bejelentkezés
                </div>
                <div class="card-body row">
                    <div class="col-sm-12 p-1">
                        <div class="form-floating">
                            <input type="email" class="form-control" name="email" value="<?php echo $_SESSION["email"]; ?>" placeholder="name@example.com">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="col-sm-12 p-1">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="name" placeholder="name" value="<?php echo $_SESSION["name"]; ?>">
                            <label for="name">Név</label>
                        </div>
                    </div>
                    <div class="col-md-5 p-1">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="postal_code" placeholder="0000" value="<?php echo $_SESSION["postal_code"]; ?>" pattern="[0-9]{4}">
                            <label for="postal_code">Irányító szám</label>
                        </div>
                    </div>
                    <div class="col-md-7 p-1">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="town" placeholder="town" value="<?php echo $_SESSION["town"]; ?>" >
                            <label for="town">Település</label>
                        </div>
                    </div>
                    <div class="col-sm-12 p-1">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="address" placeholder="street" value="<?php echo $_SESSION["address"]; ?>">
                            <label for="address">Lakcím</label>
                        </div>
                    </div>
                    <div class="col-sm-12 p-1">
                        <div class="form-floating">
                            <input type="tel" class="form-control" name="phone" placeholder="street" value="<?php echo $_SESSION["phone"]; ?>"
                                pattern="([0-9]{11}|\+[0-9]{11})" >
                            <label for="phone">Telefonszám</label>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="Frissítés">
            </div>
        </form>
    </div>
    <?php include_once("components/footer.php"); ?>
</body>

</html>
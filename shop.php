<!DOCTYPE html>
<html lang="hu">
<?php 
    include_once("components/header.php");
    SetHeader("Shop", array("navbar.css", "style.css"));
?>

<body>
    <div class="content">
        <?php include_once("components/menu.php"); ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 itemrow d-flex justify-content-center">
                    <div class="p-2" style="width: 300px;">
                        <div class="card card-body">
                            <select class="form-select" aria-label="Default select" style="margin-bottom: 15px">
                                <option selected="">Gyártó</option>
                                <option value="1">ezt</option>
                                <option value="2">majd</option>
                                <option value="3">sql</option>
                            </select>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="option1" id="option1" name="option1">
                                <label class="form-check-label" for="option1">
                                    RGB világítás
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="option2" id="option2" name="option2">
                                <label class="form-check-label" for="option2">
                                    Bluetooth
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="option2" id="option2" name="option2">
                                <label class="form-check-label" for="option2">
                                    Vezeték nélküli
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-8">
                    <div class="card-group">
                        <?php
                            //sql magic
                            include_once("components/sql.php");
                            if(isset($_GET["s"]) && $_GET["s"]==true)
                            {
                                $query = "SELECT * FROM items WHERE";
                                $options= array("brand");
                                foreach ($options as &$option) {
                                    if(isset($_GET[$option])){
                                        $query= $query."(".$option.' = "'.$_GET[$option].'")';
                                    }
                                }
                            }
                            else{
                                $query = "SELECT * FROM items";
                            }
                            $result = $conn->query($query);
                            if ($result !== false && $result->num_rows > 0) {
                                while($row = $result->fetch_assoc()){
                                    echo '<div class="col itemrow">
                                        <div class="card item shadow-sm" style="width: 18rem">
                                            <img src="images/items/'.($row["id"]).'.jpg" class="card-img-top shop-item">
                                            <div class="card-body">
                                                <h5 class="card-title">'.$row["name"].'</h5>
                                                <p class="card-text">'.$row["brand"].'</p>
                                                <a href=item.php/?id='.$row["id"].' class="btn btn-primary">Részletek</a>
                                            </div>
                                        </div>
                                    </div>';

                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once("components/footer.php") ?>
</body>
</html>
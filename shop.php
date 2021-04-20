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
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="option1" id="option1" name="option1">
                                <label class="form-check-label" for="option1">
                                    Option 1
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="option2" id="option2" name="option2">
                                <label class="form-check-label" for="option2">
                                    Option 2
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-8">
                    <div class="card-group">
                        <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $conn = new mysqli($servername, $username, $password);
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            $sql = "SELECT * FROM items";
                            $result = $conn->query($sql);
                            if ($result !== false && $result->num_rows > 0) {
                                while($row = $result->fetch_assoc()){
                                    echo $row["joe"];
                                }
                            }
                            $conn->close();
                            $dir = "images/items/";
                            $scan = scandir($dir);
                            $imagesCount = count($scan) - 2;
                            for ($i=0; $i < count($scan); $i++) {
                                if ($scan[$i] !== "." && $scan[$i] !== ".."){
                                    echo "<div class=\"col itemrow\">
                                        <div class=\"card item shadow-sm\" style=\"width: 18rem;\">
                                            <img src=\"$dir"."$scan[$i]\" class=\"card-img-top shop-item\">
                                            <div class=\"card-body\">
                                                <h5 class=\"card-title\">Fat fuck</h5>
                                                <p class=\"card-text\">$scan[$i]</p>
                                                <a href=\"#\" class=\"btn btn-primary\">Chonk</a>
                                            </div>
                                        </div>
                                    </div>";
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
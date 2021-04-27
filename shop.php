<!DOCTYPE html>
<html lang="hu">
<?php 
    include_once("components/header.php");
    SetHeader("Shop", array("navbar.css", "style.css", "shop.css"));
?>

<body>
    <script>
        let color = [];

        function setup() {
            color = <?php echo isset($_GET["colors"]) && $_GET["colors"] != "" ? '("'.$_GET["colors"].'").split(".")': "[]"; ?>;
            document.getElementById("colorField").value = (color + "").replaceAll(",", ".");
        }

        window.onload = setup;

        function change(col) {
            let btn = document.getElementById(col);

            if (color.includes(col)) {
                let index = color.indexOf(col);
                color.splice(index, 1);
                let bg = btn.style.backgroundColor;
                btn.style.color = bg;
            } else {
                color.push(col);
                if (col != "White") {
                    btn.style.color = "white";
                } else {
                    btn.style.color = "black";
                }
            }

            var field = document.getElementById("colorField");
            result = color + "";
            if (color != []) {
                field.value = result.replaceAll(",", ".");
            }
        }
    </script>
    <div class="content">
        <?php include_once("components/menu.php"); ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-3 itemrow d-flex justify-content-center">
                    <div class="p-2 settings">
                        <?php include_once("components/sql/search.php") ?>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="card-group">
                        <?php
                                $result = $conn->query($query);
                                $conn->close();
                                
                                if ($result !== false && $result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()){
                                        echo '<div class="col itemrow">
                                                <div class="card item shadow-sm" style="width: 18rem">
                                                    <a href=item.php/?id='.$row["id"].'><img src="images/items/'.($row["id"]).'.jpg" class="card-img-top shop-item"></a>
                                                    <div class="card-body">
                                                        <a href=item.php/?id='.$row["id"].'><h5 class="card-title">'.$row["name"].'</h5></a>
                                                        <div class="shop-bottom">
                                                            <p class="card-text price">'.$row["price"].' Ft</p>
                                                            <a href=item.php/?id='.$row["id"].' class="btn btn-primary white-text">Részletek</a>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>';
                                    }
                                }
                                else{
                                    echo "<p class='text-center text-white h1' style='width: 100vw'>Nincs találat...</p>";
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
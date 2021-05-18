<?php 
    include_once("sql.php");
    $query = "SELECT * FROM items";
    if (isset($_GET) && count($_GET) > 0) {
        $filters = "";
        $previous = false;
        //CHECKING BRAND NAME
        if (isset($_GET["brand"]) && $_GET["brand"] !== "any") {
            $previous = true;
            $filters = '(brand = "'.$_GET["brand"].'")';
        }
        //PRICES
        if(isset($_GET["maxPrice"]) && is_numeric($_GET["maxPrice"])){
            $filters = $filters.($previous == true ? " AND " : "")."( price < ".$_GET["maxPrice"].")";
            $previous = true;
        }
        if(isset($_GET["minPrice"]) && is_numeric($_GET["minPrice"])){
            $filters = $filters.($previous == true ? " AND " : "")."( price > ".$_GET["minPrice"].")";
            $previous = true;
        }
        //CHECKING OTHER OPTIONS
        $options = array("bluetooth", "rgb", "wireless");
        foreach($options as & $option) {
            if (isset($_GET[$option])) {
                if ($_GET[$option] == true || $_GET[$option] == false) {
                    $filters = $filters.($previous == true ? " AND " : "")."(".$option.' = '.$_GET[$option].')';
                    $previous = true;
                }
            }
        }
        //CHECKING COLORS
        if (isset($_GET["colors"]) && $_GET["colors"] != "") {
            $colorList = explode(".", $_GET["colors"]);
            $cf = "";
            $prev = false;
            foreach($colorList as & $color) {
                $cf = $cf.($prev ? " OR " : "")."(color LIKE '%".$color."%')";
                $prev = true;
            }
            $filters = $filters.($previous ? " AND " : "")."(".$cf.") GROUP BY id";
        }
        //CHECKING SEARCH
        if (isset($_GET["search"])) {
            $filters = $filters.($previous ? " AND " : "")."name LIKE '%".$_GET["search"]."%'";
        }
        //ORDER BY
        $order = "";
        if (isset($_GET["order"]) && is_numeric($_GET["order"])) {

            switch ($_GET["order"]) {
                case 0:
                    $order = "ORDER BY name ASC";
                    break;
                case 1:
                    $order = "ORDER BY name DESC";
                    break;
                case 2:
                    $order = "ORDER BY price ASC";
                    break;
                case 3:
                    $order = "ORDER BY price DESC";
                    break;
            }

        }
        //APPLYING FILTER
        if ($filters != "") {
            $query = $query.
            " WHERE ".$filters;
        }
        $query = $query.
        " ".$order;
        //echo '<script>console.log("'.$query.'")</script>';
    }
?>

<form action="<?php echo $_SERVER["PHP_SELF"] . '?'.http_build_query($_GET); ?>" method="get">
    <div class="card card-body settings">
        <select class="form-select mb-2" aria-label="Default select" name="brand">
            <option value="any">Gyártó</option>
            <?php
                $brands = $conn->query("SELECT brand FROM items GROUP BY brand");
                while($brand = $brands->fetch_assoc()){
                    echo '<option value="'.$brand["brand"].'">'.$brand["brand"].'</option>';
                }
            ?>
        </select>


        <hr>
        <div class="accordion" id="accordionBasic">
            <div class="accordion-item">
                <h2 class="accordion-header" id="function">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#prices"
                        aria-expanded="true" aria-controls="prices">
                        Árak
                    </button>
                </h2>
                <div id="prices" class="accordion-collapse collapse show" aria-labelledby="prices">
                    <div class="accordion-body row">
                        <div class="col-12 col-xxl-6 p-1"><input type="number" name="minPrice" class="form-control"
                                placeholder="Minimum" value="<?php echo (isset($_GET["minPrice"]) ? $_GET["minPrice"] : "")?>"></div>
                        <div class="col-12 col-xxl-6 p-1"><input type="number" name="maxPrice" class="form-control"
                                placeholder="Maximum" value="<?php echo (isset($_GET["maxPrice"]) ? $_GET["maxPrice"] : "")?>"></div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="function">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#functions"
                        aria-expanded="true" aria-controls="functions">
                        Funkciók
                    </button>
                </h2>
                <div id="functions" class="accordion-collapse collapse show" aria-labelledby="functions">
                    <div class="accordion-body">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="rgb" name="rgb" value="true"
                                <?php echo (isset($_GET["rgb"]) && $_GET["rgb"]==true ? "checked" : "")?>>
                            <label class="form-check-label" for="rgb">
                                RGB világítás
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="bluetooth" name="bluetooth" value="true"
                                <?php echo (isset($_GET["bluetooth"]) && $_GET["bluetooth"]==true ? "checked" : "")?>>
                            <label class="form-check-label" for="bluetooth">
                                Bluetooth
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="wireless" name="wireless" value="true"
                                <?php echo (isset($_GET["wireless"]) && $_GET["wireless"]==true ? "checked" : "")?>>
                            <label class="form-check-label" for="wireless">
                                Vezeték nélküli
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="function">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#colors"
                        aria-expanded="true" aria-controls="colors">
                        Színek
                    </button>
                </h2>
                <div id="colors" class="accordion-collapse collapse show" aria-labelledby="colors">
                    <div class="accordion-body">
                        <input type="hidden" name="colors" id="colorField">
                        <div class="row colorField">
                            <?php
                                $colors = $conn->query("SELECT color FROM items GROUP BY color");
                                while($color = $colors->fetch_assoc()){
                                    $c=$color["color"];
                                    if(strpos($c, "-") == false)
                                    {
                                        echo '<div class="col-1 m-1">
                                            <input type="button" value="✓" id="'.$c.'" class="colorButton" style="background-color: '.$c.'; color: ';
                                            if(isset($_GET["colors"]) && is_numeric(strpos($_GET["colors"], $c)) == true){
                                                if($c != "White"){ echo "White"; }
                                                else{ echo "Black"; }
                                            }
                                            else{
                                                echo $c;
                                            }
                                        echo '" onClick="change(\''.$c.'\')"/>
                                        </div>';
                                    }
                                }
                            ?>
                        </div>
                        </input>
                    </div>
                </div>
            </div>
        </div>

        <div class="row p-3">
            <button class="btn btn-outline-primary" type="submit">Keresés</button>
        </div>
    </div>

    <div class="mt-4">
        <div class="btn-group">
            <?php 
                for ($i=0; $i < 4; $i++) { 
                    if($i < 2){ $text="Név"; }
                    else {$text = "Ár";}
                    if($i % 2 == 1){$type="desc";}
                    else{$type="asc";}

                    echo '<button type="submit" name="order" value="'.$i.'" class="btn btn-primary';
                    if(isset($_GET["order"]) && $_GET["order"]==$i){ echo " active";}
                    echo '">'.$text.' <img src="images/components/'.$type.'.svg"></button>';
                }
            ?>
        </div>
    </div>
</form>
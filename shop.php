<!DOCTYPE html>
<html lang="hu">
<?php 
    include_once("components/header.php");
    SetHeader("Shop", array("navbar.css", "style.css", "shop.css"));
?>

<body>
    
    <script>
        let color=[];
        function change(col){
            var btn=document.getElementById(col);
            if(color.includes(col)){
                var index = color.indexOf(col);
                color.splice(index, 1);
                var bg=btn.style.backgroundColor;
                btn.style.color=bg;
            }
            else{
                color.push(col);
                if(col != "White"){btn.style.color="white";}
                else{btn.style.color="black";}
            }
            var field =document.getElementById("colorField");
            result= ""+color;
            if(color != []){
                field.value= result.replaceAll(",",".");
            }
        }
    </script>

    <div class="content">
        <?php 
            include_once("components/menu.php"); 
            include_once("components/sql/search.php");
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-3 itemrow d-flex justify-content-center">
                    <div class="p-2 settings">
                        <div class="card card-body settings">
                            <form action="" method="get">
                                <select class="form-select" aria-label="Default select" style="margin-bottom: 15px" name="brand">
                                    <option selected="" value="false">Gyártó</option>
                                    <?php 
                                        $brands = $conn->query("SELECT brand FROM items GROUP BY brand");
                                        while($brand = $brands->fetch_assoc()){
                                            echo '<option value="'.$brand["brand"].'">'.$brand["brand"].'</option>';
                                        }
                                    ?>    
                                </select>
                                
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rgb" name="rgb" value="true">
                                    <label class="form-check-label" for="rgb">
                                        RGB világítás
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="bluetooth" name="bluetooth" value="true">
                                    <label class="form-check-label" for="bluetooth">
                                        Bluetooth
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="wireless" name="wireless" value="true">
                                    <label class="form-check-label" for="wireless">
                                        Vezeték nélküli
                                    </label>
                                </div>
                                <hr>
                                    <input type="hidden" name="colors" value="" id="colorField">
                                        Színek:
                                        <div class="row colorField">
                                        <?php
                                            $colors = $conn->query("SELECT color FROM items GROUP BY color");
                                            while($color = $colors->fetch_assoc()){
                                                $c=$color["color"];
                                                if(strpos($c, "-") == false)
                                                {
                                                    echo '<div class="col-1 m-1"> 
                                                        <input type="button" value="✓" id="'.$c.'" class="colorButton" style="background-color: '.$c.'; color:'.$c.'" onClick="change(\''.$c.'\')"/>
                                                    </div>';
                                                }
                                            }
                                        ?>
                                        </div>
                                    </input> 
                                <div class="row p-3">   
                                <button class="btn btn-outline-primary" type="submit">Keresés</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-8">
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
                                                        <a href=item.php/?id='.$row["id"].' class="btn btn-primary">Részletek</a>
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
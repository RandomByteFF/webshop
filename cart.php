<!DOCTYPE html>
<html lang="hu">
<?php 
    include_once("components/header.php");
    SetHeader("", array("navbar.css", "style.css"));

    if(isset($_POST["type"])){
        if($_POST["type"]=="set"){
            $item=$_POST["item"];
            $id=$_POST["id"];
            setcookie("cart[".$id."]", $item, time() + (86400 * 30), "/");

        }
    }
?>

<body>
    <div class="content">
        <?php include_once("components/menu.php"); ?>
        <!--p class="">
        <form action="<?php //echo $_SERVER['PHP_SELF'];?>" method="post">
            <input type="number" name="id"/><input type="text" name="item"/>
            <input type="submit" name="type" value="set"/>
        </form>
        </p-->
        <div class="container-fluid p-2">
            <table class="table table-hover table-bordered bg-white">
                <thead>
                    <tr>
                        <th scope="col">Termék</th>
                        <th scope="col">Mennyiség</th>
                        <th scope="col">Ár</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $priceSum=0;
                        $productSum=0;
                        if(isset($_COOKIE["cart"])){
                            include_once("components/sql/sql.php");
                            $query="SELECT name, price FROM items";
                            $result = $conn->query($query);
                            $data = array();
                            $conn->close();
                            while($row = $result->fetch_assoc()){
                                array_push($data, array($row["name"], $row["price"]));
                            }
                            foreach ($_COOKIE["cart"] as $id => $amount) {
                                $productSum += $amount;
                                $priceSum +=$data[$id][1]*$amount;
                                echo "<tr>
                                    <td>".$data[$id][0]."</td>
                                    <td>".$amount."</td>
                                    <td>".number_format(($data[$id][1]*$amount), 0, ".", " ")." FT</td>
                                </tr>";
                            }
                            
                        }
                        echo "<tr style='font-weight: bold'>
                                <td>Összesen:</td><td>".$productSum."</td><td>".number_format($priceSum, 0, ".", " ")." FT</td>
                            </tr>";
                    ?>
                </tbody>
            </table>
            <div class="m-2">
                <form action="/components/cookies/deleteAll.php" method="post">
                    <input class="btn btn-danger" type="submit" value="Kosár kiürítése">
                </form>
                <!--form action="" method="post">
                    <input class="btn btn-success" type="submit" value="Tovább a számlához">
                </form-->
                    </div>
        </div>
    </div>
    <?php include_once("components/footer.php"); ?>
</body>
</html>
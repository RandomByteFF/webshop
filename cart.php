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
        <div class="container-fluid p-2">
            <table class="table table-hover table-bordered bg-white">
                <thead>
                    <tr>
                        <th scope="col">Termék</th>
                        <th scope="col">DB</th>
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
                <form class="row" action="/components/cookies/deleteAll.php" method="post">
                    <div class="col-12">
                        <button class="btn btn-danger" style="float: right" type="submit"><img src="images/components/delete.svg"></button>
                    </div>
                </form>
                <form class="row mt-2" action="/components/receipt.php" method="post">
                    <div class="col-10">
                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" name="paymentMethod" aria-label="Floating label select example" required>
                                <option value="1">Utalással</option>
                                <option value="2">Átvevőponton</option>
                                <option value="3">Postai utánvétel</option>
                            </select>
                            <label for="floatingSelect">Fizetés módja</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-success" type="submit" style="float: right; height: 100%">
                            <img src="images/components/receipt.svg">
                            <span class="d-none d-md-block">rendelés lezárása</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include_once("components/footer.php"); ?>
</body>

</html>
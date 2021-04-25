<script>
    function CloseToast(){
        window.toast=document.getElementById("toast").style.display="none";
        console.log("got it");
    }
</script>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/shop">Shop</a></li>
        <?php echo '<li class="breadcrumb-item"><a href="/shop?brand='.$info["brand"].'">'.$info["brand"].'</a></li>'; ?>
        <?php echo '<li class="breadcrumb-item active">'.$info["name"].'</li>'; ?>
    </ol>
</nav>
<div class="card">
    <div class="card-body">
        <div class="row row-12">
            <div class="col-md-4 col-12">
                <?php echo '<img src="/images/items/'.$id.'.jpg" class="productImage p-2">'; ?>
            </div>
            <div class="col-md-8 p-2">
                <p class="h2 m-2"><?php echo $info["name"]; ?></p>
                <p class="m-2"><span class="badge bg-dark">Raktáron</span></p>
                <hr>
                <div class="p-3">
                    <table class="table table-sm table-secondary table-striped caption-top">
                        <caption>Technikai adatok:</caption>
                        <tr>
                            <th scope="row">Szenzor típusa</th>
                            <td><?php echo $info["sensor"]; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Gombok száma</th>
                            <td><?php echo $info["buttons"]; ?></td>
                        </tr>
                        <?php
                            $detailName= array(
                                array("rgb", "RGB világítás"),
                                array("bluetooth", "Bluetooth"),
                                array("wireless", "Vezeték nélküli"),
                                array("usb", "USB csatlakozó"),
                                array("ps2","PS2 csatlakozó")
                            );
                            foreach ($detailName as &$detail) {
                                echo '<tr>
                                        <th scope="row">'.$detail[1]."</th>
                                        <td>".($info[$detail[0]] == 1 ? "Van" : "Nincs").'</td>
                                    </tr>';
                            }
                        ?>
                    </table>
                </div>
                <hr>
                <p class="h3 m-2">ÁR: <?php echo number_format($info["price"], 0, ".", " "); ?> FT</p>
                <p class="h5 font-weight-bold m-2">Garancia: 1 év garancia</p>
                <form action="/components/cookies/add.php" method="post">
                    <div class="input-group m-2 amount">
                        <input type="number" name="amount" class="form-control" aria-label="amount" min="1" value="1" aria-describedby="input-group-button-right"/>
                        <input type="hidden" name="id" <?php echo 'value="'.$info["id"].'"'?> />
                        <button type="submit" class="btn btn-primary" id="input-group-button-right">Kosárba</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <p>
        <?php echo $info["description"]; ?>
    </p>
</div>

<?php
        if(isset($_SESSION["added"]) && $_SESSION["added"]==true){
            echo '<div class="toast align-items-center text-white bg-success fade show" role="alert" id="toast">
            <div class="toast-body">
              Kosárhoz adva!
            </div>
            <button type="button" class="btn-close btn-close-white ms-auto m-3" aria-label="Close" onclick="CloseToast()"></button>
          </div>';
          $_SESSION["added"]=false;
        }
?>

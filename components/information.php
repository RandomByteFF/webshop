<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/shop">Shop</a></li>
        <?php echo '<li class="breadcrumb-item"><a href="/shop?brand='.$info["brand"].'">'.$info["brand"].'</a></li>'; ?>
        <?php echo '<li class="breadcrumb-item active">'.$info["name"].'</li>'; ?>
    </ol>
</nav>
<div class="card p-1">
    <div class="row">
        <div class="col-md-4 p-2">
            <?php echo '<img src="/images/items/'.$id.'.jpg" class="productImage m-2">'; ?>
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
            <form>
                <div class="input-group m-2 amount">
                    <input type="number" class="form-control" aria-label="amount" value="1" aria-describedby="input-group-button-right">
                    <button type="button" class="btn btn-primary" id="input-group-button-right">Kosárba</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row m-3 col-12">
    <p>
        <?php echo $info["description"]; ?>
    </p>
</div>
<hr>

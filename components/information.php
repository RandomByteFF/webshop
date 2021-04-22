<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/shop">Shop</a></li>
        <?php echo '<li class="breadcrumb-item"><a href="/shop?s='.true.'&brand='.$info["brand"].'">'.$info["brand"].'</a></li>'; ?>
        <li class="breadcrumb-item active" aria-current="page"></li>
    </ol>
</nav>
<div class="row">
    <p class="h2"><?php echo $info["name"]; ?></p>
    <div class="col-md-4 p-2">
        <?php echo '<img src="/images/items/'.$id.'.jpg" style="width: 100%; border: 1px solid black">'; ?>
    </div>
    <div class="col-md-8">
        <?php echo $info["description"]; ?>
    </div>
</div>
<hr>
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
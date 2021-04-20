<!DOCTYPE html>
<html lang="hu">
<?php 
    //if(!isset($_GET["item_id"])){} ez még később hasznos lesz
    include_once("components/header.php");
    SetHeader("Item", array("navbar.css", "style.css"));
?>

<body>
    <div class="content">
        <?php include_once("components/menu.php"); ?>
        <div class="bg-white p-3">
            <div class="row" style="border-bottom: 1px solid black">
                <p class="h2">Item name</p>
                <div class="col-md-4">
                    <img src="images/items/mouse1.jpg">
                </div>
                <div class="col-md-8">
                    aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa NO
                </div>
            </div>
            
            <table class="table table-primary table-sm caption-top">
                <caption>specs</caption>
                <tr>
                    <th scope="row">Speed</th>
                    <td>Fast</td>
                </tr>
                <tr>
                    <th scope="row">Wireless</th>
                    <td>Perhaps</td>
                </tr>
            </table>
        </div>
    </div>
    <?php include_once("components/footer.php"); ?>
</body>
</html>
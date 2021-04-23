<!DOCTYPE html>
<html lang="hu">
<?php 
    if(!isset($_GET["id"])){
        header("location: /");
        exit;
    } 
    $id=$_GET["id"];
    include_once("components/header.php");
    SetHeader("Item", array("navbar.css", "style.css"));
?>

<body>
    <div class="content bg-white">
        <?php include_once("components/menu.php"); ?>
        <div class="d m-1 p-4">
            <?php 
            include_once("components/sql/sql.php");
            $query="SELECT * FROM items WHERE id =".$id;
            $result = $conn->query($query);
            $conn->close();
            if ($result){
                $info = $result->fetch_assoc();
                include_once("components/information.php");   
            }
            else{
                echo '<p class="h1">Adatbázis hiba</p>';
            }
            ?>

        </div>
    </div>
    <?php include_once("components/footer.php"); ?>
</body>
</html>
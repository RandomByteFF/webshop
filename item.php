<!DOCTYPE html>
<html lang="hu">
<?php 

    //GETTING THE ITEM
    if(!isset($_GET["id"])){
        header("location: /");
        exit;
    } 
    
    $id=$_GET["id"];
    include_once("components/sql/sql.php");
    $query="SELECT * FROM items WHERE id =".$id;
    $result = $conn->query($query);
    $conn->close();

    if ($result){
        $info = $result->fetch_assoc();
        if($info != ""){
            include_once("components/header.php");
            SetHeader($info["name"], array("navbar.css", "style.css", "item.css"));
        }
        else{
            header("location: /");
            exit;    
        }
    }
?>

<body>
    <div class="content bg-white">
        <?php include_once("components/menu.php"); ?>
        <div class="d m-1">
            <?php include_once("components/information.php");?>
        </div>
    </div>
    <?php include_once("components/footer.php"); ?>
</body>
</html>
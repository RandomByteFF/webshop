<!DOCTYPE html>
<html lang="hu">
<?php 
    include_once("components/header.php");
    SetHeader("Home", array("navbar.css", "style.css"));
?>

<body>
    <div class="content">
        <?php include_once("components/menu.php"); ?>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/images/components/mouse1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/images/components/mouse2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/images/components/mouse3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <hr/>
            <div class="wide-image">
                <img class="wide-image" src="/images/components/mouse4.jpg" alt="...">
            </div>
        <hr/>
        <div class="wide-image">
            <img class="wide-image" src="/images/components/mouse5.jpg" alt="...">
        </div>
    </div>
    <?php include_once("components/footer.php"); ?>
</body>
</html>
<?php 
    include_once("components/user/checkLogin.php");
    $page=$_SERVER["REQUEST_URI"];

    if (isset($_GET['search']) && $page != "/shop?" . $_SERVER['QUERY_STRING']) {
        header("location: /shop?" . $_SERVER['QUERY_STRING']);
        exit;
        //echo '<script>console.log("'.$_GET['search'].'")</script>';
    }
?>

<nav class="navbar navbar-dark navbar-expand-xl" id="navigation">
    <div class="container-fluid">
        <!--BRAND NAME-->
        <a class="navbar-brand brandtext" href="/">Brand name<br><div class=underheader>Egy ütős szinoníma</div></a>
        <!--NAVBAR TOGGLER-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--MENU POINTS-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!--MAIN-->
                <li class="nav-item navtext">
                    <a class="nav-link navtext <?php echo ($page == "/" ? "active":"")?>" aria-current="page" href="..">Főoldal</a>
                </li>
                <li class="nav-item navtext">
                    <a class="nav-link navtext <?php echo ($page == "/shop" ? "active":"")?>" href="/shop">Bolt</a>
                </li>
                <!--ICON TO TEXT-->
                <div class="d-block d-xl-none">
                    <li class="nav-item navtext">
                        <a class="nav-link navtext <?php echo ($page == "/profile" ? "active":"")?>" href="/profile">Profil</a>
                    </li>
                    <li class="nav-item navtext">
                        <a class="nav-link navtext <?php echo ($page == "/cart" ? "active":"")?>" href="/cart">Kosár</a>
                    </li>
                </div>
                <!--LOG OUT>
                <li class="nav-item navtext">
                    <a class="nav-link navtext" href="/components/logout.php">Kijelentkezés</a>
                </li-->
            </ul>
            <!--SEARCH BAR-->
            <form class="d-flex search" method="GET">
                <div class="form-floating">
                    <input type="text" class="form-control search-left" placeholder="Keresés..." aria-label="Keresés..." aria-describedby="button-addon2" id="search" name="search">
                    <label for="search">Keresés...</label>
                </div>
                    <button class="btn btn-outline-secondary search-right" type="submit" id="button-addon2"><span class="material-icons-outlined">search</span></button>
            </form>
            <!--ICONS-->
            <div class="d-none d-xl-block">
                <div class="row m-3 icon-box">
                    <a class="col m-2 p-0" href="/profile">
                        <img class="icon" src="/images/components/profile-user.svg" />
                    </a>    
                    <a class="col m-2 p-0" href="/cart">
                        <img class="icon" src="/images/components/shopping-cart.svg" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
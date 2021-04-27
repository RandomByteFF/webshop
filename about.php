<!DOCTYPE html>
<html lang="hu">
<?php 
    include_once("components/header.php");
    SetHeader("About", array("navbar.css", "style.css"));
?>

<body>
    <div class="content">
        <?php include_once("components/menu.php") ?>
        <div class="row text-center p-1 light-text" style="width: 100%">
            <?php
                $us =array(
                    array("profile2.png", "Designer", "Horváth Kristóf"),
                    array("profile1.png", "Fejlesztés vezető", "Bánáti Benedek"),
                    array("profile3.jpg", "Marketing", "Boglári Gergely")
                );
                foreach($us as &$u){
                    echo '<div class="col col-md-4 col-sm-12 col-12">
                        <div class="row justify-content-center">
                                <div class="col col-md-12">
                                    <img class="col col-xl-9 col-md-12 rounded-circle p-4 wide-image" src="/images/components/'.$u[0].'" alt="profile">
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 h5 font-weight-lighter">
                                <i>'.$u[1].'</i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 h3 font-weight-bold">
                                '.$u[2].'
                            </div>
                        </div>
                    </div>';
                }
            ?>
        </div>
        <div class="row text-center p-4 m-2">
            <div class="col-sm-12 shadow-lg p-3 mb-5 border border-primary border-2 light-text">
                <h1><u>Rólunk</u></h1>
                <figure>
                    <blockquote class="blockquote ">
                        <h3>Egeret mindenkinek!</h3>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                        <cite title="Source Title">Boglári Gergely László</cite>
                    </figcaption>
                </figure>
                <div class="p-3">
                    Magyar cégünk egerek forgalmazására és értékesítésére specializálódott. Adunk a minőségre és
                    vásárlóink elégedettségére. Célunk, hogy mindenkinek az otthonában olyan eszköz legyen, ami hosszú
                    távon kielégíti az igényeit
                </div>
            </div>
        </div>
    </div>
    <?php include_once("components/footer.php") ?>
</body>

</html>
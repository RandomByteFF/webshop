<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../stylesheets/style.css">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Brand name</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Shop</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="options">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="option1" id="option1" name="option1">
                    <label class="form-check-label" for="option1">
                    Option 1
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="option2" id="option2" name="option2">
                    <label class="form-check-label" for="option2">
                    Option 2
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row row-cols-3">
            <?php
                $dir = "../images";
                $scan = scandir($dir);
                $imagesCount = count($scan) - 2;
                for ($i=0; $i < count($scan); $i++) { 
                    if ($scan[$i] !== "." && $scan[$i] !== ".."){
                        echo "<div class=\"col itemrow\">";
                        echo "<div class=\"card item\" style=\"width: 18rem;\">";
                        echo "<img src=\"../images/$scan[$i]\" class=\"card-img-top\" height=\"300px\" width=\"300px\">";
                        echo "<div class=\"card-body\">";
                        echo "<h5 class=\"card-title\">Fat fuck</h5>";
                        echo "<p class=\"card-text\">$scan[$i]</p>";
                        echo "<a href=\"#\" class=\"btn btn-primary\">Chonk</a>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
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
        </div>
    </nav>


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
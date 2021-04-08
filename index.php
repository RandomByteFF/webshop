<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../stylesheets/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php include_once("components/menu.php") ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 itemrow d-flex justify-content-center">
                <div class="p-2" style="width: 300px;">
                    <div class="card card-body">
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
            <div class="col col-lg-8">
                <div class="card-group">
                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $conn = new mysqli($servername, $username, $password);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM items";
                        $result = $conn->query($sql);

                        if ($result !== false && $result->num_rows > 0) {
                            while($row = $result->fetch_assoc()){
                                echo $row["joe"];
                            }
                        }

                        $conn->close();

                        $dir = "images/items/";
                        $scan = scandir($dir);
                        $imagesCount = count($scan) - 2;
                        for ($i=0; $i < count($scan); $i++) { 
                            if ($scan[$i] !== "." && $scan[$i] !== ".."){
                                echo "<div class=\"col itemrow\">
                                    <div class=\"card item shadow-sm\" style=\"width: 18rem;\">
                                        <img src=\"$dir"."$scan[$i]\" class=\"card-img-top\" height=\"300px\" width=\"300px\">
                                        <div class=\"card-body\">
                                            <h5 class=\"card-title\">Fat fuck</h5>
                                            <p class=\"card-text\">$scan[$i]</p>
                                            <a href=\"#\" class=\"btn btn-primary\">Chonk</a>
                                        </div>
                                    </div>
                                </div>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php 
    session_start();
    $allInformation=array("email", "name", "postal_code", "town", "address", "phone");
    foreach ($allInformation as &$info) {
        if(!isset($_SESSION[$info])){
            header("location: /shop");
            exit();
        }
    }
    if(!isset($_POST["paymentMethod"])){ 
        header("location: /shop");
        exit();
    }
    if(!isset($_COOKIE["cart"])){ 
        header("location: /shop");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <title>Számla</title>
    <script>
        window.addEventListener("load", start, false);
        var canvas;
        var ctx;
        var tempImg;

        async function start() {
            const body = document.getElementsByTagName('body')[0];
            let source = `<div xmlns="http://www.w3.org/1999/xhtml" style="padding:20px;background-color:white;">
                    <style>
                        .logo{
                            width: 350px;
                            background-color: #0B132B;
                            text-align: center;
                            color:#6FFFE9;
                            padding: 1;
                            font-size: 2em;
                            font-weight: bold;
                            float: left;
                        }
                        .title{
                            font-size: 2.5em;
                            position: fixed;
                            width: 100%;
                            text-align: center;
                            transform: translateX(-350px);
                        }
                        .h{
                            display: inline-block;
                            margin-bottom: 10px;
                        }
                        table{
                            width: 100%;
                            margin: auto;
                            border: 0px;
                            border-collapse: collapse;
                            margin-bottom: 10px;
                        }
                        th{
                            background-color: #a1ffff;
                            padding: 8px;
                            
                        }
                        .center td{
                            padding-top: 10px;
                            text-align: center;
                        }
                        .italic th{
                            text-align: left;
                            font-style: italic;
                        }
                        .data td{
                            padding-left: 10px;
                        }
                    </style>

                    <div class="h">
                        <div class="logo">
                            Gamer Tribute
                        </div>
                        <span class="title">Számla</span>
                    </div>

                    <div>
                        <table>
                            <tr class="italic">
                                <th>Számla kiállító adatai: </th>
                                <th>Vevő adatai: </th>
                            </tr>
                            <?php
                                $partners=array(
                                    array("Név: ", "Gamer Tribute Bt.", "name"),
                                    array("Email: ", "Gamer.Tribute@proba.com", "email"),
                                    array("Tel: ", "+3600000000", "phone"),
                                    array("", "2600", "postal_code"),
                                    array("", "Vác", "town"),
                                    array("", "Németh László út 4-6", "address")
                                );
                                foreach ($partners as &$e) {
                                    echo "<tr class='data'>
                                        <td>".$e[0].$e[1]."</td>
                                        <td>".$e[0].$_SESSION[$e[2]]."</td>
                                    </tr>";    
                                }
                                
                            ?>
                        </table>
                        <table>
                                <tr>
                                    <th>Fizetési mód</th>
                                    <th>Számla kelte</th>
                                    <th>Teljesítés időpontja</th>
                                    <th>Fizetési határidő</th>
                                </tr>
                                <tr class="center">
                                    <td>
                                        <?php
                                            switch ($_POST["paymentMethod"]) {
                                                case 1:
                                                    echo "átutalás";
                                                    break;
                                                case 2:
                                                    echo "átvételkor";
                                                    break;
                                                case 3:
                                                    echo "utánvét";
                                                    break;
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo date("Y.m.d");?></td>
                                    <td><?php echo date("Y.m.d");?></td>
                                    <td>
                                        <?php 
                                            $today=strtotime("Today");
                                            $lastday=strtotime("+1 week", $today);
                                            echo date("Y.m.d", $lastday);
                                        ?>
                                    </td>
                                </tr>
                            </table>

                            <table>
                                <tr>
                                    <th>#</th>
                                    <th>Megnevezés</th>
                                    <th>Menny.</th>
                                    <th>Nettó egységár</th>
                                    <th>ÁFA</th>
                                    <th>Nettó</th>
                                    <th>ÁFA érték</th>
                                    <th>Bruttó</th>
                                </tr>
                                <?php
                                    include_once("sql/sql.php");
                                    $query="SELECT name, price FROM items";
                                    $result = $conn->query($query);
                                    $data = array();
                                
                                    while($row = $result->fetch_assoc()){
                                        array_push($data, array($row["name"], $row["price"]));
                                    }
                                    $i=1;
                                    $priceSum =0;
                                    $l= count($data);
                                    foreach ($_COOKIE["cart"] as $id => $amount) {
                                        if($id < $l)
                                        {
                                            $priceSum +=$data[$id][1]*$amount;
                                            echo "<tr class='center'>
                                                <td>".$i."</td>
                                                <td>".$data[$id][0]."</td>
                                                <td>".$amount." db </td>
                                                <td>".round($data[$id][1]*0.73)." FT</td>
                                                <td> 27% </td>
                                                <td>".round($data[$id][1]*0.73)*$amount." FT</td>
                                                <td>".round($data[$id][1]*0.27)*$amount." FT</td>
                                                <td>".number_format(($data[$id][1]*$amount), 0, ".", " ")." FT</td>
                                            </tr>";
                                            $i++;
                                        }
                                    }
                                    echo "</table><h3>Fizetendő végösszeg: ".number_format($priceSum,0,"."," ")." FT</h3>";
                                    ?>
                    </div>
                </div>`
            document.getElementById('source').innerHTML = source;
            canvas = document.createElement('canvas');
            var h=document.getElementById("source").offsetHeight;
            var w=document.getElementById("source").offsetWidth;
            ctx = canvas.getContext('2d');
            canvas.width = w;
            if(w<500){w=700;}
            canvas.height = h;
            tempImg = document.createElement('img');
            
            tempImg.src = 'data:image/svg+xml,' + encodeURIComponent(`
                <svg xmlns="http://www.w3.org/2000/svg" width="`+w+`px" height="`+h+`px">
                    <foreignObject 
                        style="
                            width:`+w+`px;
                            height:`+h+`px;
                            transform:scale(1);
                        "
                    >` + source + `
                    </foreignObject>
                </svg>
            `);
        }
        function toPng(){
            ctx.drawImage(tempImg, 0, 0);
            var p  = document.createElement('a');
            p.href = canvas.toDataURL('image/png');
            p.download = 'szamla.png';
            p.click();
        }
    </script>
</head>
<body>
    <style>
        button{
            background-color: #0B132B;
            border: 0px;
            padding: 8px;
            font-size: 1rem;
            font-weight: 800;
            color: rgb(255, 255, 255);
            box-shadow: 3px 3px rgba(143, 143, 143, 0.6);
            transition: 0.5s;
        }
        button:hover{
            background-color: #26408f;
        }
        button:active {
            box-shadow: 0 3px #cccc;
            transform: translateY(4px);
        }
        form{
            padding-top: 10px;
        }
    </style>
    <div id="source">
        
    </div>
    <button onclick="toPng()">Számla mentése</button>
    <form action="/logout">
        <button type="submit">Kilépés</button>
    </form>
</body>
<?php 
    $query = "INSERT INTO receipts VALUES ('', ";
    $allInformation=array("name", "postal_code", "town", "address", "phone", "email");
    foreach ($allInformation as &$info) {
        $query = $query."\"".$_SESSION[$info]."\",";
    }
    $cart="";
    foreach ($_COOKIE["cart"] as $id => $amount) {
        $cart= $cart.$id."\t-\t".$amount."\n";
    }
    $query= $query."\"".$_POST["paymentMethod"]."\",\"".$cart."\");";
    $result = $conn->query($query);
    if ( $result === TRUE) {
        echo "<script>console.log('added')</script>";
    } else {
        echo "<script>console.log('error')</script>";
    }
    $conn->close();
?>
</html>

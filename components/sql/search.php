<?php 
    include_once("sql.php");
    $query = "SELECT * FROM items";
    if(isset($_GET) && count($_GET)>0)
    {
        $filters="";
        $previous=false;
        //CHECKING BRAND NAME
        if(isset($_GET["brand"]) && $_GET["brand"] !== "false"){
            $previous=true;
            $filters= '(brand = "'.$_GET["brand"].'")';
        }
        //CHECKING OTHER OPTIONS
        $options= array("bluetooth","rgb","wireless");
        foreach ($options as &$option) {
            if(isset($_GET[$option])){
                if($_GET[$option] == true || $_GET[$option]==false)
                {
                    $filters= $filters.($previous== true ? " AND " : "")."(".$option.' = '.$_GET[$option].')';
                    $previous=true;
                }
            }
        }
        //CHECKING COLORS
        if(isset($_GET["colors"]) && $_GET["colors"]!=""){
            $colorList=explode(".", $_GET["colors"]);
            $cf="";
            $prev=false;
            foreach ($colorList as &$color) {
                $cf= $cf.($prev ? " OR " : "")."( color LIKE"."\"%".$color."%\")";
                $prev=true;
            }
            $filters=$filters.($previous ? " AND " : "")." (".$cf.") GROUP BY id";
        }
        //CHECKING SEARCH
        if(isset($_GET["search"])){
            $filters=$filters.($previous ? " AND " : "")."name LIKE '%".$_GET["search"]."%'";
        }
        //APPLYING FILTER
        if($filters!=""){
            $query= $query." WHERE ".$filters;
        }
        echo '<script>console.log("'.$query.'")</script>';
    }
?>
<?php
session_start();
include_once("./function/initdb.php");
include_once("./header.php");
include_once("./nav.php");
include_once("./fun1.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./stilovi/styleheader_nav.css"/>
</head>
<body>
    <div class="cart_cart">
        <div class="cart1">
            <div class="item_cart">
                <h6>Moja korpa</h6>
                <div>
                    <?php
                    $product_id=array_column($_SESSION['cart'],'product_id');
                    $result=$conn->nizKnjiga();
                    foreach($result as $row){
                       if(in_array($row[0],$product_id)){
                          showcart($row[6],$row[1],$row[2],$row[5]);
                       }
                    }

                    
                    ?>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
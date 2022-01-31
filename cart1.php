<?php
session_start();
include_once("./function/initdb.php");
include_once("./header.php");
include_once("./nav.php");
include_once("./fun1.php");
include_once("./cart1.php");
if(isset($_POST['isprazni'])){
    
    $_SESSION['cart']=[];
        
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./stilovi/styleheader_nav.css"/>
    <link rel="stylesheet" href="./stilovi/edition.css" />
    <link rel="stylesheet" href="./stilovi/stylecart.css" />
</head>
<body>
    <div class="cart_cart">
        <div class="cart1">
            <div class="item_cart">
                <h2>Moja korpa</h2>
                <div class="img">
                    <?php
                    $total=0;
                    if(isset($_SESSION['cart'])){
                    $product_id=array_column($_SESSION['cart'],'product_id');
                    $result=$conn->nizKnjiga();
                    foreach($result as $row){
                       if(in_array($row[0],$product_id)){
                          showcart($row[6],$row[1],$row[2],$row[5],$row[0]);
                          $total=$total +(int)($row[5]-$row[5]*20/100);
                       }
                    }
                    }
                    else{
                        echo "Korpa je prazna !";
                    }
                    

                    
                    ?>
                </div>
               <div class="total">
                   <h5>Ukupno:</h5>

                   <?php
                   if(isset($_SESSION['cart'])){
                       $count= count($_SESSION['cart']);
                       echo "U korpi imate $count proizvoda:";
                   }
                   else{
                       echo "Cena je 0";
                   }
                   ?>
                   <h5>Ukupno za placanje:</h5>
                   <?php echo "$total dinara"; ?>
               </div> 
            </div>

        </div>
    </div>
</body>
</html>
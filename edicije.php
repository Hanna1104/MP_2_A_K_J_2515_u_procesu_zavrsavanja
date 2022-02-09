<?php
include_once("./initdb.php");
include_once("./function/function.php");
session_start();
if(!isset($_SESSION['user'])){
    echo "<script> alert('Prijavite se na svoj nalog')</script>";}
else{
if(isset($_POST['add'])){
    if(isset($_SESSION['cart'])){
        $item_array_id=array_column($_SESSION['cart'],'product_id');
        ///print_r($item_array_id);
        if(in_array($_POST['product_id'],$item_array_id)){
            echo "<script> alert('Product is on the cart')</script>";
            echo "<script> window.location='./index.php'</script>";
        }
        else{

           $count= count($_SESSION['cart']);
           $item_array=array(
            'product_id'=>$_POST['product_id']);
            $_SESSION['cart'][$count]=$item_array;
           
        }

    }
    else{
        $item_array=array(
            'product_id'=>$_POST['product_id']);
        //create session variable cart
        $_SESSION['cart'][0]=$item_array;
        //print_r($_SESSION['cart']);
    }
    
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./stilovi/styleheader_nav.css" />
    <link rel="stylesheet" href="./stilovi/styleedition.css" />
    <link rel="stylesheet" href="./stilovi/stylefooter.css" />
    
</head>
<body>
<div class="hednav">
    <div class="header">
    <?php
    include_once("./header.php")
    ?>
    </div>
    <div class="navigation">
    <?php
    include_once("./nav.php")
    ?>

    <?php
    include_once("./bodyedition.php")
    ?>

    <?php 
    include_once ("./footer.php")
    ?>

    </div>
    
 </div>
</body>
</html>
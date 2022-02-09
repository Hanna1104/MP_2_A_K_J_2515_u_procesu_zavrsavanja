<?php include_once("./initdb.php");
      include_once("./function/function.php");
 ?>
 <?php
 session_start();

if(isset($_POST['add'])){
    //print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){
        //print_r($_SESSION['cart']);
        $item_array_id = array_column($_SESSION['cart'],'product_id');
       
    if(in_array($_POST['product_id'],$item_array_id)){
        echo"<script>alert('Product is already added in the cart')</script>";
        echo "<script>window.location='edicije.php'</script>";
    }else{
        $count=count($_SESSION['cart']);
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
    <link rel="stylesheet" href="./stilovi/stylestore.css"/>
    <link rel="stylesheet" href="./stilovi/stylefooter.css"/>
</head>
<body>
    <?php
    include_once("./header.php")
    ?>

    <?php
    include_once("./nav.php")
    ?>
    <?php 
    include_once("./body.php")
    ?>

    <?php
    include_once("./footer.php")
    ?>
    
    
</body>
</html>
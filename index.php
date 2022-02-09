<?php
 
include("./initdb.php");
include_once("./function/function.php");

session_start();

if(isset($_POST['add'])){
    if(isset($_SESSION['cart'])){
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
        //print_r($_SESSION['cart']);
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./stilovi/styleheader_nav1.css" />
    <link rel="stylesheet" href="./stilovi/style.css"/>
    <link rel="stylesheet" href="./stilovi/stylefooter.css"/>
    
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
    </div>
 </div>
    <div class="main-part">
        <div class="inside-part">
           <h2>Zimska akcija</h2>
           <h1>Veliki praznični popusti!</h1>
           <hr class="hline">
           <h2>Cene niže od 30% do 60%!</h2>
        </div>
    </div>

    <div class="naslovi">
        <h1>Naslovi</h1>
        <hr>       

        <?php 
        $niz_knjiga = $conn->nizKnjiga();
        $i=0;
        foreach ($niz_knjiga as $knjiga){
           if($i<5){
        echo knjiga($knjiga[6],$knjiga[1],$knjiga[2]);
           }
           $i++;
        }
        ?>        

    </div>

<div class="footer">

    <?php include_once("./footer.php") ?>

</div>   

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
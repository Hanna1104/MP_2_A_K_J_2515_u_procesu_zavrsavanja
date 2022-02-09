<?php
include_once("./initdb.php");
include_once("./function/function.php");

session_start();
if(isset($_SESSION['user'])){

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
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./stilovi/styleheader_nav1.css" />
    <link rel="stylesheet" href="./stilovi/stylelog.css" />
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
    </div>
</div>

<div class="body">
<div class="page-title">
    <h2>Moj nalog</h2>
</div>
</div>

<div class="middle">
    <div class="edition">
        <h2>Top lista</h2>
        <hr>
            
           <div class="img"> 
               <?php 
               $niz_knjiga = $conn->nizKnjiga();
               $i=0;
               foreach ($niz_knjiga as $knjiga){
               if($i<3){
               echo top_lista1($knjiga[6],$knjiga[1],$knjiga[2],$knjiga[5]);
               }
               $i++;
               }
               ?>
            </div>
            
    </div>

    <div class="nalog">
        <h1>Moj nalog</h1>
        <div class="login"> 
        
            
            <form method="post" action="login.php">
                <fieldset>
                    <legend> <h3> Prijavite se </h3> </legend>
         <div>  <label for="user"> Unesite e-mail adresu: </label>
                <input type="email" name="user" id="user" placeholder="E-mail" required />
                <label for="pass"> Unesite lozinku: </label>
                <input type="password" name="pass" id="pass" placeholder="Unesite lozinku" minlength=8 required />
                <input type="checkbox" name="keep" id="keep" />
                <label for="keep"> Zapamti me </label>
         </div>
               <div> <input type="submit" value="Prijavite se" /> </div>
               <div><a href="#"> Zaboravili ste lozinku ? </a></div>
                </fieldset>
            </form>
            <?php if(isset($greska) && $greska){echo 
       "<div>Pogrešan unos. Proveri lozinku ili korisničko ime.</div>";}?>
    
        </div>
        
    
        <div class="register">

        <div>
        <form method="POST" action="./register.php">
                <fieldset>
                <legend> <h3> Registrujte se </h3> </legend>
                <div> 
                <label for="email"> Adresa e-pošte <span style="color:red;">* </span></label>
                <input type="email" name="email" id="email" placeholder="E-mail" required />
                <label for="password"> Lozinka <span style="color:red;">* </span> </label>
                <input type="password" name="password" id="password" placeholder="Unesite lozinku" minlength=8 required />
                </div>
                <div> <input type="submit" name="submit" value="Registrujte se" /> </div>
                </fieldset>
            </form>
            <?php if(isset($greska)) { echo $greska; }
                  if(isset($_POST['email'])) { echo $_POST['email']; }
            ?>
            
        </div> 
        </div>
        
        
    </div>


    <div class="toplist">
            
        <h2>Nova izdanja</h2>
        <hr>

        <div class="img1">
        <?php 
            $niz_knjiga = $conn -> nizKnjiga();
            $i=0;
            foreach ($niz_knjiga as $knjiga){
            if($i<4){
                echo nova_izdanja($knjiga[6],$knjiga[1],$knjiga[2]);  
             }
            $i++;
            }
        ?>
        </div>
            
    </div>
</div>

<div class="footer"> <?php include_once("./footer.php"); ?> </div> 
</body>
</html>
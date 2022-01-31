<?php
include_once("./function/initdb.php");
include_once("./fun1.php");
session_start();
///ako korisnik vec postoji u sesiji
if(isset($_SESSION['user'])) {
    header('Location: ./index.php');
}

//ako korisnik vec postoji u cookies
if(isset($_COOKIE['user'])) {
    $_SESSION['user'] = $_COOKIE['user'];
    header('Location: ./index.php');
}


if (isset($_POST['email']) && isset($_POST['password'])) {
    
    if($conn->registrujKorisnika($_POST['email'],$_POST['password'])) {
        header('Location: ./mojnalog.php');
    }
    $greska = "Korisnik vec postoji";
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
        
            
            <form method="post" action="login1.php">
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
            
        </div>
        
    
        <div class="register">

        <div>
        <form method="POST" action="./mojnalog.php">
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
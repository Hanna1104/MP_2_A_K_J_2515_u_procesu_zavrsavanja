<?php
 
include("./function/initdb.php");
include_once("./fun1.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./stilovi/styleheader_nav.css" />
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
           <hr>
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

    
</body>
</html>
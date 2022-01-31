<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./stilovi/styleheader_nav.css" />
    <link rel="stylesheet" href="./stilovi/stylecontact.css" />
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

 <div class="contact">
     <div class="information">
     <h2>KONTAKT</h2>
     <p>Za sve informacije možete nam se obratiti na:</p>
     <p> <span>&#9993;</span> prometej@gmail.com</p>
     <p><span>&#9742;</span>  +381 (0)18 0000000</p>
     <p><span>&#128241;</span>  +381 (0)60/0000000</p>
     <p>Radno vreme: ponedeljak – petak od 9 do 17h.</p>
     </div>

     <div class="message">
         <h3>PITANJA, PORUKE, PREDLOZI</h3>
         <form method="post" action="./kontakt.php">
        <label for="name"> Unesite ime i prezime: </label> <br>
         <input type="text" name="name" id="name" required /><br>
        <label for="email"> Unesite e-mail adresu: </label><br>
         <input type="email" name="email" id="email" required /><br>
        <label for="message"> Naslov poruke: </label><br>
         <input type="text" name="message" id="message" required /><br>
        <textarea id="poruka" name="poruka" rows="10" cols="45" placeholder="Unesite poruku"required></textarea><br>
        <input type="submit" value="Pošalji" />
            
     </div>
 </div>

 <div class="footer">
        <?php
        include_once("./footer.php")
        ?>
</div>  
</body>
</html>
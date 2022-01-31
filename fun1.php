<?php

function top_lista($slika,$naziv,$autor,$cena,$id){
    $product=
    "<img src='$slika' />" . 
            "<div class=\"article\">"."<h3>".'"'.$naziv.'"'."</h3>". 
            "<p>".$autor."</p>"."<h5 style=\"text-decoration:line-through\">"."Cena:" .$cena." RSD".
            "</h5>"."<h4>"."Akcija:".($cena-$cena*20/100)." RSD".
            "</h4>"."<button type='button'onclick='dodajUKorpu(".$id.")'>"."Dodaj u korpu"."</button>"."</div>";
            return $product;
    }
    
function nova_izdanja($slika,$naziv,$autor){
    $product =
               "<img src= '$slika' />" . 
               "<div class=\"article\">"."<h3>".'"'. $naziv.'"'."</h3>". 
               "<h3>".$autor."</h3>"."</div>";
    return $product;             
}

function knjiga($slika,$naziv,$autor){
       $product=
                "<div class=\"knjige\">"."<img src='$slika' />"  . 
                "<h1>".$naziv."</h1>". 
                "<h4>".$autor."</h4>"."</div>";
    return $product;
}

function edicija_knjiga($slika,$naziv,$autor,$cena,$product_id){
    $product= "<form method=\"post\" action=\"./edicije.php\">".   
            "<img src='$slika' />" ."<div class=\"article\">"."<h3>".'"'
            .$naziv.'"'."</h3>"."<p>".$autor.
            "</p>"."<h5 style=\"text-decoration:line-through\">"."Cena:" .$cena." RSD".
             "</h5>"."<h4>"."Akcija:".($cena-$cena*20/100)." RSD".
            "</h4>"."<button type=\"submit\" name=\"add\">"."Dodaj u korpu"."</button>".
            "<input type='hidden' name='product_id' value='$product_id' />"."</div>"."</form>";

    return $product;
}


function top_lista1($slika,$naziv,$autor,$cena){
    $product=
            "<img src='$slika' />" . 
            "<div class=\"article\">"."<h3>".'"'.$naziv.'"'."</h3>". 
            "<p>".$autor."</p>"."<h5 style=\"text-decoration:line-through\">"."Cena:" .$cena." RSD".
            "</h5>"."<h4>"."Akcija:".($cena-$cena*20/100)." RSD".
            "</h4>"."</div>";
    return $product;
}

function showcart($slika,$naziv,$autor,$cena){
    $product=
            "<form method=\"get\" action=\"./cart1.php\">".
            "<img src='$slika' />" . 
            "<div class=\"article\">"."<h3>".'"'.$naziv.'"'."</h3>". 
            "<p>".$autor."</p>"."<h5 style=\"text-decoration:line-through\">"."Cena:" .$cena." RSD".
            "</h5>"."<h4>"."Akcija:".($cena-$cena*20/100)." RSD".
            "</h4>"."</div>"."</form>";
    echo $product;
}
?>
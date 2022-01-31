
<?php 
include("./function/initdb.php") ;
$niz_knjiga = $conn -> nizKnjiga();
function nova_izdanja(){
    global $niz_knjiga;
            $i=0;
            foreach ($niz_knjiga as $knjiga){
               if($i<4){
                echo "<img src= '$knjiga[6]' />" . 
                "<div class=\"article\">"."<h3>".'"'. $knjiga[1].'"'."</h3>". 
                "<h3>".$knjiga[2]."</h3>"."</div>";
               }
               $i++;
            }
}

function top_lista(){
    global $niz_knjiga;
    $i=0;

    foreach ($niz_knjiga as $knjiga){
    if($i<3){
        echo "<img src='$knjiga[6]' />" . 
            "<div class=\"article\">"."<h3>".'"'.$knjiga[1].'"'."</h3>". 
            "<p>".$knjiga[2]."</p>"."<h5 style=\"text-decoration:line-through\">"."Cena:" .$knjiga[5]." RSD".
            "</h5>"."<h4>"."Akcija:".($knjiga[5]-$knjiga[5]*20/100)." RSD".
            "</h4>"."<button type='button'onclick='dodajUKorpu(".$knjiga[0].")'>"."Dodaj u korpu"."</button>"."</div>";
    }
    $i++;
    }
}

function top_lista1(){
    global $niz_knjiga;
    $i=0;

    foreach ($niz_knjiga as $knjiga){
    if($i<3){
        echo "<img src='$knjiga[6]' />" . 
            "<div class=\"article\">"."<h3>".'"'.$knjiga[1].'"'."</h3>". 
            "<p>".$knjiga[2]."</p>"."<h5 style=\"text-decoration:line-through\">"."Cena:" .$knjiga[5]." RSD".
            "</h5>"."<h4>"."Akcija:".($knjiga[5]-$knjiga[5]*20/100)." RSD".
            "</h4>"."</div>";
    }
    $i++;
    }
}
function edicija_knjiga(){
    global $niz_knjiga;

        $i=0; 
        foreach($niz_knjiga as $knjiga){
            if($i<5){
                echo "<img src='$knjiga[6]' />" ."<div class=\"article\">"."<h3>".'"'
                .$knjiga[1].'"'."</h3>"."<p>".$knjiga[2].
                "</p>"."<h5 style=\"text-decoration:line-through\">"."Cena:" .$knjiga[5]." RSD".
                "</h5>"."<h4>"."Akcija:".($knjiga[5]-$knjiga[5]*20/100)." RSD".
                "</h4>"."<button id=\"'$knjiga[0]'\">"."Dodaj u korpu"."</button>"."</div>";
            }
            $i++; 
        }
}

function sort_e_k($slova){
    
    global $niz_knjiga;
    sort($niz_knjiga);
        $i=0; 
        foreach($niz_knjiga as $knjiga){
            if($i<5){
                echo "<img src='$knjiga[6]' />" ."<div class=\"article\">"."<h3>".'"'
                .$knjiga[1].'"'."</h3>"."<p>".$knjiga[2].
                "</p>"."<h5 style=\"text-decoration:line-through\">"."Cena:" .$knjiga[5]." RSD".
                "</h5>"."<h4>"."Akcija:".($knjiga[5]-$knjiga[5]*20/100)." RSD".
                "</h4>"."<button id=\"'$knjiga[0]'\">"."Dodaj u korpu"."</button>"."</div>";
            }
            $i++;
        }
    
    }
function edicija_knjiga1(){
    global $niz_knjiga;
    shuffle($niz_knjiga);
        $i=0; 
        foreach($niz_knjiga as $knjiga){
            if($i<5){
                echo "<img src='$knjiga[6]' />" ."<div class=\"article\">"."<h3>".'"'
                .$knjiga[1].'"'."</h3>"."<p>".$knjiga[2].
                "</p>"."<h5 style=\"text-decoration:line-through\">"."Cena:" .$knjiga[5]." RSD".
                "</h5>"."<h4>"."Akcija:".($knjiga[5]-$knjiga[5]*20/100)." RSD".
                "</h4>"."<button id=\"'$knjiga[0]'\">"."Dodaj u korpu"."</button>"."</div>";
            }
            $i++; 
        }
}

function knjiga(){
    global $niz_knjiga;
    $i=0;
        foreach($niz_knjiga as $knjiga){
            if($i<5){
            echo "<div class=\"knjige\">"."<img src='$knjiga[6]' />"  . 
            "<h1>".$knjiga[1]."</h1>". 
            "<h4>".$knjiga[2]."</h4>"."</div>";}
        $i++;
        }
}


?>
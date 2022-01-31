
<?php

 function search($search){
    global $niz_knjiga;
    $j=0;
    for($i=0;$i<count($niz_knjiga);$i++){
        
        if($search==$niz_knjiga[$i]->getIme() || $search==$niz_knjiga[$i]->getImePisca()|| 
            strpos($niz_knjiga[$i]->getImePisca(),$search)|| strpos($niz_knjiga[$i]->getIme(),$search)
            || substr($niz_knjiga[$i]->getImePisca(),0,1)==substr($search,0,1) || 
            substr($niz_knjiga[$i]->getIme(),0,1)==substr($search,0,1)){
            echo  $niz_knjiga[$i]->getSlika() . 
             "<div class=\"article\">"."<h1>".$niz_knjiga[$i]->getIme()."</h1>". 
             "<h3>".$niz_knjiga[$i]->getImePisca()."</h3>"."<h4>"."Cena: "
             .$niz_knjiga[$i]->getCena()." din"."</h4>"."<button>"."Dodaj u korpu"."</button>"."</div>";
             $j++; 
        }
        
        
        
    }
    if($j==0){
        echo "<h1>".'"'."Nema rezultata".'"'."<br>"."</h1>".
        "<h3>". "Pokušajte sa početnim velikim slovom ili tačnim nazivom knjige!"."</h3>";
    }
    
    
}   //ovo je za pretrazivanje


function image(){//ovo je da mi sam pravi objekte na stranici
    global $niz_knjiga;
    
    for ($i=0;$i<5;$i++){
        $n=mt_rand(0,14);
        echo $niz_knjiga[$n]->getSlika() . 
        "<div class=\"article\">"."<h3>".'"'.$niz_knjiga[$n]->getIme().'"'."</h3>". 
        "<h3>".$niz_knjiga[$n]->getImePisca()."</h3>"."<h4>"."Cena: "
        .$niz_knjiga[$n]->getCena()." din"."</h4>"."<button>"."Dodaj u korpu"."</button>"."</div>";
    }
}

function nova_izdanja(){
    global $niz_knjiga;
    

    for ($i=0;$i<5;$i++){
        $n=mt_rand(0,14);
        echo $niz_knjiga[$n]->getSlika() . 
        "<div class=\"article\">"."<h3>".'"'.$niz_knjiga[$n]->getIme().'"'."</h3>". 
        "<h3>".$niz_knjiga[$n]->getImePisca()."</h3>"."</div>";
        
    }
}

function top_lista(){

    global $niz_knjiga;

    for ($i=0;$i<3;$i++){
        
        echo $niz_knjiga[$i]->getSlika() . 
        "<div class=\"article\">"."<h3>".'"'.$niz_knjiga[$i]->getIme().'"'."</h3>". 
        "<p>".$niz_knjiga[$i]->getImePisca()."</p>"."<h4>"."Cena: "
        .$niz_knjiga[$i]->getCena()." din"."</h4>"."<button>"."Dodaj u korpu"."</button>"."</div>";
        
    }
}

function knjige(){
    global $niz_knjiga;

    for ($i=0;$i<5;$i++){
        echo "<div class=\"knjige\">".$niz_knjiga[$i]->getSlika() . 
         "<h1>".$niz_knjiga[$i]->getIme()."</h1>". 
        "<h4>".$niz_knjiga[$i]->getImePisca()."</h4>"."</div>";
        
    }
}




?>

<?php

function sort2(){
    global $niz_knjiga1;
     $niz=[];
    for($i=0; $i<count($niz_knjiga1);$i++){
        if(substr($niz_knjiga1[$i]->getIme(),0,1)=="A"){
         echo array_push($niz, $niz_knjiga1[$i]->getIme());
        }
    }
}
?>

<?php

function create_user($user){
    global $niz_user;
    
    
   array_push($niz_user,$user);
}

?>













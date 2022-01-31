
<div class="body">
<div class="page-title">
    <h2>E-Knjižara</h2>
</div>

<div class="middle">
    <div class="edition">
        <h2>Top lista</h2>
        <hr>
            
        <div class="img">
        <?php 
                $niz_knjiga=$conn->nizKnjiga();
                $i=0;
                foreach($niz_knjiga as $knjiga){
                    if($i<4){
                    echo top_lista($knjiga[6],$knjiga[1],$knjiga[2],$knjiga[5],$knjiga[0]);

                    }$i++;
                }
        
            ?> 
        </div>           
        <script>
        const naruci = (_id) => {
            data = {
                id: _id
            };
            data = JSON.stringify(data);
            fetch('./porudzbina.php',{
                method: "POST",
                body: data,
            }).then((response) => {
                response.json().then((data)=> {
                    console.log(data);
                    if(data.response == 'success') {
                        alert('uspeh!');
                    } else {
                        alert('greska!');
                    }
                });
            })
        }
    </script>
            
    </div>

    <div class="search">
        <?php

            if(isset($_GET["Pretraga"]) && isset($_GET["submit"])){
                $search=$_GET["Pretraga"];
                if($search ==""){
                    echo "<h3 style=\"text-align: center\">Unesite pojam u pretragu !</h3>";
                }
              
                else{  
                    $niz_knjiga = $conn -> nizKnjiga();
                    $j=0;
                    
                    foreach($niz_knjiga as $knjiga){
                    if($search==$knjiga[1] || $search==$knjiga[2]|| 
                        strpos($knjiga[2],$search)|| strpos($knjiga[1],$search)
                        || substr($knjiga[2],0,1)==substr($search,0,1) || 
                        substr($knjiga[1],0,1)==substr($search,0,1)){

                        echo  "<img src='$knjiga[6]' />" . "<div class=\"article\">"."<h1>".$knjiga[1]."<h1>". 
                             "<h3>".$knjiga[2]."</h3>"."<h5 style=\"text-decoration:line-through\">"."Cena: ".$knjiga[5]." RSD"."</h5>"."<h4>"."Akcija:".($knjiga[5]-$knjiga[5]*20/100)." RSD".
                             "</h4>"."<button id=\" ' $knjiga[0] ' \">"."Dodaj u korpu"."</button>"."</div>";
                             $j++; 
                        }
                    }
                    if($j==0){
                        echo "<h1>".'"'."Nema rezultata".'"'."<br>"."</h1>".
                        "<h3>". "Pokušajte sa početnim velikim slovom ili tačnim nazivom knjige!"."</h3>";
                    }
                }
             
            }
        ?>
        
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


</div>
</div>
<div class="body">
<div class="page-title">
    <h2>E-Knjižara</h2>
</div>
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
            
    </div>

    <div class="edicije">
        <h2>Prodavnica</h2>
            <hr>
        <div class="sortname"> 
            <div>
            <form method="get" action="">
                <select id="name" name="slova" onchange="this.form.submit()">
                    <option value=""> Sortiraj po edicijama</option>
                    <option value="A-Z">Sortiraj po nazivu</option>
                    <option value="Autori">Sortiraj po autorima</option>
                </select>
            </form>
            </div>  
            

           <div class="img"> 
               <?php 
               $niz_knjiga = $conn->nizKnjiga();
               
               $i=0; 
               foreach($niz_knjiga as $knjiga){
                   if($i<5){               
                   echo edicija_knjiga($knjiga[6],$knjiga[1],$knjiga[2],$knjiga[5],$knjiga[0]);
                   }
                   $i++;
                }  
                ?> 
            </div>

        </div>
    
        <div class="sortcena">

        <div>
            <form method="get" action="./bodyediton.php">
                <select id="">
                    <option value=""> Sortiraj po ceni</option>
                    <option value="manja">Sortiraj od najmanje</option>
                    <option value="veca">Sortiraj od najveće</option>
                </select>
            </form>
            </div> 

            <div class="img"> 
                <?php 
                $niz_knjiga = $conn->nizKnjiga();
               $i=0; 
               foreach($niz_knjiga as $knjiga){
                   if($i<5){ 
                       echo edicija_knjiga($knjiga[6],$knjiga[1],$knjiga[2],$knjiga[5],$knjiga[0]);
                    }
                    $i++;
                }
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
<script>
        const naruci = (book_id) => {
            data = {
                id:book_id
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


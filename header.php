<header>
<div class="first">
    <h3>Besplatna dostava za porudžbine u vrednosti preko 3000 rsd ili više.</h3>

</div>

<div class="second">
    <div class="prvi"><h3><span class="fas fa-globe"></span> Jezik</h3></div>
    <div class="drugi"><h3><span class="fas fa-phone"></span>&nbsp+38160000000</h3></div>
    <div class="prazan"></div>
    <div class="treci">
    <h3><span class="fas fa-person"></span><a href="./mojnalog.php"> Moj nalog </a></h3>
    </div>
    <div class="cetvrti"><a href="./cart1.php"><h3><span class="fas fa-shopping-basket"></span> Moja korpa
    <?php
    if(isset($_SESSION['cart'])){
        $count = count($_SESSION['cart']);
    echo "<span id=\"cart_count\">$count</span>";}
    else{
        echo "<span id=\"cart_count\">&nbsp0</span>";
    } ?>
    </h3></a></div>
    <div class="logout">
        <h3><a href="./logout.php">Odjavi se </a></h3>
    
    </div>

</div>


</header>
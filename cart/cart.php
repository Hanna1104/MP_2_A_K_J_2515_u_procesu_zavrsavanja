<?php 


session_start();
class Korpa {
    function __construct() {
        if(!isset($_SESSION['item_cart'])) { 
            $_SESSION['item_cart'] = [];
        }
    }

    function dodajUKorpu($id,$amount) {
        if(isset($_SESSION['item_cart'][$id])) {
            $_SESSION['item_cart'][$id] += $amount;
        } else {
            $_SESSION['item_cart'][$id] = $amount;
        }
    }

    function listajKorpu() {
        foreach ($_SESSION['item_cart'] as $id => $amount) {
            echo "Stavka $id je u korpi $amount puta<br>";
        }
    }

    function isprazniKorpu() {
        $_SESSION['item_cart'] = [];
    }
}


$korpa = new Korpa();
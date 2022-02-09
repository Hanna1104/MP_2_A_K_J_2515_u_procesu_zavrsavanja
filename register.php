<?php
include_once("./initdb.php");
session_start();
if(isset($_SESSION['user'])) {
    header('Location: ./index.php');
}


if (isset($_POST['email']) && isset($_POST['password'])) {
    
    if($conn->registrujKorisnika($_POST['email'],$_POST['password'])) {
        header('Location: ./mojnalog.php');
    }
    $greska = "Korisnik vec postoji";
}


?>
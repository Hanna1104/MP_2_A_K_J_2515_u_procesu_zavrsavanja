<?php
include_once("./initdb.php");
session_start();
if(isset($_SESSION['user'])){
    header('Location: ./index.php');
}
//ako korisnik vec postoji u cookies
if(isset($_COOKIE['user'])) {
    $_SESSION['user'] = $_COOKIE['user'];
    header('Location: ./index.php');
}
//ako se korisnik upravo ulogovao
if(isset($_POST['user']) && isset($_POST['pass'])) {
    if($conn->proveriKorisnika1($_POST['user'],$_POST['pass'])) {
        //ako je checkiran keep me logged in
        if(isset($_POST['keep'])) {
            setcookie("user",$_POST['user'],time()+60*60*24);
        }
        $_SESSION['user'] = $_POST['user'];
        header('Location: ./index.php');
    }
    $greska=true;
}
header('Location: ./index.php');
?>
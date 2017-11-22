<?php
session_start();

if(isset($_SESSION['login'])){
    unset ($_SESSION['login']);
}

if(isset($_REQUEST['DNI'])){
    unset($_REQUEST['DNI']);
}

if(isset($_SESSION['type'])) {
    unset ($_SESSION['type']);
}
if(isset($_REQUEST['PasswordHash'])){
    unset($_REQUEST['PasswordHash']);
}


session_destroy();
header('Location:../index.php');







?>
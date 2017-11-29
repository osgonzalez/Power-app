<?php
session_start();

include '../Functions/Authentication.php';

if (!IsAuthenticated() || $_SESSION['type'] != 'ADMIN'){

    header('Location:../index.php');

}else{

    include '../Models/UsersModel.php';
    include '../Models/User.php';
    $DAO = new UserDAO();

    $message = $DAO->getChekin($_REQUEST['number']);

    if(strcasecmp($message,"ok") != 0){

        include '../Views/MESSAGE_View.php';
        new MESSAGE($message,'../index.php');

    }else{

        include '../Views/usersCheckIn.php';
        new userCheckIn($DAO->getLastResult());
    }

}



?>
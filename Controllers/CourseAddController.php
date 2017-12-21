<?php

session_start();

include '../Functions/Authentication.php';

if (!IsAuthenticated()){

    header('Location:../index.php');

}else{

    include '../Models/User.php';
    include '../Models/UsersModel.php';
    $DAO = new UserDAO();
    $user = new User("");
    $user->setUserType("COACH");
    $message = $DAO->getUserByType($user);



    if(strcasecmp($message,"ok") != 0){

        include '../Views/MESSAGE_View.php';
        new MESSAGE($message,'../index.php');

    }else{

        include '../Views/CurseAddView.php';
        new CurseAddView($DAO->getLastResult());
    }

}



?>
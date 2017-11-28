<?php

session_start();

include '../Functions/Authentication.php';

if (!IsAuthenticated()){

    header('Location:../index.php');

}else{

    include '../Models/TableModel.php';
    include '../Models/Table.php';
    $DAO = new TableDAO();

    $message = $DAO->getAll();

    if(strcasecmp($message,"ok") != 0){

        include '../Views/MESSAGE_View.php';
        new MESSAGE($message,'../index.php');

    }else{

        include '../Views/TableShowAllView.php';
        new TableShowAllView($DAO->getLastResult());
    }

}



?>
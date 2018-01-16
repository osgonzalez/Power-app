<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 16/01/18
 * Time: 18:36
 */

session_start();

include '../Functions/Authentication.php';

if (!IsAuthenticated()){

    header('Location:../index.php');

}else{

    include '../Models/TableModel.php';
    include '../Models/Table.php';
    $DAO = new TableDAO();

    $message = $DAO->getAllSession();

    if(strcasecmp($message,"ok") != 0){

        include '../Views/MESSAGE_View.php';
        new MESSAGE($message,'../index.php');

    }else{

        include '../Views/TableSessionShowAllView.php';
        new TableSessionShowAllView($DAO->getLastResult());
    }

}
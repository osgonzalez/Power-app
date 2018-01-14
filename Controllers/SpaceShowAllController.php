<?php
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 14/1/18
 * Time: 2:08
 */

session_start();

include '../Functions/Authentication.php';

if (!IsAuthenticated() || $_SESSION['type'] != 'ADMIN'){

    header('Location:../index.php');

}else{

    include '../Models/SpaceModel.php';
    include '../Models/Space.php';
    $DAO = new SpaceDAO();

    $message = $DAO->getAll();

    if(strcasecmp($message,"ok") != 0){

        include '../Views/MESSAGE_View.php';
        new MESSAGE($message,'../index.php');

    }else{

        include '../Views/SpaceShowAllView.php';
        new SpaceShowAllView($DAO->getLastResult());
    }

}



?>
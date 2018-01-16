<?php
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 15/01/2018
 * Time: 18:35
 */

session_start();

include '../Functions/Authentication.php';

if (!IsAuthenticated() || $_SESSION['type'] != 'ADMIN'){

    header('Location:../index.php');

}else{

    include '../Models/SpaceBookingModel.php';
    include '../Models/SpaceBooking.php';
    $DAO = new SpaceBookingDAO();

    $message = $DAO->getAll();

    if(strcasecmp($message,"ok") != 0){

        include '../Views/MESSAGE_View.php';
        new MESSAGE($message,'../index.php');

    }else{

        include '../Views/SpaceBookingShowAllView.php';
        new SpaceBookingShowAllView($DAO->getLastResult());
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 16/01/18
 * Time: 20:07
 */


session_start();

include '../Functions/Authentication.php';

if (!IsAuthenticated()){

    header('Location:../index.php');

}else{

    include '../Models/TableModel.php';
    include '../Models/Table.php';
    $DAO = new TableDAO();

    $message = $DAO->getSession($_REQUEST['IDTable']);

    if(strcasecmp($message,"ok") != 0){

        include '../Views/MESSAGE_View.php';
        new MESSAGE($message,'../index.php');

    }else{

        include '../Views/GraphicTableUserView.php';
        new GraphicTableUserView($DAO->getLastResult());
    }

}
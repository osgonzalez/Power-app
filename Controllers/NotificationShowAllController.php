<?php

session_start();

include '../Functions/Authentication.php';

if (!IsAuthenticated()){

    header('Location:../index.php');

}else{

  include '../Models/NotificationModel.php';
  include '../Models/Notification.php';
  $DAO = new NotificationDAO();

  $message = $DAO->getAll();

  if(strcasecmp($message,"ok") != 0){

      include '../Views/MESSAGE_View.php';
      new MESSAGE($message,'../index.php');

  }else{

      include '../Views/NotificationShowAllView.php';
      new NotificationShowAllView($DAO->getLastResult());
  }

}



?>

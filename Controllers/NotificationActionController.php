<?php
session_start();

include '../Functions/Authentication.php';

if (!IsAuthenticated()|| $_SESSION['type'] != 'ADMIN' ){

    header('Location:../index.php');

}else{
  include '../Models/NotificationModel.php';
  include '../Models/Notification.php';

  $DAO = new NotificationDAO();
  $message = "";


switch($_REQUEST['action']){

        case 'ADD':
        $notification = new Notification("");
        $notification->loadData($_REQUEST['Notification'], $_REQUEST['Notificationdate']);
        $message = $DAO->add($notification);

        break;
        case 'DELETE':
            $notification = new Notification($_REQUEST['$IDNotification']);
            $message = $DAO->delete($notification);
            break;

        case 'EDIT':
            $notification = new Notification($_REQUEST['$IDNotification']);
            $notification->loadData($_REQUEST['Notification'], $_REQUEST['Notificationdate']);
            $message = $DAO->edit($notification);

            break;

}
include '../Views/MESSAGE_View.php';
new MESSAGE($message,'../Controllers/NotificationShowAllController.php');

}
?>

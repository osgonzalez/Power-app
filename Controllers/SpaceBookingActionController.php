<?php
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 15/01/2018
 * Time: 18:36
 */

session_start();

include '../Functions/Authentication.php';

if (!IsAuthenticated() || $_SESSION['type'] != 'ADMIN'){

    header('Location:../index.php');

}else{

    include '../Models/SpaceBookingModel.php';
    include '../Models/SpaceBooking.php';

    $spaceBooking = new SpaceBooking($_REQUEST['IDSpace'], $_REQUEST['DNI'],$_REQUEST['DateBooking'],$_REQUEST['TimeBooking']);
    $DAO = new SpaceBookingDAO();
    $message = "";

    switch($_REQUEST['action']){
        case 'ADD':
            $spaceBooking->loadData($_REQUEST['IDSpace'], $_REQUEST['DNI'], $_REQUEST['DateBooking'], $_REQUEST['TimeBooking'], $_REQUEST['Commentary']);

            $message = $DAO->add($spaceBooking);
            include '../Views/MESSAGE_View.php';
            new MESSAGE($message,'../Controllers/SpaceBookingShowAllController.php');

            break;
        case 'DELETE':
            $message = $DAO->delete($spaceBooking);
            include '../Views/MESSAGE_View.php';
            new MESSAGE($message,'../Controllers/SpaceBookingShowAllController.php');
            break;
        case 'EDIT':
            $spaceBooking->loadData($_REQUEST['IDSpace'], $_REQUEST['DNI'], $_REQUEST['DateBooking'], $_REQUEST['TimeBooking'], $_REQUEST['Commentary']);

            $message = $DAO->edit($spaceBooking);
            include '../Views/MESSAGE_View.php';
            new MESSAGE($message,'../Controllers/SpaceBookingShowAllController.php');
            break;

    }



}



?>

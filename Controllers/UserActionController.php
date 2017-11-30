<?php
session_start();

include '../Functions/Authentication.php';

if (!IsAuthenticated() || $_SESSION['type'] != 'ADMIN'){

    header('Location:../index.php');

}else{

    include '../Models/UsersModel.php';
    include '../Models/User.php';

    $user = new User($_REQUEST['DNI']);
    $DAO = new UserDAO();
    $message = "";

    switch($_REQUEST['action']){
        case 'ADD':
            $user->loadData($_REQUEST['UserType'], $_REQUEST['PasswordHash'], $_REQUEST['FirstName'], $_REQUEST['LastName'], $_REQUEST['Email']
                                , $_REQUEST['Telephone'], $_REQUEST['City'], $_REQUEST['Birthdate']);

            $user->hashPassword();
            $message = $DAO->add($user);
            include '../Views/MESSAGE_View.php';
            new MESSAGE($message,'../Controllers/UserShowAllController.php');

            break;
        case 'DELETE':
            $message = $DAO->delete($user);
            include '../Views/MESSAGE_View.php';
            new MESSAGE($message,'../Controllers/UserShowAllController.php');
            break;
        case 'EDIT':
            $user->loadData($_REQUEST['UserType'], $_REQUEST['PasswordHash'], $_REQUEST['FirstName'], $_REQUEST['LastName'], $_REQUEST['Email']
                , $_REQUEST['Telephone'], $_REQUEST['City'], $_REQUEST['Birthdate']);

            $user->hashPassword();
            $message = $DAO->edit($user);
            include '../Views/MESSAGE_View.php';
            new MESSAGE($message,'../Controllers/UserShowAllController.php');
            break;
        case 'CHECKIN':
            $message = $DAO->checkIn($user);
            include '../Views/MESSAGE_View.php';
            new MESSAGE($message,'../Controllers/CheckInShowAllController.php?number=10');

            break;

        case 'addSesion':
            $message = $DAO->addSesion(new Table($_REQUEST['IDTable']),new User($_SESSION['login']),$_REQUEST['message'],$_REQUEST['timeStamp']);
            include '../Views/MESSAGE_View.php';
            new MESSAGE($message,'../Controllers/TableShowAllController.php');
            break;

    }



}



?>


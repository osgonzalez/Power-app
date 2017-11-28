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
            break;
        case 'DELETE':
            $message = $DAO->delete($user);
            break;
        case 'EDIT':
            $user->loadData($_REQUEST['UserType'], $_REQUEST['PasswordHash'], $_REQUEST['FirstName'], $_REQUEST['LastName'], $_REQUEST['Email']
                , $_REQUEST['Telephone'], $_REQUEST['City'], $_REQUEST['Birthdate']);

            $user->hashPassword();
            $message = $DAO->edit($user);
            break;

    }


        include '../Views/MESSAGE_View.php';
        new MESSAGE($message,'../Controllers/UserShowAllController.php');



}



?>


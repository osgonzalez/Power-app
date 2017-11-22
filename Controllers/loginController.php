<?php


session_start();
//incluir funcion autenticacion
include '../Functions/Authentication.php';
//si no esta autenticado
if (IsAuthenticated()){
    include '../Views/welcomeUserView.php';
    new welcome();

}else{
    if(!isset($_REQUEST['DNI']) && !(isset($_REQUEST['PasswordHash']))){
        include '../Views/loginView.php';
        new login();
    }
    else {

        include '../Models/UsersModel.php';
        include '../Models/User.php';
        $user = new User($_REQUEST['DNI']);
        $user->setPasswordHash($_REQUEST['PasswordHash']);
        $user->hashPassword();

        $usuarioDAO = new UserDAO();
        $respuesta = $usuarioDAO->login($user);


        if (strcasecmp($respuesta, 'ok') == 0) {
            session_start();
            $usuarioDAO->get($user);
            $_SESSION['login'] = $_REQUEST['DNI'];
            $_SESSION['type'] = "ADMIN";//$usuarioDAO->getLastResult()->getUserType();
            header('Location:../index.php');
        } else {
            unset($_REQUEST['DNI']);
            unset($_REQUEST['PasswordHash']);
            include '../Views/MESSAGE_View.php';
            new MESSAGE($respuesta, './loginController.php');
        }

    }
}




?>


<?php



session_start();

include '../Functions/Authentication.php';

if (!IsAuthenticated() || ($_SESSION['type'] != 'ADMIN' && $_SESSION['type'] != 'COACH')){

    header('Location:../index.php');

}else{

    include '../Models/ExerciseModel.php';
    include '../Models/Exercise.php';
    $DAO = new ExerciseDAO();

    $message = $DAO->getAll();

    if(strcasecmp($message,"ok") != 0){

        include '../Views/MESSAGE_View.php';
        new MESSAGE($message,'../index.php');

    }else{

        include '../Views/ExerciseShowAllView.php';
        new ExerciseShowAllView($DAO->getLastResult());
    }

}




?>
<?php
session_start();

include '../Functions/Authentication.php';

if (!IsAuthenticated() && $_SESSION['type'] == 'ADMIN'){

    header('Location:../index.php');

}else{

    include '../Models/CoursesModel.php';
    include '../Models/Course.php';
    $DAO = new CourseDAO();

    $message = $DAO->getAll();

    if(strcasecmp($message,"ok") != 0){

        include '../Views/MESSAGE_View.php';
        new MESSAGE($message,'../index.php');

    }else{

        include '../Views/CoursesShowAllView.php';
        new CoursesShowAllView($DAO->getLastResult());
    }

}



?>
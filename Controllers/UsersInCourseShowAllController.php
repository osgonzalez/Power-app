<?php
include '../Functions/Authentication.php';
session_start();

if (!IsAuthenticated() || ($_SESSION['type'] != 'ADMIN' && $_SESSION['type'] != 'COACH')){

    header('Location:../index.php');

}else{

    include '../Models/CoursesModel.php';
    include '../Models/Course.php';
    include '../Models/UsersModel.php';
    include '../Models/User.php';
    $course = new Course($_REQUEST['IDCourses']);
    $DAO = new CourseDAO();

    $message = $DAO->get($course);

    if(strcasecmp($message,"ok") != 0){

        include '../Views/MESSAGE_View.php';
        new MESSAGE($message,'../index.php');

    }else{

        include '../Views/usersInCourseView.php';
        new usersInCourseView($DAO->getLastResult());
    }

}



?>
<?php

session_start();

include '../Functions/Authentication.php';

if (!IsAuthenticated() || ($_SESSION['type'] != 'ADMIN')){

    header('Location:../index.php');

}else{

   // include '../Templates/header.html';
   // include '../Templates/lateralBarAdmin.html';
    include '../Models/CoursesModel.php';



    $DAO = new CourseDAO();

    $message = $DAO->addUser($_REQUEST['IDCourses'],$_REQUEST['DNI']);


        include '../Views/MESSAGE_View.php';
        new MESSAGE($message,'../index.php');


}








?>
<?php
session_start();

include '../Functions/Authentication.php';

if (!IsAuthenticated() || ($_SESSION['type'] != 'ADMIN')){

    header('Location:../index.php');

}else{

    include '../Models/CoursesModel.php';
    include '../Models/Course.php';


    $message = "";

    switch($_REQUEST['action']){
        case 'ADD':
            $course = new Course("");
            $DAO = new CourseDAO();
            $course->loadData($_REQUEST['Name'], $_REQUEST['Content'], $_REQUEST['DataStart'], $_REQUEST['DataEnd'], $_REQUEST['NPlaces']
                , $_REQUEST['DNICoach']);

            $message = $DAO->add($course);
            break;
        case 'DELETE':
            $course = new Course($_REQUEST['IDCourses']);
            $DAO = new CourseDAO();
            $message = $DAO->delete($course);
            break;
        case 'EDIT':
            $course = new Course($_REQUEST['IDCourses']);
            $DAO = new CourseDAO();
            $course->loadData($_REQUEST['Name'], $_REQUEST['Content'], $_REQUEST['DataStart'], $_REQUEST['DataEnd'], $_REQUEST['NPlaces']
                , $_REQUEST['DNICoach']);

            $message = $DAO->edit($course);
            break;

    }


    include '../Views/MESSAGE_View.php';
    new MESSAGE($message,'../Controllers/CoursesShowAllController.php');



}




?>
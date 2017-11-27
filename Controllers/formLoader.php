<?php

session_start();

include '../Functions/Authentication.php';

if (!IsAuthenticated() || $_SESSION['type'] != 'ADMIN'){

    header('Location:../index.php');

}else{
    include '../Templates/header.html';
    switch($_SESSION['type']){
        case 'ADMIN':
            include '../Templates/lateralBarAdmin.html';
            break;
        case 'COACH':
            include '../Templates/lateralBarCoach.html';
            break;
        case 'PEF':
            include '../Templates/lateralBarDeportista.html';
            break;
        case 'TDU':
            include '../Templates/lateralBarDeportista.html';
            break;
    }

    switch($_REQUEST['form']){

        case 'courseEdit':
            include '../Views/courseEditView.php';
            include '../Models/CoursesModel.php';
            include '../Models/Course.php';
            $course = new Course($_REQUEST['IDCourse']);
            $DAO = new CourseDAO();
            $DAO->get($course);
            $course = $DAO->getLastResult();
            new courseEditView($course);
            break;

        case 'courseAdd':
            include '../Templates/courseAddForm.html';
            break;

        case 'userEdit':
            include '../Views/userEditView.php';
            include '../Models/UsersModel.php';
            include '../Models/User.php';
            $user = new User($_REQUEST['DNI']);
            $DAO = new UserDAO();
            $DAO->get($user);
            $user = $DAO->getLastResult();
            new userEditView($user);
            break;

        case 'userAdd':
            include '../Templates/userAddForm.html';
            break;

        case 'exerciseEdit':
            break;

        case 'exerciseAdd':
            break;

        case 'tableEdit':
            include '../Views/courseEditView.php';
            include '../Models/CoursesModel.php';
            include '../Models/Course.php';
            $course = new Course($_REQUEST['IDCourse']);
            $DAO = new CourseDAO();
            $DAO->get($course);
            $course = $DAO->getLastResult();
            new courseEditView($course);
            break;

        case 'tableAdd':
            include '../Templates/tableAddForm.html';
            break;

    }

    include '../Templates/footer.html';
}



?>


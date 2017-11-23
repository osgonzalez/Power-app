<?php

session_start();

include '../Functions/Authentication.php';

if (!IsAuthenticated() && $_SESSION['type'] == 'ADMIN'){

    header('Location:../index.php');

}else{
    include '../Templates/header.html';
    include '../Templates/lateralBar.html';

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
            break;

        case 'userAdd':
            include '../Templates/userAddForm.html';
            break;

        case 'exerciseEdit':
            break;

        case 'exerciseAdd':
            break;



    }

    include '../Templates/footer.html';
}



?>


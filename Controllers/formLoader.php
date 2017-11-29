<?php

session_start();

include '../Functions/Authentication.php';

if (!IsAuthenticated()){

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

        case 'userAddToCourse':


        case 'userEdit':
            include '../Views/userEditView.php';
            include '../Models/UsersModel.php';
            include '../Models/User.php';
            $exercise = new User($_REQUEST['DNI']);
            $DAO = new UserDAO();
            $DAO->get($exercise);
            $exercise = $DAO->getLastResult();
            new userEditView($exercise);
            break;

        case 'userAdd':
            include '../Templates/userAddForm.html';
            break;

        case 'exerciseEdit':
            include '../Views/exerciseEditView.php';
            include '../Models/ExerciseModel.php';
            include '../Models/Exercise.php';
            $exercise = new Exercise($_REQUEST['IDExercise']);
            $DAO = new ExerciseDAO();
            $DAO->get($exercise);
            $exercise = $DAO->getLastResult();
            new exerciseEditView($exercise);
            break;

        case 'exerciseAdd':
            include '../Templates/exerciseAddForm.html';
            break;

        case 'tableEdit':
            include '../Views/TableEditView.php';
            include '../Models/TableModel.php';
            include '../Models/Table.php';
            $table = new Table($_REQUEST['IDTable']);
            $DAO = new TableDAO();
            $DAO->get($table);
            $table = $DAO->getLastResult();
            new tableEditView($table);
            break;

        case 'tableAdd':
            include '../Templates/tableAddForm.html';
            break;

        case 'tableShowOne':
            include '../Views/TableShowExercisesView.php';
            include '../Models/ExerciseModel.php';
            include '../Models/Exercise.php';
            include '../Models/TableModel.php';
            include '../Models/Table.php';
            $table = new Table($_REQUEST['IDTable']);
            $DAO = new TableDAO();
            $DAO->get($table);
            $table = $DAO->getLastResult();
            new TableView($table);
            break;

        case 'exerciseShowOne':
            include '../Views/ExerciseComplete.php';
            include '../Models/ExerciseModel.php';
            include '../Models/Exercise.php';

            $exercise = new Exercise($_REQUEST['IDExercise']);
            $DAO = new ExerciseDAO();
            $DAO->get($exercise);
            new ExerciseComplete($DAO->getLastResult());
            break;

    }

    include '../Templates/footer.html';
}



?>


<?php

session_start();

include '../Functions/Authentication.php';

if (!IsAuthenticated()){

    header('Location:../index.php');

}else{



    switch($_REQUEST['form']){

        case 'courseEdit':
            include '../Templates/header.html';
            switch($_SESSION['type']){
                case 'ADMIN':
                    include '../Templates/lateralBarAdmin.php';
                    break;
                case 'COACH':
                    include '../Templates/lateralBarCoach.php';
                    break;
                case 'PEF':
                    include '../Templates/lateralBarDeportista.php';
                    break;
                case 'TDU':
                    include '../Templates/lateralBarDeportista.php';
                    break;
            }
            include '../Views/courseEditView.php';
            include '../Models/CoursesModel.php';
            include '../Models/Course.php';
            include '../Models/User.php';
            include '../Models/UsersModel.php';
            $course = new Course($_REQUEST['IDCourses']);
            $DAO = new CourseDAO();
            $DAO->get($course);
            $course = $DAO->getLastResult();


            $userDAO = new UserDAO();
            $user = new User("");
            $user->setUserType("COACH");
            $userDAO->getUserByType($user);

            $message = $DAO->getAll();
            $coachs = $userDAO->getLastResult();


            new courseEditView($course,$coachs);
            break;



        case 'userAddToCourse':
            include '../Templates/header.html';
            switch($_SESSION['type']){
                case 'ADMIN':
                    include '../Templates/lateralBarAdmin.php';
                    break;
                case 'COACH':
                    include '../Templates/lateralBarCoach.php';
                    break;
                case 'PEF':
                    include '../Templates/lateralBarDeportista.php';
                    break;
                case 'TDU':
                    include '../Templates/lateralBarDeportista.php';
                    break;
            }
            break;

        case 'userEdit':
            include '../Templates/header.html';
            switch($_SESSION['type']){
                case 'ADMIN':
                    include '../Templates/lateralBarAdmin.php';
                    break;
                case 'COACH':
                    include '../Templates/lateralBarCoach.php';
                    break;
                case 'PEF':
                    include '../Templates/lateralBarDeportista.php';
                    break;
                case 'TDU':
                    include '../Templates/lateralBarDeportista.php';
                    break;
            }
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
            include '../Templates/header.html';
            switch($_SESSION['type']){
                case 'ADMIN':
                    include '../Templates/lateralBarAdmin.php';
                    break;
                case 'COACH':
                    include '../Templates/lateralBarCoach.php';
                    break;
                case 'PEF':
                    include '../Templates/lateralBarDeportista.php';
                    break;
                case 'TDU':
                    include '../Templates/lateralBarDeportista.php';
                    break;
            }
            include '../Templates/userAddForm.html';
            break;

            case 'notificationAdd':
                include '../Templates/header.html';
                switch($_SESSION['type']){
                    case 'ADMIN':
                        include '../Templates/lateralBarAdmin.php';
                        break;
                    case 'COACH':
                        include '../Templates/lateralBarCoach.php';
                        break;
                    case 'PEF':
                        include '../Templates/lateralBarDeportista.php';
                        break;
                    case 'TDU':
                        include '../Templates/lateralBarDeportista.php';
                        break;
                }
                include '../Templates/notificationAddForm.html';
                break;

        case 'exerciseEdit':
            include '../Templates/header.html';
            switch($_SESSION['type']){
                case 'ADMIN':
                    include '../Templates/lateralBarAdmin.php';
                    break;
                case 'COACH':
                    include '../Templates/lateralBarCoach.php';
                    break;
                case 'PEF':
                    include '../Templates/lateralBarDeportista.php';
                    break;
                case 'TDU':
                    include '../Templates/lateralBarDeportista.php';
                    break;
            }
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
            include '../Templates/header.html';
            switch($_SESSION['type']){
                case 'ADMIN':
                    include '../Templates/lateralBarAdmin.php';
                    break;
                case 'COACH':
                    include '../Templates/lateralBarCoach.php';
                    break;
                case 'PEF':
                    include '../Templates/lateralBarDeportista.php';
                    break;
                case 'TDU':
                    include '../Templates/lateralBarDeportista.php';
                    break;
            }
            include '../Templates/exerciseAddForm.html';
            break;

        case 'tableEdit':
            include '../Templates/header.html';
            switch($_SESSION['type']){
                case 'ADMIN':
                    include '../Templates/lateralBarAdmin.php';
                    break;
                case 'COACH':
                    include '../Templates/lateralBarCoach.php';
                    break;
                case 'PEF':
                    include '../Templates/lateralBarDeportista.php';
                    break;
                case 'TDU':
                    include '../Templates/lateralBarDeportista.php';
                    break;
            }
            include '../Views/TableEditView.php';
            include '../Models/TableModel.php';
            include '../Models/Table.php';
            $table = new Table($_REQUEST['IDTable']);
            $DAO = new TableDAO();
            $DAO->get($table);
            $table = $DAO->getLastResult();
            new tableEditView($table);
            break;


        case 'tableShowOne':
            include '../Templates/header.html';
            switch($_SESSION['type']){
                case 'ADMIN':
                    include '../Templates/lateralBarAdmin.php';
                    break;
                case 'COACH':
                    include '../Templates/lateralBarCoach.php';
                    break;
                case 'PEF':
                    include '../Templates/lateralBarDeportista.php';
                    break;
                case 'TDU':
                    include '../Templates/lateralBarDeportista.php';
                    break;
            }
            include '../Views/TableShowExercisesView.php';
            include '../Models/ExerciseModel.php';
            include '../Models/Exercise.php';
            include '../Models/TableModel.php';
            include '../Models/Table.php';
            $table = new Table($_REQUEST['IDTable']);
            $DAO = new TableDAO();
            $DAO->get($table);
            $table = $DAO->getLastResult();
            new TableShowExercisesView($table);
            break;

        case 'exerciseShowOne':
            include '../Templates/headerSimple.html';
            include '../Views/ExerciseComplete.php';
            include '../Models/ExerciseModel.php';
            include '../Models/Exercise.php';


            $exercise = new Exercise($_REQUEST['IDExercise']);
            $DAO = new ExerciseDAO();
            $DAO->get($exercise);
            new ExerciseComplete($DAO->getLastResult());
            break;

        case 'addSesion':
            include '../Templates/header.html';
            switch($_SESSION['type']){
                case 'ADMIN':
                    include '../Templates/lateralBarAdmin.php';
                    break;
                case 'COACH':
                    include '../Templates/lateralBarCoach.php';
                    break;
                case 'PEF':
                    include '../Templates/lateralBarDeportista.php';
                    break;
                case 'TDU':
                    include '../Templates/lateralBarDeportista.php';
                    break;
            }
            include '../Views/addSesionView.php';
            include '../Models/Table.php';
            $table = new Table($_REQUEST['IDTable']);
            new addSesionView($table);
            break;

        case 'addExerciseInTable':

            include '../Views/selectExerciseToTableView.php';
            include '../Models/ExerciseModel.php';
            include '../Models/Exercise.php';
            include '../Models/TableModel.php';
            include '../Models/Table.php';

            $DAO = new ExerciseDAO();
            $message = $DAO->getAll();

            new SelectExerciseToTableView($DAO->getLastResult(),$_REQUEST['IDTable']);

    }





    include '../Templates/footer.html';
}



?>

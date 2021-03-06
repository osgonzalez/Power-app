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

            case 'notificationEdit':
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
                include '../Views/NotificationEditView.php';
                include '../Models/NotificationModel.php';
                include '../Models/Notification.php';
                $notification = new Notification($_REQUEST['IDNotification']);
                $DAO = new NotificationDAO();
                $DAO->get($notification);
                $notification = $DAO->getLastResult();
                new NotificationEditView($notification);
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

        case 'spaceBookingEdit':
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
            include '../Models/SpaceBookingModel.php';
            include '../Models/SpaceBooking.php';
            $spaceBooking = new SpaceBooking($_REQUEST['IDSpace'], $_REQUEST['DNI'], $_REQUEST['DateBooking'], $_REQUEST['TimeBooking']);
            $DAO = new SpaceBookingDAO();
            $DAO->get($spaceBooking);
            $spaceBooking = $DAO->getLastResult();
            new SpaceBookingEditView($spaceBooking);
            break;

        case 'spaceBookingAdd':
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
            include '../Views/spaceBookingAddView.php';
            include '../Models/SpaceBooking.php';
            include '../Models/SpaceBookingModel.php';
            $DAO = new SpaceBookingDAO();
            $space = $DAO->idName();
            new spaceBookingAddView($space);
            break;

        case 'spaceAdd':
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
            include '../Templates/spaceAddForm.html';
            break;

        case 'spaceEdit':
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
            include '../Views/spaceEditView.php';
            include '../Models/SpaceModel.php';
            include '../Models/Space.php';
            $space = new Space($_REQUEST['IDSpace']);
            $DAO = new SpaceDAO();
            $DAO->get($space);
            $space = $DAO->getLastResult();
            new spaceEditView($space);
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

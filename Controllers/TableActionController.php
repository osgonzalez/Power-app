<?php
session_start();

include '../Functions/Authentication.php';

if (!IsAuthenticated() ){

    header('Location:../index.php');

}else{

    include '../Models/TableModel.php';
    include '../Models/Table.php';

    $table = new Table($_REQUEST['IDTable']);
    $DAO = new TableDAO();
    $message = "";

    switch($_REQUEST['action']){
        /*case 'ADD':
            $course->loadData($_REQUEST['Name'], $_REQUEST['Content'], $_REQUEST['DataStart'], $_REQUEST['DataEnd'], $_REQUEST['NPlaces']
                , $_REQUEST['DNICoach']);

            $message = $DAO->add($course);
            break;*/
        case 'DELETE':
            $message = $DAO->delete($table);
            break;
        /*case 'EDIT':
            $course->loadData($_REQUEST['Name'], $_REQUEST['Content'], $_REQUEST['DataStart'], $_REQUEST['DataEnd'], $_REQUEST['NPlaces']
                , $_REQUEST['DNICoach']);

            $message = $DAO->edit($course);
            break;
*/
    }


    include '../Views/MESSAGE_View.php';
    new MESSAGE($message,'../Controllers/CoursesShowAllController.php');



}




?>
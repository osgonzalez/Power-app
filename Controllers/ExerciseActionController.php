<?php

session_start();

include '../Functions/Authentication.php';

if (!IsAuthenticated() || ($_SESSION['type'] != 'ADMIN' && $_SESSION['type'] != 'COACH')){

    header('Location:../index.php');

}else {

    include '../Models/ExerciseModel.php';
    include '../Models/Exercise.php';


    $DAO = new ExerciseDAO();
    $message = "";

    switch ($_REQUEST['action']) {
        case 'ADD':
            $exercise = new Exercise("");
            $exercise->loadData($_REQUEST['Name'], $_REQUEST['ExerciseType'],$_REQUEST['UrlImage'],$_REQUEST['UrlVideo'], $_REQUEST['Content']);

            $message = $DAO->add($exercise);
            break;
        case 'DELETE':
            $exercise = new Exercise($_REQUEST['IDExercise']);
            $message = $DAO->delete($exercise);
            break;
        case 'EDIT':
            $exercise = new Exercise($_REQUEST['IDExercise']);
            $exercise->loadData($_REQUEST['Name'], $_REQUEST['ExerciseType'],$_REQUEST['UrlImage'],$_REQUEST['UrlVideo'], $_REQUEST['Content']);

            $message = $DAO->edit($exercise);
            break;

    }


    include '../Views/MESSAGE_View.php';
    new MESSAGE($message, '../Controllers/ExerciseShowAllController.php');


}
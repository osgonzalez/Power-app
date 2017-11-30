<?php
session_start();

include '../Functions/Authentication.php';

if (!IsAuthenticated() || ($_SESSION['type'] != 'ADMIN' && $_SESSION['type'] != 'COACH')){

    header('Location:../index.php');

}else{

    include '../Models/TableModel.php';
    include '../Models/Table.php';

    $table = new Table($_REQUEST['IDTable']);
    $DAO = new TableDAO();
    $message = "";

    switch($_REQUEST['action']){
        case 'ADD':
            $table->loadData($_REQUEST['IDTable'], $_REQUEST['TableType'], 0, 0, $_REQUEST['Content']
                , $_REQUEST['Visibility']);

            $message = $DAO->add($table);
            include '../Views/MESSAGE_View.php';
            new MESSAGE($message,'../Controllers/TableShowAllController.php');
            break;
        case 'DELETE':
            $message = $DAO->delete($table);
            include '../Views/MESSAGE_View.php';
            new MESSAGE($message,'../Controllers/TableShowAllController.php');
            break;
        case 'ADDEXERCISE':

            include '../Models/Exercise.php';
            //Todo Descrition is empy
            $message = $DAO->addExserciseInTable($table,new Exercise($_REQUEST['IDExercise']),"");
            include '../Views/MESSAGE_View.php';
            new MESSAGE($message,'../Controllers/formLoader.php?IDTable='.$_REQUEST['IDTable'].'&form=tableShowOne');

            break;

    }






}




?>
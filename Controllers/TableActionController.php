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
            $table->loadData($_REQUEST['IDTable'], $_REQUEST['TableType'], $_REQUEST['TotalScore'], $_REQUEST['NumberOfVotes'], $_REQUEST['Content']
                , $_REQUEST['Visibility']);

            $message = $DAO->add($table);
            break;
        case 'DELETE':
            $message = $DAO->delete($table);
            break;
        case 'ADDEXERCISE':

            include '../Models/Exercise.php';
            $message = $DAO->addExserciseInTable($table,new Exercise($_REQUEST['IDExercise']),$_REQUEST['Description']);
            break;

    }


    include '../Views/MESSAGE_View.php';
    new MESSAGE($message,'../Controllers/TableShowAllController');



}




?>
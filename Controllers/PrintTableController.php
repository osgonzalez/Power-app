<?php
/**
 * Created by PhpStorm.
 * User: r
 * Date: 12/01/18
 * Time: 19:44
 */



session_start();

include '../Functions/Authentication.php';

if (!IsAuthenticated()){

    header('Location:../index.php');

}else{
    /*

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
    }*/
    include '../Views/TablePrintExerciseView.php';
    include '../Models/ExerciseModel.php';
    include '../Models/Exercise.php';
    include '../Models/TableModel.php';
    include '../Models/Table.php';
    $table = new Table($_REQUEST['IDTable']);
    $DAO = new TableDAO();
    $DAO->get($table);
    $table = $DAO->getLastResult();
    new TablePrintExerciseView($table);

}











?>
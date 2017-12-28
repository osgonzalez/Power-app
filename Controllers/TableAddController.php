<?php

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

include '../Views/TableAddView.php';
include_once '../Models/Course.php';


include '../Views/selectExerciseToTableView.php';
include_once '../Models/ExerciseModel.php';
include_once '../Models/Exercise.php';
include_once '../Models/TableModel.php';
include_once '../Models/Table.php';

$DAO = new ExerciseDAO();
$message = $DAO->getAll();

new TableAddView($DAO->getLastResult());


include '../Templates/footer.html';


?>
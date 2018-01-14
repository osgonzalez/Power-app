<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 14/01/18
 * Time: 0:36
 */

session_start();

include '../Functions/Authentication.php';

if (!IsAuthenticated()){

    header('Location:../index.php');

}else{
    if($_REQUEST['DNI'] == null) {
        include '../Templates/header.html';
        switch ($_SESSION['type']) {
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

        include '../Views/TableSessionView.php';
        include '../Models/ExerciseModel.php';
        include '../Models/Exercise.php';
        include '../Models/TableModel.php';
        include '../Models/Table.php';
        $table = new Table($_REQUEST['IDTable']);
        $DAO = new TableDAO();
        $DAO->get($table);
        $table = $DAO->getLastResult();
        new TableSessionView($table);
    }else{




    }

}






?>
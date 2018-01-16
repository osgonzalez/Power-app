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

    if(!isset($_REQUEST['Confirm'])) {
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

        include '../Templates/footer.html';
    }else{

        include '../Models/ExerciseModel.php';
        include '../Models/Exercise.php';
        include '../Models/TableModel.php';
        include '../Models/Table.php';
        include '../Views/MESSAGE_View.php';
        $DAO = new TableDAO();
        $message = $DAO->addSession($_REQUEST['IDTable'],$_REQUEST['Record'],$_REQUEST['Comment']);
        new MESSAGE($message,'../Controllers/TableShowAllController.php');

    }

}






?>
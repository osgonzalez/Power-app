<?php
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 14/1/18
 * Time: 2:33
 */

session_start();

include '../Functions/Authentication.php';

if (!IsAuthenticated() || $_SESSION['type'] != 'ADMIN'){

    header('Location:../index.php');

}else{

    include '../Models/SpaceModel.php';
    include '../Models/Space.php';


    $DAO = new SpaceDAO();
    $message = "";

    switch($_REQUEST['action']){
        case 'ADD':
            $space = new Space("");
            $space->loadData($_REQUEST['NameSpace'], $_REQUEST['Description'], $_REQUEST['Capacity']);

            $message = $DAO->add($space);

            break;
        case 'DELETE':
            $space = new Space($_REQUEST['IDSpace']);
            $message = $DAO->delete($space);
            break;

        case 'EDIT':
            $space = new Space($_REQUEST['IDSpace']);
            $space->loadData($_REQUEST['NameSpace'], $_REQUEST['Description'],$_REQUEST['Capacity']);
            $message = $DAO->edit($space);

            break;

    }
    include '../Views/MESSAGE_View.php';
    new MESSAGE($message,'../Controllers/SpaceShowAllController.php');


}
?>
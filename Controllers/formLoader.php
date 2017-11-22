<?php

session_start();

include '../Functions/Authentication.php';

if (!IsAuthenticated() && $_SESSION['type'] == 'ADMIN'){

    header('Location:../index.php');

}else{
    include '../Templates/header.html';
    include '../Templates/lateralBar.html';

    switch($_REQUEST['form']){

        case 'courseEdit':
            include '../Views/courseEditView.php';
            break;

        case 'courseAdd':
            include '../Templates/courseAddForm.html';
            break;

        case 'userEdit':
            include '../Views/userEditView.php';
            break;

        case 'userAdd':
            include '../Templates/userAddForm.html';
            break;



    }

    include '../Templates/footer.html';
}



?>


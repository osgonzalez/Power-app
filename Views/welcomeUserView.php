<?php

class welcome{


    function __construct(){
        $this->render();
    }

    function render(){

        include '../Templates/header.html';
        switch($_SESSION['type']){
            case 'ADMIN':
                include '../Templates/lateralBar.html';
                include '../Templates/adminWelcomePage.php';
                break;
            case 'COACH':
                include '../Templates/lateralBar.html';
                include '../Templates/adminWelcomePage.php';
                break;
            case 'PEF':
                include '../Templates/lateralBar.html';
                include '../Templates/userWelcomePage.php';
                break;
            case 'TDU':
                include '../Templates/lateralBar.html';
                include '../Templates/userWelcomePage.php';
                break;

        }
        include '../Templates/footer.html';

    }





}


?>
<?php


function IsAuthenticated(){
    if (!isset($_SESSION['login']) && !isset($_SESSION['type'])){
        return false;
    }
    else{
        return true;
    }
}

?>
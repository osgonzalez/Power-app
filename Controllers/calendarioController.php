<?php

session_start();

include '../Functions/Authentication.php';

if (!IsAuthenticated()){
  header('Location:../index.php');
  
  }else{
    include '../Views/calendarView.php';
    new calendarView();

    }

    ?>

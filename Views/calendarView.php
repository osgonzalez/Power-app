<?php

class calendarView
{


  function __construct(){

      $this->render();
}


function render(){
    include '../Templates/header.html';
    $usuarioTipo = $_SESSION['type'];
    switch ($usuarioTipo){
        case 'ADMIN': include '../Templates/lateralBarAdmin.php';
            break;
        case 'COACH': include '../Templates/lateralBarCoach.php';
            break;
        case 'TDU' : include '../Templates/lateralBarDeportista.php';
            break;
        case 'PEF' : include '../Templates/lateralBarDeportista.php';
            break;
    }
    ?>

    <h3>Calendario</h3>
    <div class="col-md-12">
      <iframe src="https://calendar.google.com/calendar/embed?showPrint=0&amp;height=400&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;src=powerappabp%40gmail.com&amp;color=%231B887A&amp;ctz=Europe%2FMadrid" style="border-width:0" width="1000" height="400" frameborder="0" scrolling="no"></iframe>



      </div>




    <?php
   include '../Templates/footer.html';
   }
   }

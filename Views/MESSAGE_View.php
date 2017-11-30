<?php

class MESSAGE{

    private $string;
    private $volver;

    function __construct($string, $volver){
        $this->string = $string;
        $this->volver = $volver;
        $this->render();
    }

    function render(){

        include '../Templates/header.html';
        ?>
        <br>
        <br>
        <br>
        <H3>
            <?php
            /*echo $strings[$this->string];*/
            echo $this->string;
            ?>
        </H3>
        <br>
        <br>
        <br>

        <?php

        echo '<a class="submit" href=\'' . $this->volver . "'>" . /*$strings['Volver']*/
            "". "<img src='../Templates/img2/atras.png' title='Volver'></a>";
        include "../Templates/footer.html";
    }

}
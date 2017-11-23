<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 11/23/17
 * Time: 3:05 PM
 */

class TableShowAllView
{
    var $tables;

    function __construct($tables){

        $this->tables = $tables;
        $this->render();
    }

    function render(){

        include '../Templates/header.html';
        include '../Templates/lateralBar.html';

        foreach ($this->tables as $table){
            echo "<br>";
            echo "Fecha Inicio: ". $table->getIDTable();

            echo "<br>";
            echo "<br>";



            echo "<br>";
            echo "<br>";
        }





        include '../Templates/footer.html';

    }
}
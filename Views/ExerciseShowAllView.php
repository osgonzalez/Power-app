<?php


class ExerciseShowAllView{
    var $exercise;

    function __construct($exercise){

        $this->exercise = $exercise;
        $this->render();
    }

    function render(){

        include '../Templates/header.html';
        include '../Templates/lateralBar.html';

        foreach ($this->exercise as $ex){
            echo "IDEjercicio: ".$ex->getIDExercise();
            echo "<br>";
            echo "Nombre Ejercicio: ". $ex->getName();
            echo "<br>";
            echo "Tipo de Ejercicio: ". $ex->getExerciseType();
            echo "<br>";
            echo "Descripcion: ". $ex->getContent();
            echo "<br>";

            echo '<a href="../Controllers/formLoader.php?DNI='.$ex->getIDExercise().'&form=exerciseEdit">Edit.</a>';
            echo '<a href="../Controllers/ExerciseActionController.php?DNI='.$ex->getIDExercise().'&action=DELETE">Borrar.</a>';

            echo "<br>";
            echo "<br>";
        }
        echo '<a href="../Controllers/formLoader.php?form=exerciseAdd">Add.</a>';
        echo '<a href="../index.php">Volver.</a>';



        include '../Templates/footer.html';

    }
}
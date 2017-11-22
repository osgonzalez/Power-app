<?php


class CoursesShowAllView{
    var $courses;

    function __construct($courses){

        $this->courses = $courses;
        $this->render();
    }

    function render(){

        include '../Templates/header.html';
        include '../Templates/lateralBar.html';

        foreach ($this->courses as $course){
            echo "IDCurso: ".$course->getIDCourses();
            echo "<br>";
            echo "Nombre Curso: ". $course->getName();
            echo "<br>";
            echo "Fecha Inicio: ". $course->getDataStart();
            echo "<br>";
            echo "Fecha Final: ". $course->getDataEnd();
            echo "<br>";
            echo "Numero Plazas: ". $course->getNPlaces();
            echo "<br>";
            echo "Entrenador Responsable: ". $course->getDNICoach();
            echo "<br>";

            echo '<a href="../Controllers/formLoader.php?DNI='.$course->getIDCourses().'&form=EDIT">Edit.</a>';
            echo '<a href="../Controllers/CoursesActionController.php?DNI='.$course->getIDCourses().'&action=DELETE">Borrar.</a>';

            echo "<br>";
            echo "<br>";
        }
        echo '<a href="../Controllers/formLoader.php?form=ADD">Add.</a>';
        echo '<a href="../index.php">Volver.</a>';



        include '../Templates/footer.html';

    }

}
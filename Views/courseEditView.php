<?php


class courseEditView{

    var $course;

    function __construct(Course $course){
        $this->course = $course;
        $this->render();
    }

    function render(){

        include '../Templates/header.html';

/*  USAD ESTO COMO EJEMPLO PARA ACCEDER A LOS DATOS!!!!!!!!!!!!!!!!!

        echo "IDCourse: ".$this->course->getIDCourses();
        echo "<br>";
        echo "Nombre: ". $this->course->getName();
*/

?>
        <form action="../Controllers/CoursesActionController.php?action=EDIT">
            <!-- RELLENAR ESTO CON EL FORMULARIO DE EDICION DE CURSO!!!!!! -->
        </form>


<?php


        include '../Templates/footer.html';

    }


}
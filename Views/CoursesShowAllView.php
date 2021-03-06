<?php
include_once '../Functions/Authentication.php';
class CoursesShowAllView{

    var $courses;
    function __construct($courses){
        $this->courses = $courses;
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
        <h3>Gestión de Cursos</h3>
        <div class="col-md-12">
            <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Todos los cursos</h4>
                <table class="table table-striped table-advance table-hover">
                    <thead>
                    <tr>
                        <th class="hidden-phone">IDCurso</th>
                        <th class="hidden-phone">Nombre Curso</th>
                        <th class="hidden-phone">Fecha Inicio</th>
                        <th class="hidden-phone">Fecha Final</th>
                        <th class="hidden-phone">Numero Plazas</th>
                        <th class="hidden-phone">Entrenador Responsable</th>
                    </tr>
                    </thead>
                    <tbody>
<?php
        foreach ($this->courses as $course){ ?>
            <tr>
            <td> <?php echo $course->getIDCourses(); ?></td>

                <td><?php  echo $course->getName();?></td>

                <td><?php echo $course->getDataStart();?></td>

                <td><?php echo $course->getDataEnd();?></td>

                <td><?php echo $course->getNPlaces();?></td>

                <td><?php echo $course->getDNICoach();?></td>
                <td><?php echo '<a href="../Controllers/UsersInCourseShowAllController.php?IDCourses='.$course->getIDCourses().'"><img src="../Templates/img2/buscar.png" style="width:30px;height:30px;" title="Consultar deportistas inscritos"></a>';?></td>
                <td><?php echo '<a href="../Controllers/RegistroUserCourseController.php?IDCourses='.$course->getIDCourses().'"><img src="../Templates/img2/userAdd.png" style="width:30px;height:30px;" title="Añadir deportista"></a>';?></td>
                <td><?php echo '<a href="../Controllers/formLoader.php?IDCourses='.$course->getIDCourses().'&form=courseEdit"><img src="../Templates/img2/edit.png" style="width:30px;height:30px;" title="Editar"></a>';?></td>
                <td><?php echo '<a href="../Controllers/CoursesActionController.php?IDCourses='.$course->getIDCourses().'&action=DELETE"><img src="../Templates/img2/delete.png" style="width:30px;height:30px;" title="Borrar"></a>';?></td>

            </tr> <?php
        }
        ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>

        <div class="row mt">
            <div style="display: flex; justify-content: center;" >
                <a href="../Controllers/CourseAddController.php"><img src="../Templates/img2/addCurso.png" style="width:45px;heigh:45px;" title="Añadir usuario"></a>
                <a href="../index.php"><img src="../Templates/img2/atras.png" style="width:45px;heigh:45px;" title="Atrás"></a>
            </div>
        </div>

        <?php
        include '../Templates/footer.html';
    }
}

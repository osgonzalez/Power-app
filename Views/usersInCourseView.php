<?php
class usersInCourseView{


    function __construct(Course $course){
        $this->course = $course;
        $this->render();
    }
    function render(){
        include '../Templates/header.html';
        $usuarioTipo = $_SESSION['type'];
        switch ($usuarioTipo){
            case 'ADMIN': include '../Templates/lateralBarAdmin.html';
                break;
            case 'COACH': include '../Templates/lateralBarCoach.html';
                break;
        }
?>
<h3>Gestión de Usuarios en Curso</h3>
<div class="col-md-12">
    <div class="content-panel">
        <h4><i class="fa fa-angle-right"></i> Todos los usuarios</h4>
        <table class="table table-striped table-advance table-hover">
            <thead>
            <tr>
                <th class="hidden-phone">DNI</th>
                <th class="hidden-phone">Tipo de Usuario</th>
                <th class="hidden-phone">Nombre</th>
                <th class="hidden-phone">Apellido</th>
                <th class="hidden-phone">Email</th>
                <th class="hidden-phone">Teléfono</th>
                <th class="hidden-phone">Ciudad</th>
                <th class="hidden-phone">Fecha de nacimiento</th>
            </tr>
            </thead>
            <tbody>
  <?php      foreach ($this->course->getUsers() as $user){ ?>
            <tr>
                <td><?php  echo $user->getDNI(); ?></td>
                <td><?php  echo $user->getUserType(); ?></td>
                <td><?php  echo $user->getFirstName(); ?></td>
                <td><?php  echo $user->getLastName(); ?></td>
                <td><?php  echo $user->getEmail(); ?></td>
                <td><?php  echo $user->getTelephone(); ?></td>
                <td><?php  echo $user->getCity(); ?></td>
                <td><?php  echo $user->getBirthdate(); ?></td>

            </tr><?php
        }
  ?>
            </tbody>
        </table>
    </div>
</div>
        </div>


        <div id="showback">
            <?php
            echo '<a class="submit" href="../Controllers/formLoader.php?form=userAddToCourse"><img src="../Templates/img2/userAdd.png" style="width:45px;heigh:45px;" title="Añadir usuario"></a>';
            echo '<a class="submit" href="../index.php"><img src="../Templates/img2/atras.png" style="width:45px;heigh:45px;" title="Atrás"></a>';
            ?>
        </div> <?php
        include '../Templates/footer.html';
    }
}
?>

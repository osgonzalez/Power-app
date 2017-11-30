<?php
class ExerciseShowAllView{
    var $exercise;
    function __construct($exercise){
        $this->exercise = $exercise;
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
            case 'TDU' : include '../Templates/lateralBarDeportista.html';
                break;
            case 'PEF' : include '../Templates/lateralBarDeportista.html';
                break;
        }
        ?>
        <h3>Gestión de Ejercicios</h3>
        <div class="col-md-12">
            <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Todos los ejercicios</h4>
                <table class="table table-striped table-advance table-hover">
                    <thead>
                    <tr>
                        <th class="hidden-phone">ID ejercicio</th>
                        <th class="hidden-phone">Nombre</th>
                        <th class="hidden-phone">Tipo de ejercicio</th>
                        <th class="hidden-phone">UrlImage</th>
                        <th class="hidden-phone">UrlVideo</th>
                        <th class="hidden-phone">Descripción</th>
                    </tr>
                    </thead>
                    <tbody>
        <?php
        foreach ($this->exercise as $ex){?>
            <tr>
                <td><?php echo $ex->getIDExercise();?></td>
                <td><?php  echo $ex->getName();?></td>
                <td><?php  echo $ex->getExerciseType();?></td>
            <td><img src="<?php  echo $ex->getUrlImage();?>" " width="90px" height="60px"></td>
            <td><iframe src="<?php  echo $ex->getUrlVideo();?>" width="220px" height="110px"></iframe></td>
            <td><?php  echo $ex->getContent();?></td>
            <td><p><?php  echo '<a href="../Controllers/formLoader.php?IDExercise='.$ex->getIDExercise().'&form=exerciseEdit"><img src="../Templates/img2/edit.png" style="width:30px;height:30px;" title="Editar"></a>';?></p></td>
                <td><?php  echo '<a href="../Controllers/ExerciseActionController.php?IDExercise='.$ex->getIDExercise().'&action=DELETE"><img src="../Templates/img2/delete.png" style="width:30px;height:30px;" title="Borrar"></a>';?></td>
            </tr><?php
                }
                ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>

        <div class="row mt">
            <div style="display: flex; justify-content: center;" >
                <a class="submit" href="../Controllers/formLoader.php?form=exerciseAdd"><img src="../Templates/img2/add.png" style="width:45px;heigh:45px;" title="Añadir Ejercicio"></a>
                <a href="../index.php"><img src="../Templates/img2/atras.png" style="width:45px;heigh:45px;margin-left: 10px;" title="Atrás"></a>
            </div>
        </div>


         <?php
        include '../Templates/footer.html';
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 11/24/17
 * Time: 6:45 PM
 * Muestra todos los ejercicios de la tabla
 */
class TableView{

    var $table;
    function __construct(Table $table){
        $this->table = $table;
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
        <div class="row mt">
        <div class="col-lg-12">
            <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Tabla <?php echo $this->table->getIDTable()  ?> [[<?php echo $this->table->getIDTable()  ?>]] </h4>
                <table class="table table-striped table-advance table-condensed">
                    <thead>
                    <tr>
                        <th class="hidden-phone">ID ejercicio</th>
                        <th class="hidden-phone">Nombre</th>
                        <th class="hidden-phone">Tipo de ejercicio</th>
                        <th class="hidden-phone">Descripción</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    foreach ($this->table->getExercises() as $exercise){ ?>
                        <tr>
                            <td><?php echo $exercise->getIDExercise();?></td>
                            <td><?php  echo $exercise->getName();?></td>
                            <td><?php  echo $exercise->getExerciseType();?></td>
                            <td><?php  echo $exercise->getContent();?></td>



                            <td><?php //echo '<a href=""><img src="../Templates/img2/edit.png" style="width:30px;height:30px;" title="Editar"></a>';?></td>
                            <td><?php //echo '<a href="../Controllers/TableActionController.php?action=DELETE&IDTable='.$table->getIDTable().'"><img src="../Templates/img2/delete.png" style="width:30px;height:30px;" title="Borrar"></a>';?></td>

                        </tr> <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>

        <div id="showback">
            <?php
            //echo '<a href=""><img src="../Templates/img2/addCurso.png" style="width:45px;heigh:45px;" title="Añadir usuario"></a>';
            echo '<a href="../index.php"><img src="../Templates/img2/atras.png" style="width:45px;heigh:45px;" title="Atrás"></a>';
            ?>
        </div> <?php
        include '../Templates/footer.html';
    }
}
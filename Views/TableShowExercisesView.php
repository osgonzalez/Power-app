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

        ?>
        <div class="row mt">
        <div class="col-lg-12">
            <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Tabla <?php echo $this->table->getIDTable()  ?>  </h4>
                <table class="table table-striped table-advance table-condensed">
                    <thead>
                    <tr>
                        <th class="hidden-phone">Ejercicio</th>
                        <th class="hidden-phone">Nombre</th>
                        <th class="hidden-phone">Tipo de ejercicio</th>
                        <th class="hidden-phone">Descripción</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    foreach ($this->table->getExercises() as $exercise){
                        ?>
                        <tr>
                            <td><a><img src="<?php echo $exercise->getUrlImage();?>" width="90px" height="60px"></a></td>
                            <td><?php  echo $exercise->getName();?></td>
                            <td><?php  echo $exercise->getExerciseType();?></td>
                            <td><?php  echo $exercise->getContent();?></td>



                            <td><?php echo '<a href="../Controllers/formLoader.php?form=exerciseShowOne&IDExercise="'. $exercise->getIDExercise() .'" target="_blank" onclick="window.open(this.href, this.target, \'width=300,height=400\'); return false;"><img src="../Templates/img2/ver.png" style="width:30px;height:20px;" title="Ver ejercicio"></a>';?></td>

                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>

        <div class="row mt">
            <div style="display: flex; justify-content: center;" >
                <a href="../Controllers/formLoader.php?form=addExerciseInTable"><img src="../Templates/img2/addCurso.png" style="width:45px;heigh:45px;" title="Añadir Ejercicio a Tabla"></a>
                <a href="../index.php"><img src="../Templates/img2/atras.png" style="width:45px;heigh:45px;margin-left: 10px;" title="Atrás"></a>
            </div>
        </div>

         <?php
    }
}
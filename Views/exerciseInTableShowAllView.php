<?php

class exerciseInTableShowAllView
{

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
        <h3>Tabla <?php $this->table->getIDTable(); ?></h3>
        <div class="col-md-12">
            <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Todos los ejercicios en la tabla</h4>
                <table class="table table-striped table-advance table-hover">
                    <thead>
                    <tr>
                        <th class="hidden-phone">ID Ejercicio</th>
                        <th class="hidden-phone">Nombre Ejercicio</th>
                        <th class="hidden-phone">Tipo de ejercicio</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php      foreach ($this->table->getExercises() as $exercise){ ?>
                        <tr>
                        <td><?php  echo $exercise->getIDExercise(); ?></td>
                        <td><?php  echo $exercise->getName(); ?></td>
                        <td><?php  echo $exercise->getExerciseType(); ?></td>

                        <td><?php  echo '<a href="../Controllers/TableActionController.php?action=EXERCISEDELETE&IDExercise='.$exercise->getIDExercise().'">
                                          <img src="../Templates/img2/delete.png" style="width:30px;height:30px;" title="Borrar"></a>'; ?></td>

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
                <a class="submit" href="../Controllers/formLoader.php?form=exerciseAddToTable"><img src="../Templates/img2/add.png" style="width:45px;height:45px;" title="Añadir ejercicio"></a>
                <a class="submit" href="../Controllers/TableShowAllController.php?number=10"><img src="../Templates/img2/atras.png" style="width:45px;heigh:45px;" title="Atrás"></a>
            </div>
        </div>

         <?php
        include '../Templates/footer.html';
    }
}

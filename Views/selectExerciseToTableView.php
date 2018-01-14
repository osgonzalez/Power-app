<?php

class SelectExerciseToTableView
{
    var $IDTable;
    var $exercises;
    function __construct($exercises,$IDTable){
        $this->exercises = $exercises;
        $this->IDTable = $IDTable;
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
        <h3>Eleccion de Ejercicio</h3>
        <div class="col-md-12">
            <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Todos los ejercicio</h4>
                <table class="table table-striped table-advance table-hover">
                    <thead>
                    <tr>
                        <th class="hidden-phone">ID Ejercicio</th>
                        <th class="hidden-phone">Nombre del Ejercicio</th>
                        <th class="hidden-phone">Tipo de ejercicio</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php      foreach ($this->exercises as $exercise){ ?>
                        <tr>
                        <td><?php  echo $exercise->getIDExercise(); ?></td>
                        <td><?php  echo $exercise->getName(); ?></td>
                        <td><?php  echo $exercise->getExerciseType(); ?></td>

                        <td><?php  echo '<a href="../Controllers/TableActionController.php?action=ADDEXERCISE&IDExercise='.$exercise->getIDExercise().
                                '&IDTable='.$this->IDTable.'">
                                        <img src="../Templates/img2/add.png" style="width:30px;height:30px;" title="Añadir ejercicio"></a>'; ?></td>

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

            echo '<a class="submit" href="../exerciseInTableShowAllView.php"><img src="../Templates/img2/atras.png" style="width:45px;heigh:45px;" title="Atrás"></a>';
            ?>
        </div> <?php
        include '../Templates/footer.html';
    }
}

<?php
include_once '../Functions/Authentication.php';
class TableShowAllView{

    var $tables;
    function __construct($tables){
        $this->tables = $tables;
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

        <div class="col-md-12">
            <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Tablas Disponibles</h4>
                <table class="table table-striped table-advance table-hover">
                    <thead>
                    <tr>
                        <th class="hidden-phone">ID</th>
                        <th class="hidden-phone">Tipo de tabla</th>
                        <th class="hidden-phone">Contentenido</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    foreach ($this->tables as $table){ ?>
                        <tr>
                            <td> <?php echo $table->getIDTable(); ?></td>

                            <td><?php  echo $table->getTableType();?></td>

                            <td><?php echo $table->getContent();?></td>



                            <td><?php echo '<a href="../Controllers/TableShowOneContoller.php?IDTable='.$table->getIDTable().'"><img src="../Templates/img2/edit.png" style="width:30px;height:30px;" title="Editar"></a>';?></td>
                            <td><?php echo '<a href="../Controllers/TableActionController.php?action=DELETE&IDTable='.$table->getIDTable().'"><img src="../Templates/img2/delete.png" style="width:30px;height:30px;" title="Borrar"></a>';?></td>

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
            echo '<a href=""><img src="../Controllers/formLoader.php?form=tableAdd" style="width:45px;heigh:45px;" title="Añadir usuario"></a>';
            echo '<a href="../index.php"><img src="../Templates/img2/atras.png" style="width:45px;heigh:45px;" title="Atrás"></a>';
            ?>
        </div> <?php
        include '../Templates/footer.html';
    }
}
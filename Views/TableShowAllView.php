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
        <h3>Gestión de Usuarios</h3>

        <div class="col-md-12">
            <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Tablas Disponibles</h4>
                <table class="table table-striped table-advance table-hover">
                    <thead>
                    <tr>
                        <th class="hidden-phone">Nombre</th>
                        <th class="hidden-phone">Tipo de tabla</th>
                        <th class="hidden-phone" style="text-align: center">Iniciar Sesión</th>
                        <th class="hidden-phone" style="text-align: center">Progeso</th>
                        <th class="hidden-phone">Imprimir</th>
                        <th class="hidden-phone">Ver</th>
                        <th class="hidden-phone">Borrar</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    foreach ($this->tables as $table){ ?>
                        <tr>
                            <td> <?php echo $table->getIDTable(); ?></td>

                            <td><?php  echo $table->getTableType();?></td>

                            <td style="text-align: center"><?php echo '<a href="../Controllers/TableSessionController.php?IDTable='.$table->getIDTable().'"><i class="fa fa-clock-o" aria-hidden="true" title="Iniciar Sesión" style="font-size: 3em; color: grey;"></i></a>';?></td>
                            <td style="text-align: center"><?php echo '<a href="../Controllers/GraphicTableUserController.php?IDTable='.$table->getIDTable().'"><i class="fa fa-area-chart" aria-hidden="true" title="Progreso" style="font-size: 3em; color: grey;"></i></a>';?></td>
                            <td><?php echo '<a href="../Controllers/PrintTableController.php?IDTable='.$table->getIDTable().'"><i class="fa fa-print" aria-hidden="true" title="Imprimir tabla" style="font-size: 3em; color: grey;"></i></a>';?></td>
                            <td><?php echo '<a href="../Controllers/formLoader.php?IDTable='.$table->getIDTable().'&form=tableShowOne"><img src="../Templates/img2/ver.png" style="width:30px;height:20px;" title="Ver ejercicios de la tabla"></a>';?></td>
                            <td><?php echo '<a href="../Controllers/TableActionController.php?action=DELETE&IDTable='.$table->getIDTable().'"><img src="../Templates/img2/delete.png" style="width:30px;height:30px;" title="Borrar"></a>';?></td>

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
                <a href="../Controllers/TableAddController.php"><img src="../Templates/img2/addCurso.png" style="width:45px;heigh:45px;" title="Añadir Tabla"></a>
                <a href="../index.php"><img src="../Templates/img2/atras.png" style="width:45px;heigh:45px;" title="Atrás"></a>
            </div>
        </div>
        <?php
        include '../Templates/footer.html';
    }
}
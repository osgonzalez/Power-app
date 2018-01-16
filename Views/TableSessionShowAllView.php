<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 16/01/18
 * Time: 18:15
 */

class TableSessionShowAllView
{
    var $Sessions;
    function __construct($Sessions){
        $this->Sessions = $Sessions;
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
                <h4><i class="fa fa-angle-right"></i> Sesiones</h4>
                <table class="table table-striped table-advance table-hover">
                    <thead>
                    <tr>
                        <th class="hidden-phone">Tabla</th>
                        <th class="hidden-phone">Fecha</th>
                        <th class="hidden-phone">Tiempo</th>
                        <th class="hidden-phone">Comentarios</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($this->Sessions as $Session){ ?>
                        <tr>
                            <td> <?php echo $Session->getIDTable(); ?></td>

                            <td><?php  echo $Session->getSesionTime();?></td>

                            <td><?php  echo $Session->getRecord();?></td>

                            <td><?php  echo $Session->getComment();?></td>

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
                <a href="../index.php"><img src="../Templates/img2/atras.png" style="width:45px;heigh:45px;" title="Atrás"></a>
            </div>
        </div>
        <?php
        include '../Templates/footer.html';
    }
}
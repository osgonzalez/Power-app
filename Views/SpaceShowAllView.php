<?php

/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 14/1/18
 * Time: 2:29
 */
class SpaceShowAllView
{
    var $spaces;
    function __construct($spaces){
        $this->users = $spaces;
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
        <h3>Gestión de Espacios</h3>
        <div class="col-md-12">
            <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Todos los espacios</h4>
                <table class="table table-striped table-advance table-hover">
                    <thead>
                    <tr>
                        <th class="hidden-phone">ID</th>
                        <th class="hidden-phone">Nombre</th>
                        <th class="hidden-phone">Descripción</th>
                        <th class="hidden-phone">Capacidad</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php      foreach ($this->users as $space){ ?>
                        <tr>
                        <td><?php  echo $space->getIDSpace(); ?></td>
                        <td><?php  echo $space->getNameSpace(); ?></td>
                        <td><?php  echo $space->getDescription(); ?></td>
                        <td><?php  echo $space->getCapacity(); ?></td>

                        <td><?php  echo '<a href="../Controllers/formLoader.php?IDSpace='.$space->getIDSpace().'&form=spaceEdit"><img src="../Templates/img2/edit.png" style="width:30px;height:30px;" title="Editar"></a>'; ?></td>
                        <td><?php  echo '<a href="../Controllers/SpaceActionController.php?IDSpace='.$space->getIDSpace().'&action=DELETE"><img src="../Templates/img2/delete.png" style="width:30px;height:30px;" title="Borrar"></a>'; ?></td>

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
                <a class="submit" href="../Controllers/formLoader.php?form=spaceAdd"><img src="../Templates/img2/userAdd.png" style="width:45px;heigh:45px;" title="Añadir espacio"></a>
                <a class="submit" href="../index.php"><img src="../Templates/img2/atras.png" style="width:45px;heigh:45px;" title="Atrás"></a>
            </div>
        </div>

        <?php
        include '../Templates/footer.html';
    }
}
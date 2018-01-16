<?php
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 15/01/2018
 * Time: 18:48
 */

class SpaceBookingShowAllView
{
    var $spaceBookings;
    function __construct($spaceBookings){
        $this->spaceBookings = $spaceBookings;
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
        <h3>Gestión de Reservas de Espacios</h3>
        <div class="col-md-12">
            <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Todas las reservas de espacios</h4>
                <table class="table table-striped table-advance table-hover">
                    <thead>
                    <tr>
                        <th class="hidden-phone">ID Espacio</th>
                        <th class="hidden-phone">DNI</th>
                        <th class="hidden-phone">Fecha de Reserva</th>
                        <th class="hidden-phone">Hora de Reserva</th>
                        <th class="hidden-phone">Comentario</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php      foreach ($this->spaceBookings as $spaceBooking){ ?>
                        <tr>
                        <td><?php  echo $spaceBooking->getIDSpace(); ?></td>
                        <td><?php  echo $spaceBooking->getDNI(); ?></td>
                        <td><?php  echo $spaceBooking->getDateBooking(); ?></td>
                        <td><?php  echo $spaceBooking->getTimeBooking(); ?></td>
                        <td><?php  echo $spaceBooking->getCommentary(); ?></td>
                        <td><?php  echo '<a href="../Controllers/formLoader.php?IDSpace='. $spaceBooking->getIDSpace() .'&DNI='. $spaceBooking->getDNI() .'&DateBooking=' . $spaceBooking->getDateBooking() . '&TimeBooking=' . $spaceBooking->getTimeBooking() . '&form=spaceBookingEdit"><img src="../Templates/img2/edit.png" style="width:30px;height:30px;" title="Editar"></a>'; ?></td>
                        <td><?php  echo '<a href="../Controllers/UserActionController.php?IDSpace='. $spaceBooking->getIDSpace() .'&DNI='. $spaceBooking->getDNI() .'&DateBooking=' . $spaceBooking->getDateBooking() . '&TimeBooking=' . $spaceBooking->getTimeBooking() . '&action=DELETE"><img src="../Templates/img2/delete.png" style="width:30px;height:30px;" title="Borrar"></a>'; ?></td>

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
                <a class="submit" href="../Controllers/formLoader.php?form=spaceBookingAdd"><img src="../Templates/img2/userAdd.png" style="width:45px;heigh:45px;" title="Añadir usuario"></a>
                <a class="submit" href="../index.php"><img src="../Templates/img2/atras.png" style="width:45px;heigh:45px;" title="Atrás"></a>
            </div>
        </div>

        <?php
        include '../Templates/footer.html';
    }

}
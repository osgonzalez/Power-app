<?php
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 15/01/2018
 * Time: 19:03
 */

class SpaceBookingEditView
{

    function __construct(SpaceBooking $spaceBooking)
    {

        $this->spaceBooking = $spaceBooking;
        $this->render();
    }

    function render()
    {
        ?>


        <div class="row mt">
        <div class="col-lg-12">
        <div class="form-panel">
        <h4 class="mb">
            <i class="fa fa-angle-right"></i>
            Datos Reserva de Espacio
        </h4>

        <form class="form-horizontal style-form" method="post" action="../Controllers/SpaceBookingActionController.php?action=EDIT">
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">ID Espacio</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="IDSpace" value="<?php echo $this->spaceBooking->getIDSpace(); ?>" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">DNI</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="DNI" value="<?php echo $this->spaceBooking->getDNI(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Fecha de Reserva</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="DateBooking" value="<?php echo $this->spaceBooking->getDateBooking() ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Hora de Reserva</label>
                <div class="col-sm-10">
                    <input type="time"  class="form-control" placeholder="" name="TimeBooking" value="<?php echo $this->spaceBooking->getTimeBooking()?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Comentario</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="Commentary" value="<?php echo $this->spaceBooking->getCommentary() ?>">
                </div>
            </div>


            <button class="submit" type="submit"><img src="../Templates/img2/add.png"></button>
            <a class="submit" href="../Controllers/SpaceBookingShowAllController.php"><img src="../Templates/img2/atras.png"></a>
        </form>


        <?php

    }
}

?>
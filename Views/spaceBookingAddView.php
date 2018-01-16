<?php

class spaceBookingAddView{
var $spaces;
function __construct(array $spaces)
{
    $this->spaces = $spaces;
    $this->render();
}

function render()
{

?>


<h3>Gestión de Reserva de Espacios</h3>
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Datos de la reserva de espacio</h4>
            <form method="post" class="form-horizontal style-form"
                  action="../Controllers/SpaceBookingActionController.php?action=ADD">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">ID Espacio</label>
                    <div class="col-sm-10">
                        <select class="form-control round-form" name="IDSpace">
                            <?php while ($spacio = $this->spaces){
                                echo '<option value=' . $spacio['IDSpace'] . '">' . $spacio['NameSpace'] . '</option>';
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">DNI</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control round-form" name="DNI">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Fecha de la reserva</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control round-form" name="DateBooking">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Hora de la reserva</label>
                    <div class="col-sm-10">
                        <input type="time" class="form-control round-form" placeholder="" name="TimeBooking">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Comentario</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control round-form" name="Commentary">
                    </div>
                </div>


                <button class="submit" type="submit"><img src="../Templates/img2/add.png"></button>
                <a class="submit" href="../Controllers/SpaceBookingShowAllController.php"><img
                            src="../Templates/img2/atras.png"></a>
            </form>
            <?php
            }
            }

            ?>

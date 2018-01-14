<?php

/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 14/1/18
 * Time: 3:21
 */
class spaceEditView
{
    var $space;

    function __construct(Space $space)
    {
        $this->space = $space;
        $this->render();


    }

    function render()
    {
        ?>

        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Editar espacio</h4>
                    <form method="post" class="form-horizontal style-form" action="../Controllers/SpaceActionController.php?action=EDIT">
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">ID Espacio</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control round-form" name="IDSpace" value="<?php echo $this->space->getIDSpace();?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Nombre del espacio</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control round-form" name="NameSpace" value="<?php echo $this->space->getNameSpace();?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Descripción del Ejercicio</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control round-form" name="Description" value="<?php echo $this->space->getDescription();?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Capacidad</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control round-form" name="Capacity" value="<?php echo $this->space->getCapacity();?>">
                            </div>
                        </div>



                        <button class="submit" type="submit"><img src="../Templates/img2/add.png"></button>
                        <a class="submit" href="../Controllers/SpaceShowAllController.php"><img src="../Templates/img2/atras.png"></a>
                    </form>
                </div>
            </div>
        </div>

        <?php
    }
}
?>
<?php


class CurseAddView
{

    var $coachs;
    function __construct(array $coachs){
        $this->coachs = $coachs;
        $this->render();
    }
    function render()
    {
        include '../Templates/header.html';
        switch($_SESSION['type']){
            case 'ADMIN':
                include '../Templates/lateralBarAdmin.php';
                break;
            case 'COACH':
                include '../Templates/lateralBarCoach.php';
                break;
            case 'PEF':
                include '../Templates/lateralBarDeportista.php';
                break;
            case 'TDU':
                include '../Templates/lateralBarDeportista.php';
                break;
        }
       ?>
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Añadir Curso</h4>
            <form class="form-horizontal style-form" method="post" action="../Controllers/CoursesActionController.php?action=ADD">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nombre del Curso</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control round-form" name="Name">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Contenido</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control round-form" name="Content">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Numero de plazas</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control round-form" name="NPlaces">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Fecha de inicio</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control round-form" name="DataStart">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Fecha de Fin</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control round-form" name="DataEnd">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">DNI del coach</label>
                    <div class="col-sm-10">
                        <select name="DNICoach" required>
                            <option disabled selected value>Seleciona DNI coach</option>
                            <?php
                            foreach ($this->coachs as $coach){
                                echo "<option value='".$coach->getDNI()."'>".$coach->getDNI()." (".$coach->getFullName().")</option>";
                            }
                            ?>

                        </select>

                    </div>
                </div>

                <button class="submit" type="submit"><img src="../Templates/img2/add.png"></button>
                <a class="submit" href="../Controllers/CoursesShowAllController.php"><img src="../Templates/img2/atras.png"></a>
            </form>
        </div>
    </div>
</div>



        <?php

        include '../Templates/footer.html';

    }
}
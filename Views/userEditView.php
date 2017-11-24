<?php
class userEditView
{
    var $course;

    function __construct(User $user)
    {
        $this->user = $user;
        $this->render();
    }

    function render()
    {
        include '../Templates/header.html';
        include '../Templates/lateralBarAdmin.html';
?>


            <form action="../Controllers/UserActionController.php?action=EDIT">
                <!-- RELLENAR ESTO CON EL FORMULARIO DE EDICION DE user!!!!!! -->
            </form>


        <div class="row mt">
        <div class="col-lg-12">
        <div class="form-panel">
        <h4 class="mb"><i class="fa fa-angle-right"></i> Datos Usuario</h4>

        <form class="form-horizontal style-form" method="get">
        <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">DNI</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="DNI" value="<?php echo $this->user->getDNI();
    ?>" readonly>
        </div>
        </div>
        <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">Nombre</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="FirstName" value="<?php echo $this->user->getFirstName();
    ?>">
        </div>
        </div>

        <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">Apellidos</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="LastName" value="<?php echo $this->user->getLastName() ?>">
        </div>
        </div>

        <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
        <input type="password"  class="form-control" placeholder="" name="PasswordHash" value="<?php echo $this->user->getPasswordHash()?>">
        </div>
        </div>

        <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="Email" value="<?php echo $this->user->getEmail() ?>">
        </div>
        </div>

        <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">Telefono</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="Telephone" value="<?php echo $this->user->getTelephone() ?>">
        </div>
        </div>

        <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">Ciudad</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="City" value="<?php echo $this->user->getCity() ?>">
        </div>
        </div>

        <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">Fecha</label>
        <div class="col-sm-10">
        <input type="date" class="form-control" name="Birthdate" value="<?php echo $this->user->getBirthdate() ?>">
        </div>
        </div>


        <div class="radio">

        <label>
        <input type="radio" name="UserType" id="optionsRadios1" value="ADMIN" <?php if ($this->user->getUserType()=='ADMIN')
    {
    echo "checked";
    } ?>>
        Admin
        </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="UserType" id="optionsRadios2"
                       value="COACH" <?php if ($this->user->getUserType() == 'COACH') {
                    echo "checked";
                } ?>>
                Coach
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="UserType" id="optionsRadios3"
                       value="TDU" <?php if ($this->user->getUserType() == 'TDU') {
                    echo "checked";
                } ?>>
                TDU
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="UserType" id="optionsRadios4"
                       value="PEF" <?php if ($this->user->getUserType() == 'PEF') {
                    echo "checked";
                } ?>>
                PEF
            </label>
        </div>


<?php

        include '../Templates/footer.html';
    }
}
?>